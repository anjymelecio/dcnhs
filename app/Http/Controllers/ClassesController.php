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
   
public function fetchdata(Request $request)
{
    $subjects = StrandSubject::join('strands', 'strands.id', '=', 'strand_subjects.strand_id')
        ->where('strands.id', $request->strand_id)
        ->join('grade_levels', 'grade_levels.id', '=', 'strand_subjects.grade_level_id')
        ->where('grade_levels.id', $request->grade_level_id)
        ->join('semesters', 'semesters.id', '=', 'strand_subjects.semester_id')
        ->where('semesters.id', $request->semester_id)
        ->join('subjects', 'subjects.id', '=', 'strand_subjects.subject_id')
        ->select('subjects.subjects as subjects', 'subjects.id as id')
        ->get();

    // Generate options HTML
    $options = '';
    foreach ($subjects as $subject) {
        $options .= '<option value="' . $subject->id . '">' . $subject->subjects . '</option>';
    }

    return response()->json($options);
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