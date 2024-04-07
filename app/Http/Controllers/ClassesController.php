<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Strand;
use App\Models\StrandSubject;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    public function index(Request $request){
        $email = Auth::user()->email;

        $strands = Strand::select('id', 'strands')
        ->get();

               $strands = Strand::select('id', 'strands')
        ->get();
        $email = Auth::user()->email;

        $sections = Section::join('strands', 'strands.id', '=', 'sections.strand_id')
        ->join('grade_levels', 'grade_levels.id', 'sections.grade_level_id')
         ->select('sections.section_name as sections', 'grade_levels.level as level',
          'strands.strands as strand', 'sections.id as id')
                ->get();
      
  


        $subjects = StrandSubject::join('subjects', 'subjects.id' , '=', 'strand_subjects.subject_id')
        ->join('strands', 'strands.id' , '=', 'strand_subjects.strand_id')
        ->select('subjects.subjects as subject')
        ->where('strands.id', $request->strand_id)
        ->get();

        $gradeLevels = GradeLevel::select('level', 'id')
        ->get();
         $teachers = Teacher::select('id', 'firstname', 'lastname', 'teacher_id',)
        ->get();




    $semesters = Semester::select('semesters.semester', 'semesters.id', 
    DB::raw("YEAR(school_years.date_start) AS start_year"), 
    DB::raw("YEAR(school_years.date_end) AS end_year"))
    ->join('school_years', 'semesters.school_year_id', '=', 'school_years.id')
    ->get();

        return view('admin.classes', compact('email', 'strands', 'subjects', 'sections', 
 'teachers', 'gradeLevels', 'semesters'));

    }


    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $subjects = StrandSubject::join('subjects', 'subjects.id', '=', 'strand_subjects.subject_id')
                ->join('strands', 'strands.id', '=', 'strand_subjects.strand_id')
                ->select('subjects.subjects as subject', 'subjects.id as id')
                ->where('strands.id', $request->strand_id)
                ->get();
    
           
            
     

      
            $sections = Section::join('strands', 'strands.id', '=', 'sections.strand_id')
        ->join('grade_levels', 'grade_levels.id', 'sections.grade_level_id')
         ->select('sections.section_name as sections', 'grade_levels.level as level',
          'strands.strands as strand', 'sections.id as id')
          ->where('strands.id', $request->strand_id)
                ->get();
    
           
             return response()->json(['subjects' => $subjects, 'sections' => $sections]);


            }
        
    }
    

    public function create(Request $request){

    
    
        
    
     $validatedData =    $request->validate([
            
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:teachers,id',
            'grade_level_id' => 'required|exists:grade_levels,id',
            'section_id' => 'required|exists:sections,id',
            'semester_id' => 'required|exists:semesters,id',
            'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i|after:time_start',
        ]
    
    , [
       
        'subject_id.exists' => 'The selected subject does not exist.',
        'teacher_id.exists' => 'The selected teacher does not exist.',
        'grade_level_id.exists' => 'The selected grade level does not exist.',
        'section_id.exists' => 'The selected section does not exist.',
        'semester_id.exists' => 'The selected semester does not exist.',
        'day.in' => 'Please select a valid day of the week.',
        'time_start.required' => 'Please provide a start time.',
        'time_start.date_format' => 'The start time must be in the format HH:MM.',
        'time_end.required' => 'Please provide an end time.',
        'time_end.date_format' => 'The end time must be in the format HH:MM.',
        'time_end.after' => 'The end time must be after the start time.',
    ]);
    
       
    
        $class = new Classes();
    
    
        $class->subject_id = $validatedData['subject_id'];
$class->teacher_id = $validatedData['teacher_id'];
$class->grade_level_id = $validatedData['grade_level_id'];
$class->section_id = $validatedData['section_id'];
$class->semester_id = $validatedData['semester_id'];
$class->day = $validatedData['day'];
$class->time_start = $validatedData['time_start'];
$class->time_end = $validatedData['time_end'];


$existingClass = Classes::where('subject_id', $validatedData['subject_id'])
    ->where('time_start', $validatedData['time_start'])
    ->where('time_end', $validatedData['time_end'])
    ->where('day', $validatedData['day'])
    ->first();

if ($existingClass) {
    return redirect()->back()->withErrors('A class with the same subject, time range, and day already exists.');
}




    
        $class->save();
    
        return redirect()->back()->with('success', 'Class succesfully created');
    }
    

}