<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Strand;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionStudentController extends Controller
{
    //

    public function index( $strand_id,$grade_level_id, $section_id){

        $strand = Strand::find($strand_id);

        $section = Section::find($section_id);

        $level = GradeLevel::find($grade_level_id);

        $email = Auth::user()->email;


        $students = Student::select('lrn', 'lastname', 'firstname', 'middlename', 'id')
        ->where('strand_id', $strand_id)
        ->where('grade_level_id', $grade_level_id)
        ->get();
      


        return view('admin.sectionstudent', compact('email','students', 'strand' , 'level', 'section'));


    }
}
