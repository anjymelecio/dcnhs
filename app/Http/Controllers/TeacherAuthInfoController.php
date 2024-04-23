<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Strand;
use App\Models\StrandSubject;
use App\Models\Student;
use App\Models\StudentSection;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAuthInfoController extends Controller
{
    //

   public function advisories(){

    $id = Auth::guard('teacher')->user()->id;

    $students = StudentSection::join('students', 'students.id', 'student_sections.student_id')
                              ->join('sections', 'sections.id', 'student_sections.section_id')
                              ->select('students.firstname as firstname', 'students.lastname as lastname', 'students.lrn as lrn')
                              ->where('sections.teacher_id', $id )
                              ->get();

    return view('teacher.advisory', compact('students'));
}

public function classes(){

$teacherId = Auth::guard('teacher')->user()->id;

$classes = Classes::join('strand_subjects', 'strand_subjects.id', '=', 'classes.strand_subject_id')
                  ->join('subjects', 'subjects.id', '=', 'strand_subjects.subject_id')
                  ->join('sections', 'sections.id', '=', 'classes.section_id')
                  ->join('strands', 'strands.id', '=', 'classes.strand_id')
                  ->join('grade_levels', 'grade_levels.id', '=', 'classes.grade_level_id')
                  ->join('semesters', 'semesters.id', '=', 'classes.semester_id')
                  ->join('teachers', 'teachers.id', '=', 'classes.teacher_id')
                  ->select('subjects.subjects as subject',
                            'subjects.id as subject_id',

                            'sections.section_name as section',
                            'sections.id as section_id',
                            'strands.strands as strand',
                            'strands.id as strand_id',
                            'grade_levels.level as level',
                            'grade_levels.id as level_id',
                            'classes.time_start as time_start',
                            'classes.time_end as time_end',
                            'classes.day as day',
                            'semesters.semester as semester')
                            ->where('teachers.id', $teacherId )
                            ->where('semesters.status', 'active')
                  ->get();




                          
    

    return view('teacher.classes', compact('classes'));

}
public function classStudent($strand_id, $grade_level_id, $section_id, $subject_id){

$teacherId = Auth::guard('teacher')->user()->id;


$classes = Classes::join('teachers', 'teachers.id', '=', 'classes.teacher_id')
    ->join('strand_subjects', 'strand_subjects.id', '=', 'classes.strand_subject_id') // Corrected the join condition
    ->join('subjects', 'subjects.id', '=', 'strand_subjects.subject_id')
    ->where('subjects.id', $subject_id)
    ->where('teachers.id', $teacherId)
    ->first();

if(!$classes) {
    abort(403, 'Unauthorized');
}




    $strand = Strand::find($strand_id);
    $level = GradeLevel::find($grade_level_id);
    $section = Section::find($section_id);

    $subject= Subject::find($subject_id);

    
 
        

    $students = Student::join('strands', 'strands.id', '=', 'students.strand_id')
                   ->join('grade_levels', 'grade_levels.id', '=', 'students.grade_level_id')
                   ->join('student_sections', 'student_sections.student_id', '=', 'students.id')
                   ->select('students.*')
                   ->where('strands.id', $strand_id)
                   ->where('grade_levels.id', $grade_level_id)
                   ->where('student_sections.section_id',$section_id )
                   ->get();



    
    return view('teacher.students', compact('students',
     'strand','level', 'section', 'subject'));
}

}
   

