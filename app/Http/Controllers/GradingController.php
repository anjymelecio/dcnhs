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

    public function update(Request $request, $id){

        $gradings = Grading::find($id);
        
      




        $validate = $request->validate([

            'written_works' => 'required|numeric|between:0,100',
            'performance_task' => 'required|numeric|between:0,100',
            'assesment' => 'required|numeric|between:0,100',

        ],
    
    [
        'written_works.required' => 'The written works field is required.',
        'written_works.numeric' => 'The written works field must be a number.',
        'written_works.between' => 'The written works field must be between 0 and 100.',
        'performance_task.required' => 'The performance task field is required.',
        'performance_task.numeric' => 'The performance task field must be a number.',
        'performance_task.between' => 'The performance task field must be between 0 and 100.',
        'assesment.required' => 'The assessment field is required.',
        'aassesment.numeric' => 'The assessment field must be a number.',
        'assesment.between' => 'The assessment field must be between 0 and 100.',
    ]
    );


    $total = $validate['written_works'] + $validate['performance_task'] + $validate['assesment'];

    if($total >= 101){

    return redirect()->back()->withErrors('The grading total are not valid');


 



    }

   

    $gradings->update($validate);


    return redirect()->back()->with('success', 'Grading system succesfully update');

        
    }
}
