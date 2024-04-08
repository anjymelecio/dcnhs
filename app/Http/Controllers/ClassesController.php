<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Strand;
use App\Models\StrandSubject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    public function index(Request $request){


        $email = Auth::user()->email;

        

        $strands = Strand::select('id', 'strands')
        ->orderBy('id')
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
        ->get();

        $gradeLevels = GradeLevel::select('level', 'id')
        ->get();


        $teachers = Teacher::select('id', 'firstname', 'lastname', 'teacher_id')
    ->orderBy('lastname')
    ->get();




    $semesters = Semester::select('semesters.semester', 'semesters.id', 'semesters.status as status',
    DB::raw("YEAR(school_years.date_start) AS start_year"), 
    DB::raw("YEAR(school_years.date_end) AS end_year"))
    ->join('school_years', 'semesters.school_year_id', '=', 'school_years.id')
    ->get();




    $classes = Classes::join('strand_subjects', 'strand_subjects.id', '=',  'classes.strand_subject_id')
    ->join('subjects', 'subjects.id', '=',  'strand_subjects.subject_id')
    ->join('teachers', 'teachers.id', '=', 'classes.teacher_id')
    ->join('strands', 'strands.id', '=', 'classes.strand_id')
    ->join('grade_levels', 'grade_levels.id', '=', 'classes.grade_level_id')
    ->join('sections', 'sections.id', '=', 'classes.section_id')
    ->select('subjects.subjects as subject', 'subjects.id as subject_id',
     'teachers.firstname as firstname', 'teachers.lastname as lastname', 'strands.strands as strand', 
     'grade_levels.level as level', 'sections.section_name as section', 'classes.day as day'
     ,DB::raw("DATE_FORMAT(classes.time_start, '%h:%i %p') AS time_start"),
     DB::raw("DATE_FORMAT(classes.time_end, '%h:%i %p') AS time_end"))
    ->get();

        return view('admin.classes', compact('email', 'strands', 'subjects', 'sections', 
 'teachers', 'gradeLevels', 'semesters', 'classes',));

    }

public function fetchdata(Request $request)
{
   $subjects = StrandSubject::join('subjects', 'subjects.id', '=', 'strand_subjects.subject_id')
        ->join('strands', 'strands.id', '=', 'strand_subjects.strand_id')
        ->where('strands.id', $request->strand_id)
        ->join('grade_levels', 'grade_levels.id', '=', 'strand_subjects.grade_level_id')
        ->where('grade_levels.id', $request->grade_level_id)
        ->join('semesters', 'semesters.id', '=', 'strand_subjects.semester_id')
        ->where('semesters.id', $request->semester_id)
        ->select('subjects.subjects as subjects', 'subjects.id as id')
        ->get();

       $output = '';

   

    foreach ($subjects as $subject) {
    
        $output .= '<option value="' . $subject->id . '">' . $subject->subjects . '</option>';
    }

    return response()->json($output);
}

public function fetchSection(Request $request){

$sections = Section::join('strands', 'strands.id', '=', 'sections.strand_id')
        ->where('strands.id', $request->strand_id)
        ->join('grade_levels', 'grade_levels.id', '=', 'sections.grade_level_id')
        ->where('grade_levels.id', $request->grade_level_id)
        ->select('sections.section_name as sections', 'sections.id as id')
        ->get();

     $output = '';

   

    foreach ($sections as $section) {
    
        $output .= '<option value="' . $section->id . '">' . $section->sections . '</option>';
    }
return response()->json($output);


}

   

  public function create(Request $request)
{
$validatedData = $request->validate([
    'strand_id' => 'required|exists:strands,id',
    'strand_subject_id' => 'required|exists:strand_subjects,id',
    'teacher_id' => 'required|exists:teachers,id',
    'section_id' => 'required|exists:sections,id',
    'grade_level_id' => 'required|exists:grade_levels,id',
    'semester_id' => 'required|exists:semesters,id',
    'day' => 'required',
    'time_start' => 'required|date_format:H:i',
    'time_end' => 'required|date_format:H:i|after:time_start',
], [
    'strand_id.required' => 'The strand field is required.',
    'strand_subject_id.required' => 'The subject field is required.',
    'teacher_id.required' => 'The teacher field is required.',
    'section_id.required' => 'The section field is required.',
    'grade_level_id.required' => 'The grade level field is required.',
    'semester_id.required' => 'The semester field is required.',
    'day.required' => 'The day field is required.',
    'time_start.required' => 'The time start field is required.',
    'time_end.required' => 'The time end field is required.',
    'time_end.after' => 'The time end must be after the time start.',
]);


Classes::create($validatedData);

return redirect()->back()->with('success', 'Class successfully created')->withInput($validatedData);

    
}

}