<?php

namespace App\Http\Controllers;

use App\Models\FinalGrade;
use App\Models\Grading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GradingController extends Controller
{
    public function index(){

        $email =  Auth::user()->email;

        $gradings = Grading::select('written_works', 'performance_task', 'assesment', 'id')
        ->get();


       $finalGrades = FinalGrade::join('students', 'students.id', '=', 'final_grades.student_id')
       ->join('subjects', 'subjects.id', 'final_grades.subject_id')
    ->join('strands', 'strands.id', 'students.strand_id')
    ->join('teachers', 'teachers.id', '=', 'final_grades.teacher_id')
    ->join('semesters', 'semesters.id', '=', 'final_grades.semester_id')
    ->join('grade_levels', 'grade_levels.id', '=', 'final_grades.grade_level_id')
    ->join('school_years', 'school_years.id', 'final_grades.school_year_id')
   
   ->select(
        'students.firstname as stud_firstname',
        'students.lastname as stud_lastname',
        'final_grades.final_grade as final_grade',
        'teachers.firstname as teach_firstname',
        'teachers.lastname as teach_lastname',
        'semesters.semester',
        'grade_levels.level as level',
        'strands.strands as strand',
        'subjects.subjects as subject',
        'final_grades.quarter as quarter',
        'strands.strands as strand',
        'grade_levels.level as level',
        'subjects.subjects as subject',
        'semesters.semester as semester',
        'final_grades.quarter',
        DB::raw('YEAR(school_years.date_start) as year_start'),
        DB::raw('YEAR(school_years.date_end) as year_end')
    )
    ->orderBy('grade_levels.level')
    ->get();


        return view('admin.grading', compact('email' , 'gradings', 'finalGrades'));
    }

    public function postGrades($id){

        $finalGrades = FinalGrade::find($id);

        $finalGrades->status = 2;

        $finalGrades->updated();



    }

   

   




   
}
