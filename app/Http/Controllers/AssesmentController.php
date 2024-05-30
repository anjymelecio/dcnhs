<?php

namespace App\Http\Controllers;

use App\Models\Assesment;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssesmentController extends Controller
{
    public function index(Request $request, $student_id, $subject_id)
    {
        $teacherId = Auth::guard('teacher')->user()->id;
    
        $class = Classes::join('strand_subjects', 'strand_subjects.id', '=', 'classes.strand_subject_id')
                    ->join('grade_levels', 'grade_levels.id', '=', 'classes.grade_level_id')
                    ->join('strands', 'strands.id', '=', 'classes.strand_id')
                    ->where('strand_subjects.subject_id', $subject_id)
                    ->where('classes.teacher_id', $teacherId)
                    ->select('grade_levels.id as grade_level_id', 'strands.id as strand_id', 'classes.section_id as section_id')
                    ->first();
    
        if (!$class) {
            abort(403, 'Unauthorized access');
        }
    
        $students = Student::join('grade_levels', 'grade_levels.id', '=', 'students.grade_level_id')
                      ->join('strands', 'strands.id', '=', 'students.strand_id')
                      ->join('student_sections', 'student_sections.student_id', '=', 'students.id')
                      ->where('students.grade_level_id', $class->grade_level_id)
                      ->where('students.strand_id', $class->strand_id)
                      ->where('students.id', $student_id)
                      ->where('student_sections.section_id', $class->section_id)
                      ->first();
    
        if (!$students) {
            abort(403, 'Unauthorized access');
        }
    
        $student = Student::find($student_id);
        $subject = Subject::find($subject_id);
    
        if(!$student || !$subject ){
            return view('error.error');
        }
    
        $quarters = Assesment::join('students', 'students.id', '=', 'assesments.student_id')
                              ->join('subjects', 'subjects.id', '=', 'assesments.subject_id')
                              ->select('assesments.total_highest_score as highest_score', 'assesments.total_score', 'assesments.quarter', 'assesments.ps', 'assesments.ws', 'assesments.id')
                              ->where('students.id', $student_id)
                              ->where('subjects.id', $subject_id)
                              ->get();
    
     
    
        if($request->has('quarter')){
            $quarter = $request->input('quarter');
    
            $grades = Assesment::join('students', 'students.id', '=', 'assesments.student_id')
            ->join('subjects', 'subjects.id', '=', 'assesments.subject_id')
            ->select('assesments.total_highest_score as h_score') 
            ->where('subjects.id', $subject_id)
            ->where('quarter', $quarter)
            ->first();

return response()->json($grades);
            
        }               
    
        return view('teacher.assesment', compact('student', 'subject', 'quarters', ));
    }
    
   
   public function compute(Request $request, $student_id, $subject_id)
   {
       $student = Student::findOrFail($student_id);
       $subject = Subject::findOrFail($subject_id);
   
       $validatedData = $request->validate([
           'quarter' => 'required|in:1,2,3,4',
           'h_score' => 'nullable|numeric|min:0|max:100',
           'score' => 'nullable|numeric|min:0|max:100',
       ]);
   
       
       if ($request->has('score') && $request->has('h_score')) {
           $score = $request->input('score');
           $highestScore = $request->input('h_score');
   
           if ($score > $highestScore) {
               return redirect()->back()->withErrors('The score should not be greater than the highest score')->withInput();
           }
       }
   
       $existingScore = Assesment::where('student_id', $student->id)
           ->where('subject_id', $subject->id)
           ->where('quarter', $validatedData['quarter'])
           ->first();
   
       if ($existingScore) {
           return redirect()->back()->withErrors('Scores for the selected quarter have already been recorded for this student and subject.')->withInput();
       }


   
      
       if ($highestScore > 0) {
           $percent = $subject->assessment / 100;
           $ps = ($score / $highestScore) * 100;
           $ws = $ps * $percent;
       } else {
           return redirect()->back()->withErrors('Cannot divide by zero: Highest score is zero')->withInput();
       }
   
       $assessment = new Assesment();
   
       $assessment->student_id = $student->id;
       $assessment->subject_id = $subject->id;
       $assessment->total_highest_score = $highestScore ?? null;
       $assessment->total_score = $score ?? null;
       $assessment->quarter = $validatedData['quarter'];
       $assessment->ps = $ps;
       $assessment->ws = $ws;
   
       $assessment->save();
   
       return redirect()->back()->with('success', 'Assessment computed and saved successfully.');
   }
   
    public function update(Request $request, $student_id, $subject_id, $as_id)
    {
        $student = Student::findOrFail($student_id);
        $subject = Subject::findOrFail($subject_id);
        $assessment = Assesment::findOrFail($as_id);

        $validatedData = $request->validate([
            'quarter' => 'required|in:1,2,3,4',
            'h_score' => 'nullable|numeric|min:0|max:100',
            'total_score' => 'nullable|numeric|min:0|max:100',
        ]);

        $existingScore = Assesment::where('student_id', $student->id)
            ->where('subject_id', $subject->id)
            ->where('quarter', $validatedData['quarter'])
            ->where('id', '!=', $as_id)
            ->first();

        if ($existingScore) {
            return redirect()->back()->withErrors('Scores for the selected quarter have already been recorded for this student and subject.')->withInput();
        }

        if (isset($validatedData['total_score']) && isset($validatedData['h_score'])) {
            if ($validatedData['total_score'] > $validatedData['h_score']) {
                return redirect()->back()->withErrors('The score should not be greater than the highest score')->withInput();
            }

            if ($validatedData['h_score'] <= 0) {
                return redirect()->back()->withErrors('Cannot divide by zero: Highest score is zero');
            }

            $ps = ($validatedData['total_score'] / $validatedData['h_score']) * 100;
            $percent = $subject->assessment / 100;
            $ws = $ps * $percent;
        } else {
            $ps = null;
            $ws = null;
        }

        $assessment->quarter = $validatedData['quarter'];
        $assessment->total_highest_score = $validatedData['h_score'] ?? null;
        $assessment->total_score = $validatedData['total_score'] ?? null;
        $assessment->ps = $ps;
        $assessment->ws = $ws;

        $assessment->save();

        return redirect()->back()->with('success', 'Assessment updated successfully.');
    }

    public function delete($id)
    {
        $assessment = Assesment::findOrFail($id);

        $assessment->delete();

        return redirect()->back()->with('success', 'Assessment score deleted successfully.');
    }
}
