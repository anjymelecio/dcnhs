<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\PerformanceTask;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerformanceController extends Controller
{
    
  public function index(Request $request, $student_id, $subject_id) {

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

    $quarters = PerformanceTask::join('students', 'students.id', '=', 'performance_tasks.student_id')
        ->select('performance_tasks.total_score as total_score',
            'performance_tasks.quarter as quarter',
            'performance_tasks.total_highest_score as highest_score',
            'performance_tasks.ps as ps',
            'performance_tasks.ws as ws',
            'performance_tasks.id as id',
            'performance_tasks.h1 as h1',
            'performance_tasks.h2 as h2',
            'performance_tasks.h3 as h3',
            'performance_tasks.h4 as h4',
            'performance_tasks.h5 as h5',
            'performance_tasks.h6 as h6',
            'performance_tasks.h7 as h7',
            'performance_tasks.h8 as h8',
            'performance_tasks.h9 as h9',
            'performance_tasks.h10 as h10',
            'performance_tasks.s1 as s1',
            'performance_tasks.s2 as s2',
            'performance_tasks.s3 as s3',
            'performance_tasks.s4 as s4',
            'performance_tasks.s5 as s5',
            'performance_tasks.s6 as s6',
            'performance_tasks.s7 as s7',
            'performance_tasks.s8 as s8',
            'performance_tasks.s9 as s9',
            'performance_tasks.s10 as s10'
        )
        ->where('students.id', $student_id)
        ->get();

    if ($request->has('quarter')) {
        $quarter = $request->input('quarter');

        $grades = PerformanceTask::join('subjects', 'subjects.id', '=', 'performance_tasks.subject_id')
            ->select('performance_tasks.h1', 'performance_tasks.h2', 'performance_tasks.h3', 'performance_tasks.h4', 'performance_tasks.h5',
                'performance_tasks.h6', 'performance_tasks.h7', 'performance_tasks.h8', 'performance_tasks.h9', 'performance_tasks.h10')
            ->where('subjects.id', $subject_id)
            ->where('performance_tasks.quarter', $quarter)

            ->first();

        return response()->json($grades);
    }

    return view('teacher.performancetask', compact('student', 'subject', 'quarters'));
}


      public function compute(Request $request, $student_id, $subject_id)
{
  $student = Student::find($student_id);

  $subject = Subject::find($subject_id);

  $validatedData = $request->validate([

    'quarter' => 'required|in:1,2,3,4',
  'h1' => 'nullable|numeric|min:0|max:100',
'h2' => 'nullable|numeric|min:0|max:100',
'h3' => 'nullable|numeric|min:0|max:100',
'h4' => 'nullable|numeric|min:0|max:100',
'h5' => 'nullable|numeric|min:0|max:100',
'h6' => 'nullable|numeric|min:0|max:100',
'h7' => 'nullable|numeric|min:0|max:100',
'h8' => 'nullable|numeric|min:0|max:100',
'h9' => 'nullable|numeric|min:0|max:100',
'h10' => 'nullable|numeric|min:0|max:100',
's1' => 'nullable|numeric|min:0|max:100',
's2' => 'nullable|numeric|min:0|max:100',
's3' => 'nullable|numeric|min:0|max:100',
's4' => 'nullable|numeric|min:0|max:100',
's5' => 'nullable|numeric|min:0|max:100',
's6' => 'nullable|numeric|min:0|max:100',
's7' => 'nullable|numeric|min:0|max:100',
's8' => 'nullable|numeric|min:0|max:100',
's9' => 'nullable|numeric|min:0|max:100',
's10' => 'nullable|numeric|min:0|max:100',

    




  ]);

  foreach (range(1, 10) as $i) {
    if ($validatedData['s'.$i] > $validatedData['h'.$i]) {
        return redirect()->back()->withErrors('The score should not be greater than highest score')->withInput();
    }
}

$existingScore = PerformanceTask::where('student_id', $student->id)
                   ->where('subject_id', $subject->id)
                   ->where('quarter', $validatedData['quarter'])
                   ->first();

                   if($existingScore){

 return redirect()->back()->withErrors('Scores for the selected quarter have already been recorded for this student and subject.')->withInput();;

                   }
                   $highestScore = $validatedData['h1'] + $validatedData['h2']
 + $validatedData['h3'] + $validatedData['h4'] + $validatedData['h5'] +
 $validatedData['h6'] + $validatedData['h7'] + $validatedData['h8'] + $validatedData['h9'] + $validatedData['h10'];

$score = $validatedData['s1'] + $validatedData['s2']
 + $validatedData['s3'] + $validatedData['s4'] + $validatedData['s5'] +
 $validatedData['s6'] + $validatedData['s7'] + $validatedData['s8'] + $validatedData['s9'] + $validatedData['s10'];



 if($highestScore > 0){
    $result = ($score / $highestScore)  *  100;

    $percent = $subject->performance_task / 100;
    
     $ws = $result * $percent;
    
   

 }

 else{

    return redirect()->back()->withErrors('Cannot divide by zero: Highest score is zero');
}


 $perform = new PerformanceTask();


$perform->student_id = $student->id;
$perform->subject_id = $subject->id;

$perform->quarter = $validatedData['quarter'];
$perform->s1 = $validatedData['s1'];
$perform->s2 = $validatedData['s2'];
$perform->s3 = $validatedData['s3'];
$perform->s4 = $validatedData['s4'];
$perform->s5 = $validatedData['s5'];
$perform->s6 = $validatedData['s6'];
$perform->s7 = $validatedData['s7'];
$perform->s8 = $validatedData['s8'];
$perform->s9 = $validatedData['s9'];
$perform->s10 = $validatedData['s10'];


$perform->h1 = $validatedData['h1'];
$perform->h2 = $validatedData['h2'];
$perform->h3 = $validatedData['h3'];
$perform->h4 = $validatedData['h4'];
$perform->h5 = $validatedData['h5'];
$perform->h6 = $validatedData['h6'];
$perform->h7 = $validatedData['h7'];
$perform->h8 = $validatedData['h8'];
$perform->h9 = $validatedData['h9'];
$perform->h10 = $validatedData['h10'];


$perform->total_highest_score = $highestScore;
$perform->total_score = $score;


$perform->ps = $result;
$perform->ws = $ws;


$perform->save();

 return redirect()->back()->with('success', 'Performance task computed and saved successfully.')->withInput();;

}
public function update(Request $request, $student_id, $subject_id, $pt_id)

{

$perform = PerformanceTask::find($pt_id);
    $student = Student::find($student_id);

  $subject = Subject::find($subject_id);

  $validatedData = $request->validate([

    'quarter' => 'required|in:1,2,3,4',
  'h1' => 'nullable|numeric|min:0|max:100',
'h2' => 'nullable|numeric|min:0|max:100',
'h3' => 'nullable|numeric|min:0|max:100',
'h4' => 'nullable|numeric|min:0|max:100',
'h5' => 'nullable|numeric|min:0|max:100',
'h6' => 'nullable|numeric|min:0|max:100',
'h7' => 'nullable|numeric|min:0|max:100',
'h8' => 'nullable|numeric|min:0|max:100',
'h9' => 'nullable|numeric|min:0|max:100',
'h10' => 'nullable|numeric|min:0|max:100',
's1' => 'nullable|numeric|min:0|max:100',
's2' => 'nullable|numeric|min:0|max:100',
's3' => 'nullable|numeric|min:0|max:100',
's4' => 'nullable|numeric|min:0|max:100',
's5' => 'nullable|numeric|min:0|max:100',
's6' => 'nullable|numeric|min:0|max:100',
's7' => 'nullable|numeric|min:0|max:100',
's8' => 'nullable|numeric|min:0|max:100',
's9' => 'nullable|numeric|min:0|max:100',
's10' => 'nullable|numeric|min:0|max:100',

    




  ]);

  foreach (range(1, 10) as $i) {
    if ($validatedData['s'.$i] > $validatedData['h'.$i]) {
        return redirect()->back()->withErrors('The score should not be greater than highest score')->withInput();
    }
}

$existingScore = PerformanceTask::where('student_id', $student->id)
                   ->where('subject_id', $subject->id)
                   ->where('quarter', $validatedData['quarter'])
                   ->where('id', '!=', $pt_id)
                   ->first();

                   if($existingScore){

 return redirect()->back()->withErrors('Scores for the selected quarter have already been recorded for this student and subject.')->withInput();;

                   }
                   $highestScore = $validatedData['h1'] + $validatedData['h2']
 + $validatedData['h3'] + $validatedData['h4'] + $validatedData['h5'] +
 $validatedData['h6'] + $validatedData['h7'] + $validatedData['h8'] + $validatedData['h9'] + $validatedData['h10'];

$score = $validatedData['s1'] + $validatedData['s2']
 + $validatedData['s3'] + $validatedData['s4'] + $validatedData['s5'] +
 $validatedData['s6'] + $validatedData['s7'] + $validatedData['s8'] + $validatedData['s9'] + $validatedData['s10'];



 if($highestScore > 0){
    $result = ($score / $highestScore)  *  100;

    $percent = $subject->performance_task / 100;
    
     $ws = $result * $percent;
    
   

 }

 else{

    return redirect()->back()->withErrors('Cannot divide by zero: Highest score is zero');
}





$perform->student_id = $student->id;
$perform->subject_id = $subject->id;

$perform->quarter = $validatedData['quarter'];
$perform->s1 = $validatedData['s1'];
$perform->s2 = $validatedData['s2'];
$perform->s3 = $validatedData['s3'];
$perform->s4 = $validatedData['s4'];
$perform->s5 = $validatedData['s5'];
$perform->s6 = $validatedData['s6'];
$perform->s7 = $validatedData['s7'];
$perform->s8 = $validatedData['s8'];
$perform->s9 = $validatedData['s9'];
$perform->s10 = $validatedData['s10'];


$perform->h1 = $validatedData['h1'];
$perform->h2 = $validatedData['h2'];
$perform->h3 = $validatedData['h3'];
$perform->h4 = $validatedData['h4'];
$perform->h5 = $validatedData['h5'];
$perform->h6 = $validatedData['h6'];
$perform->h7 = $validatedData['h7'];
$perform->h8 = $validatedData['h8'];
$perform->h9 = $validatedData['h9'];
$perform->h10 = $validatedData['h10'];


$perform->total_highest_score = $highestScore;
$perform->total_score = $score;


$perform->ps = $result;
$perform->ws = $ws;


$perform->save();

 return redirect()->back()->with('success', 'Performance task computed and saved update.')->withInput();;

    return redirect()->back()->with('success', 'Grades successfully updated')->withInput();
}

public function delete($id){
    $perfom = PerformanceTask::find($id);


    $perfom->delete();

    return redirect()->back()->with('success', 'Grades succesfully deleted');
}

}