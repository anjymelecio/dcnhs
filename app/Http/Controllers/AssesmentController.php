<?php

namespace App\Http\Controllers;

use App\Models\Assesment;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class AssesmentController extends Controller
{
    //
    public function index($student_id, $subject_id)
    {
        $student = Student::find($student_id);
        $subject = Subject::find($subject_id);


       
    $quarters = Assesment::join('students', 'students.id', '=', 'assesments.student_id')
    ->join('subjects', 'subjects.id', '=', 'assesments.subject_id')
    ->select('assesments.total_highest_score as highest_score', 'assesments.total_score', 'assesments.quarter as quarter',
    'assesments.ps as ps', 'assesments.ws as ws',
    'assesments.id as id')
    ->where('students.id', $student_id)
    ->where('subjects.id', $subject_id)
    ->get();

        return view('teacher.assesment', compact('student', 'subject', 'quarters'));
    }
    
    public function compute(Request $request, $student_id, $subject_id)
    {
        $student = Student::findOrFail($student_id);
        $subject = Subject::findOrFail($subject_id);
    
        $validatedData = $request->validate([
            'quarter' => 'required|in:1,2,3,4',
            'h_score' => 'nullable|numeric|min:1|max:255',
            'score' => 'nullable|numeric|min:1|max:255',
        ]);
    
        $existingScore = Assesment::where('student_id', $student->id)
                                  ->where('subject_id', $subject->id)
                                  ->where('quarter', $validatedData['quarter'])
                                  ->first();
    
        if ($existingScore) {
            return redirect()->back()->withErrors('Scores for the selected quarter have already been recorded for this student and subject.')->withInput();
        }
    
        if (isset($validatedData['score']) && isset($validatedData['h_score'])) {
            if ($validatedData['score'] > $validatedData['h_score']) {
                return redirect()->back()->withErrors('The score should not be greater than the highest score')->withInput();
            }
    
            if ($validatedData['h_score'] <= 0) {
                return redirect()->back()->withErrors('Cannot divide by zero: Highest score is zero');
            }
            
            $highestScore = $validatedData['h_score'];
            $score = $validatedData['score'];

            $percent = $subject->assessment / 100;
    
            $ps = ($score / $highestScore) * 100;
            $ws = $ps * $percent;
        } 
        $assessment = new Assesment();  
    
        $assessment->student_id = $student->id;
        $assessment->subject_id = $subject->id;
        $assessment->h_score = $validatedData['h_score'];
        $assessment->score = $validatedData['score'];
        $assessment->quarter = $validatedData['quarter'];
        $assessment->total_highest_score = $highestScore ;
        $assessment->total_score =  $score;
        $assessment->ps = $ps; 
        $assessment->ws = $ws; 
    
        $assessment->save();
    
        return redirect()->back()->with('success', 'Assessment computed and saved successfully.');
    }
    
    

    public function update(Request $request, $student_id, $subject_id,  $as_id){

        $student = Student::findOrFail($student_id);
        $subject = Subject::findOrFail($subject_id);
        $assessment = Assesment::find($as_id);

        $validatedData = $request->validate([
            'quarter' => 'required|in:1,2,3,4',
            'total_highest_score' => 'nullable|numeric|min:1|max:255',
            'total_score' => 'nullable|numeric|min:1|max:255',
        ]);
        $existingScore = Assesment::where('student_id', $student->id)
        ->where('subject_id', $subject->id)
        ->where('quarter', $validatedData['quarter'])
        ->where('id', '!=', $as_id)
        ->first();

if ($existingScore) {
return redirect()->back()->withErrors('Scores for the selected quarter have already been recorded for this student and subject.')->withInput();
}

if (isset($validatedData['total_score']) && isset($validatedData['total_highest_score'])) {
if ($validatedData['total_score'] > $validatedData['total_highest_score']) {
return redirect()->back()->withErrors('The score should not be greater than the highest score')->withInput();
}

if ($validatedData['total_highest_score'] <= 0) {
return redirect()->back()->withErrors('Cannot divide by zero: Highest score is zero');
}

$ps = ($validatedData['total_score'] / $validatedData['total_highest_score']) * 100;
$percent = $subject->assessment / 100;
$ws = $ps * $percent;
} else {
$ps = null;
$ws = null;
}





$assessment->student_id = $student->id;
$assessment->subject_id = $subject->id;
$assessment->quarter = $validatedData['quarter'];
$assessment->total_highest_score = $validatedData['total_highest_score'] ;
$assessment->total_score = $validatedData['total_score'] ;
$assessment->ps = $ps; 
$assessment->ws = $ws; 

$assessment->update();

return redirect()->back()->with('success', 'Assessment computed and saved successfully.');

}


public function delete($id){

    $assessment = Assesment::find($id);

    $assessment->delete();

    return redirect()->back()->with('success', 'Assessment score deleted successfully.');

}


    }
    




