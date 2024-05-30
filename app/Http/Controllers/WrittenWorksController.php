<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subject;
use App\Models\WrittenWork;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WrittenWorksController extends Controller
{
    //
    public function index($student_id, $subject_id){
    

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
 $student = Student::join('grade_levels', 'grade_levels.id', '=', 'students.grade_level_id')
                      ->join('strands', 'strands.id', '=', 'students.strand_id')
                       ->join('student_sections', 'student_sections.student_id', '=', 'students.id')
                       
                      ->where('students.grade_level_id', $class->grade_level_id)
                      ->where('students.strand_id', $class->strand_id)
                      ->where('students.id', $student_id)
                      ->where('student_sections.section_id',$class->section_id )
                      ->first();

    if (!$student) {
        abort(403, 'Unauthorized access');
    }


      $student =   Student::find($student_id);
      $subject = Subject::find($subject_id);



        return view('teacher.studentgrades', compact('student','subject'));
    }



    public function writtenWorks(Request $request, $student_id, $subject_id){

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
  
     
      $quarters = WrittenWork::join('students', 'students.id', '=', 'written_works.student_id')
      ->join('subjects', 'subjects.id', '=', 'written_works.subject_id')
      ->select('written_works.total_score as total_score' , 
      'written_works.quarter as quarter',
      'written_works.total_highest_score as highest_score',
      'written_works.ps as ps',
      'written_works.ws as ws',
      'written_works.id as id',
      'written_works.h1 as h1',
      'written_works.h2 as h2',
      'written_works.h3 as h3',
      'written_works.h4 as h4',
      'written_works.h5 as h5',
      'written_works.h6 as h6',
      'written_works.h7 as h7',
      'written_works.h8 as h8',
      'written_works.h9 as h9',
      'written_works.h10 as h10',
      'written_works.s1 as s1',
      'written_works.s2 as s2',
      'written_works.s3 as s3',
      'written_works.s4 as s4',
      'written_works.s5 as s5',
      'written_works.s6 as s6',
      'written_works.s7 as s7',
      'written_works.s8 as s8',
      'written_works.s9 as s9',
      'written_works.s10 as s10'
        )
      ->where('students.id', $student_id)
      ->where('subjects.id', $subject_id)
      ->get();

  
    
      if ($request->has('quarter')) {
          $quarter = $request->input('quarter');
  
          $grades = WrittenWork::join('subjects', 'subjects.id', '=', 'written_works.subject_id')
                               ->select('written_works.h1', 'written_works.h2', 'written_works.h3', 'written_works.h4', 'written_works.h5',
                                        'written_works.h6', 'written_works.h7', 'written_works.h8', 'written_works.h9', 'written_works.h10')
                               ->where('subjects.id', $subject_id)
                               ->where('written_works.quarter', $quarter)
                               ->first();
  
          return response()->json($grades);
      }
  
   
      return view('teacher.writtenworks', compact('student', 'subject', 'quarters'));
  }
  

public function computeWrittenWorks(Request $request, $student_id, $subject_id)
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
        return redirect()->back()->withErrors('The Score score should not be greater than highest score')->withInput();
    }
}

$existingScore = WrittenWork::where('student_id', $student->id)
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

$percent = $subject->written_works / 100;

 $ws = $result * $percent;

}

else {
    
    return redirect()->back()->withErrors('Cannot divide by zero: Highest score is zero');
}



 $written = new WrittenWork();
 $written->student_id = $student->id;
  $written->subject_id = $subject->id;
    $written->quarter = $validatedData['quarter'];
 $written->s1 = $validatedData['s1'];
 $written->s2 = $validatedData['s2'];
  $written->s3 = $validatedData['s3'];
   $written->s4 = $validatedData['s4'];
    $written->s5 = $validatedData['s5'];
     $written->s6 = $validatedData['s6'];
      $written->s7 = $validatedData['s7'];
       $written->s8 = $validatedData['s8'];
        $written->s9  = $validatedData['s9'];
        $written->s10  = $validatedData['s10'];

         $written->h1 = $validatedData['h1'];
 $written->h2 = $validatedData['h2'];
  $written->h3 = $validatedData['h3'];
   $written->h4 = $validatedData['h4'];
    $written->h5 = $validatedData['h5'];
     $written->h6 = $validatedData['h6'];
      $written->h7 = $validatedData['h7'];
       $written->h8 = $validatedData['h8'];
        $written->h9  = $validatedData['h9'];
         $written->h10  = $validatedData['h10'];

        $written->total_highest_score = $highestScore; 
         $written->total_score = $score; 

$written->ps = $result;
 $written->ws = $ws;


 $written->save();
 return redirect()->back()->with('success', 'Grades succesfully create')->withInput();
 

}

public function update(Request $request, $student_id, $subject_id, $ws_id)
{
    $student = Student::find($student_id);
    $subject = Subject::find($subject_id);
    $wr = WrittenWork::find($ws_id);

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
            return redirect()->back()->withErrors('The Score should not be greater than the highest score');
        }
    }

    $highestScore = $validatedData['h1'] + $validatedData['h2']
        + $validatedData['h3'] + $validatedData['h4'] + $validatedData['h5'] +
        $validatedData['h6'] + $validatedData['h7'] + $validatedData['h8'] + $validatedData['h9'] + $validatedData['h10'];

    $score = $validatedData['s1'] + $validatedData['s2']
        + $validatedData['s3'] + $validatedData['s4'] + $validatedData['s5'] +
        $validatedData['s6'] + $validatedData['s7'] + $validatedData['s8'] + $validatedData['s9'] + $validatedData['s10'];

    if ($highestScore == 0) {
        return redirect()->back()->withErrors('Cannot divide by zero: Highest score is zero');
    }

    $result = ($score / $highestScore)  *  100;

    $percent = $subject->written_works / 100;

    $ws = $result * $percent;

    $wr->student_id = $student->id;
    $wr->subject_id = $subject->id;
    $wr->quarter = $validatedData['quarter'];
    $wr->s1 = $validatedData['s1'];
    $wr->s2 = $validatedData['s2'];
    $wr->s3 = $validatedData['s3'];
    $wr->s4 = $validatedData['s4'];
    $wr->s5 = $validatedData['s5'];
    $wr->s6 = $validatedData['s6'];
    $wr->s7 = $validatedData['s7'];
    $wr->s8 = $validatedData['s8'];
    $wr->s9  = $validatedData['s9'];
    $wr->s10  = $validatedData['s10'];

    $wr->h1 = $validatedData['h1'];
    $wr->h2 = $validatedData['h2'];
    $wr->h3 = $validatedData['h3'];
    $wr->h4 = $validatedData['h4'];
    $wr->h5 = $validatedData['h5'];
    $wr->h6 = $validatedData['h6'];
    $wr->h7 = $validatedData['h7'];
    $wr->h8 = $validatedData['h8'];
    $wr->h9  = $validatedData['h9'];
    $wr->h10  = $validatedData['h10'];

    $wr->total_highest_score = $highestScore;
    $wr->total_score = $score;
    
    $wr->ps = $result;
    $wr->ws = $ws;

    $wr->update();
    return redirect()->back()->with('success', 'Grades successfully updated')->withInput();
}




public function delete($id){

  $written = WrittenWork::find($id);

  $written->delete();

  return redirect()->back()->with('success', 'Grades succesfully deleted');
}

public function computePerformanceTask(){

  
}

  }


  
      
    
    


