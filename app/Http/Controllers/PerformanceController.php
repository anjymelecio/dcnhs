<?php

namespace App\Http\Controllers;

use App\Models\PerformanceTask;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    
    public function index($student_id, $subject_id){

        $student =   Student::find($student_id);
        $subject = Subject::find($subject_id);
  
   
  $quarters = PerformanceTask::join('students', 'students.id', '=', 'performance_tasks.student_id')
  ->select('performance_tasks.total_score as total_score' , 
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
  
     
  
  
        return view('teacher.performancetask',  compact('student', 'subject' ,'quarters' ));
  
  
      }

      public function compute(Request $request, $student_id, $subject_id)
{
  $student = Student::find($student_id);

  $subject = Subject::find($subject_id);

  $validatedData = $request->validate([

    'quarter' => 'required|in:1,2,3,4',
    'h1' => 'nullable|numeric|min:1|max:255',
    'h2' => 'nullable|numeric|min:1|max:255',
    'h3' => 'nullable|numeric|min:1|max:255',
    'h4' => 'nullable|numeric|min:1|max:99',
    'h5' => 'nullable|numeric|min:1|max:99',
    'h6' => 'nullable|numeric|min:1|max:99',
    'h7' => 'nullable|numeric|min:1|max:99',
    'h8' => 'nullable|numeric|min:1|max:99',
    'h9' => 'nullable|numeric|min:1|max:99',
    'h10' => 'nullable|numeric|min:1|max:99',
    
    's1' => 'nullable|numeric|min:1|max:99',
    's2' => 'nullable|numeric|min:1|max:99',
    's3' => 'nullable|numeric|min:1|max:99',
    's4' => 'nullable|numeric|min:1|max:99',
    's5' => 'nullable|numeric|min:1|max:99',
    's6' => 'nullable|numeric|min:1|max:99',
    's7' => 'nullable|numeric|min:1|max:99',
    's8' => 'nullable|numeric|min:1|max:99',
    's9' => 'nullable|numeric|min:1|max:99',
    's10' => 'nullable|numeric|min:1|max:99',
    




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

 return redirect()->back()->with('success', 'Assessment computed and saved successfully.')->withInput();;

}
public function update(Request $request, $student_id, $subject_id, $pt_id)
{
  $student = Student::find($student_id);

  $subject = Subject::find($subject_id);

  $subject = PerformanceTask::find($pt_id);

  $validatedData = $request->validate([

    'quarter' => 'required|in:1,2,3,4',
    'h1' => 'nullable|numeric|min:1|max:99',
    'h2' => 'nullable|numeric|min:1|max:99',
    'h3' => 'nullable|numeric|min:1|max:99',
    'h4' => 'nullable|numeric|min:1|max:99',
    'h5' => 'nullable|numeric|min:1|max:99',
    'h6' => 'nullable|numeric|min:1|max:99',
    'h7' => 'nullable|numeric|min:1|max:99',
    'h8' => 'nullable|numeric|min:1|max:99',
    'h9' => 'nullable|numeric|min:1|max:99',
    'h10' => 'nullable|numeric|min:1|max:99',
    
    's1' => 'nullable|numeric|min:1|max:99',
    's2' => 'nullable|numeric|min:1|max:99',
    's3' => 'nullable|numeric|min:1|max:99',
    's4' => 'nullable|numeric|min:1|max:99',
    's5' => 'nullable|numeric|min:1|max:99',
    's6' => 'nullable|numeric|min:1|max:99',
    's7' => 'nullable|numeric|min:1|max:99',
    's8' => 'nullable|numeric|min:1|max:99',
    's9' => 'nullable|numeric|min:1|max:99',
    's10' => 'nullable|numeric|min:1|max:99',
    




  ]);

  foreach (range(1, 10) as $i) {
    if ($validatedData['s'.$i] > $validatedData['h'.$i]) {
        return redirect()->back()->withErrors('The Score score should not be greater than highest score')->withInput();
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


$perform->update();

return redirect()->back()->with('success', 'Grades succesfully updated')->withInput();

}

public function delete($id){
    $perfom = PerformanceTask::find($id);


    $perfom->delete();

    return redirect()->back()->with('success', 'Grades succesfully deleted');
}

}