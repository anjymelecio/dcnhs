<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Student;
use App\Models\Subject;
use App\Models\WrittenWork;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class GradesComputationController extends Controller
{
    //
    public function index($student_id, $subject_id){

      $student =   Student::find($student_id);
      $subject = Subject::find($subject_id);


        return view('teacher.studentgrades', compact('student','subject'));
    }

    public function writtenWorks($student_id, $subject_id){

      $student =   Student::find($student_id);
      $subject = Subject::find($subject_id);

      $semesters = Semester::join('school_years', 'school_years.id', '=', 'semesters.school_year_id')
    ->selectRaw('semesters.semester as semester, DATE_FORMAT(school_years.date_start, "%Y") as year_start, DATE_FORMAT(school_years.date_end, "%Y") as year_end')
    ->where('semesters.status', 'active')
    ->get();


      return view('teacher.writtenworks',  compact('student', 'subject'));


    }

public function computeWrittenWorks(Request $request, $student_id, $subject_id)
{
  $student = Student::find($student_id);

  $subject = Subject::find($subject_id);

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

  if ($validatedData['s1'] > $validatedData['h1']) {
    return redirect()->back()->withErrors('The Score score should not be greater than highest score')->withInput();
}
if ($validatedData['s2'] > $validatedData['h2']) {
    return redirect()->back()->withErrors('The Score score should not be greater than highest score')->withInput();;
}
if ($validatedData['s3'] > $validatedData['h3']) {
    return redirect()->back()->withErrors('The Score score should not be greater than highest score')->withInput();;
}
if ($validatedData['s4'] > $validatedData['h4']) {
    return redirect()->back()->withErrors('The Score score should not be greater than highest score')->withInput();;
}
if ($validatedData['s5'] > $validatedData['h5']) {
    return redirect()->back()->withErrors('The Score score should not be greater than highest score')->withInput();;
}
if ($validatedData['s6'] > $validatedData['h6']) {
    return redirect()->back()->withErrors('The Score score should not be greater than highest score')->withInput();;
}
if ($validatedData['s7'] > $validatedData['h7']) {
    return redirect()->back()->withErrors('The Score score should not be greater than highest score')->withInput();;
}
if ($validatedData['s8'] > $validatedData['h8']) {
    return redirect()->back()->withErrors('The Score score should not be greater than highest score')->withInput();;
}
if ($validatedData['s9'] > $validatedData['h9']) {
    return redirect()->back()->withErrors('The Score score should not be greater than highest score')->withInput();;
}
if ($validatedData['s10'] > $validatedData['h10']) {
    return redirect()->back()->withErrors('The Score score should not be greater than highest score')->withInput();;
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



 $result = ($score / $highestScore)  *  100;

$percent = $subject->written_works / 100;

 $ws = $result * $percent;

 $written = new WrittenWork();
 $written->student_id = $student->id;
  $written->subject_id = $subject->id;
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

        $written->total_highest_score = $highestScore; 
         $written->total_score = $score; 
 $written->h10  = $validatedData['h10'];
$written->ps = $result;
 $written->ws = $ws;


 $written->save();
 return redirect()->back()->with('success', 'Grades succesfully create')->withInput();;
 

}


  }


  
      
    
    


