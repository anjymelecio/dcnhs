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

class AddClassController extends Controller
{
    //
    public function index($strand, $id){

        $strand = Strand::find($id);



        $email = Auth::user()->email;

        $subjects = StrandSubject::join('subjects', 'subjects.id', '=',  'strand_subjects.subject_id')
        ->join('strands', 'strands.id', '=','strand_subjects.strand_id')
        ->join('semesters', 'semesters.id', '=', 'strand_subjects.semester_id')
        ->select('subjects.subjects as subject', 'strand_subjects.id as id')
        ->where('strands.id', $id)
        
        ->get();

     


        $sections = Section::join('strands', 'strands.id', '=', 'sections.strand_id')
        ->join('grade_levels', 'grade_levels.id', 'sections.grade_level_id')
        ->where('strands.id', $id)
        ->get();


          $teachers = Teacher::select('id', 'firstname', 'lastname', 'teacher_id')
    ->orderBy('lastname')
    ->get();

     $sections = Section::join('strands', 'strands.id', '=', 'sections.strand_id')
        ->join('grade_levels', 'grade_levels.id', 'sections.grade_level_id')
        ->where('strands.id', $id)
         ->select('sections.section_name as sections', 'grade_levels.level as level',
          'strands.strands as strand', 'sections.id as id')
                ->get();

$gradeLevels = GradeLevel::select('level', 'id')
        ->get();


        $semesters = Semester::select('semester', 'id', 'status')
        ->get();
        
$classes = Classes::join('strand_subjects', 'strand_subjects.id', '=', 'classes.strand_subject_id')
    ->join('subjects', 'subjects.id', '=', 'strand_subjects.subject_id')
    ->join('strands', 'strands.id', '=', 'classes.strand_id')
    ->join('sections', 'sections.id', '=', 'classes.section_id')
    ->join('grade_levels', 'grade_levels.id', '=', 'classes.grade_level_id')
    ->join('teachers', 'teachers.id', 'classes.teacher_id')
    ->join('semesters', 'semesters.id', 'classes.semester_id')
    ->select(
        'classes.id as id',
        'subjects.subjects as subject',
        'subjects.id as subject_id',
        'day',
        'grade_levels.level as level',
        'grade_levels.id as level_id',
        'sections.section_name as section',
        'sections.id as section_id',
        'teachers.id as teacher_id',
        'teachers.firstname as firstname',
        'teachers.lastname as lastname',
        'semesters.semester',
        'semesters.id as semester_id',
        'time_start',
        'time_end',
   
    )
    ->where('strands.id', $id)
    ->where('semesters.status', 'active')
    ->whereNull('strands.deleted_at')
    ->get();


        



        return view('admin.classes', compact('strand', 'email', 'subjects',
         'teachers', 'sections', 'gradeLevels', 'semesters', 'classes',));



    }

   public function create(Request $request, $id)
{
    $validatedData = $request->validate([
        'strand_subject_id' => 'required|exists:strand_subjects,id',
        'teacher_id' => 'required|exists:teachers,id',
        'section_id' => 'required|exists:sections,id',
        'grade_level_id' => 'required|exists:grade_levels,id',
        'semester_id' => 'required|exists:semesters,id',
        'day' => 'required',
        'time_start' => 'required|date_format:H:i',
        'time_end' => 'required|date_format:H:i|after:time_start',
    ], [
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

    $classes = new Classes();
 $strand = Strand::find($id);
    

    $classes->strand_id = $strand->id ;

   
    $classes->strand_subject_id = $validatedData['strand_subject_id'];
    $classes->teacher_id = $validatedData['teacher_id'];
    $classes->section_id = $validatedData['section_id'];
    $classes->grade_level_id = $validatedData['grade_level_id'];
    $classes->semester_id = $validatedData['semester_id'];
    $classes->day = $validatedData['day'];
    $classes->time_start = $validatedData['time_start'];
    $classes->time_end = $validatedData['time_end'];

    $classes->save();

    return redirect()->back()->with('success', 'Class successfully created')->withInput($validatedData);
}


public function update(Request $request, $id){

$classes = Classes::find($id);


 $validatedData = $request->validate([
        'strand_subject_id' => 'required|exists:strand_subjects,id',
        'teacher_id' => 'required|exists:teachers,id',
        'section_id' => 'required|exists:sections,id',
        'grade_level_id' => 'required|exists:grade_levels,id',
        'semester_id' => 'required|exists:semesters,id',
        'day' => 'required',
        'time_start' => 'required',
        'time_end' => 'required|after:time_start',
    ], [
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

    $classes->update($validatedData);

return redirect()->back()->with('success', 'Class successfully updated');

}
 

public function delete($id)
{
 
 $class = Classes::find($id);


 $class->delete();

return redirect()->back()->with('success', 'Class successfully deleted');

}

public function schoolClasses(Request $request){
    
 $email = Auth::user()->email;

$classesQuery = Classes::join('strands', 'strands.id', '=', 'classes.strand_id')
    ->join('strand_subjects', 'strand_subjects.id','=', 'classes.strand_subject_id')
    ->join('subjects', 'subjects.id', '=', 'strand_subjects.subject_id')
    ->join('sections', 'sections.id', '=', 'classes.section_id')
    ->join('grade_levels', 'grade_levels.id', '=', 'classes.grade_level_id')
    ->join('teachers', 'teachers.id', '=', 'classes.teacher_id')
    ->select(
        'strands.strands as strands',
        'subjects.subjects as subject',
        'sections.section_name as section',
        'teachers.firstname as firstname',
        'teachers.lastname as lastname',
        DB::raw('LEFT(teachers.middlename, 1) as initial'),
        'classes.day as day',
        'classes.time_start as time_start',
        'classes.time_end as time_end',
        'classes.id as id'
    );

$query = $request->input('query');
session()->flash('old_query', $query);

if ($query) {
    $classesQuery->where(function($queryBuilder) use ($query) {
        $queryBuilder->where('strands.strands', 'LIKE', "%{$query}%")
            ->orWhere('subjects.subjects', 'LIKE', "%{$query}%")
            ->orWhere('sections.section_name', 'LIKE', "%{$query}%")
            ->orWhere('teachers.firstname', 'LIKE', "%{$query}%")
            ->orWhere('teachers.lastname', 'LIKE', "%{$query}%")
            ->orWhere('classes.day', 'LIKE', "%{$query}%");
    });
}

$classes = $classesQuery->get();
                                   

    return view('admin.schoolclass', compact('classes', 'email'));
}

}
