<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Strand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    //

    public function index($id){

        $email = Auth::user()->email;

        $strand = Strand::find($id);

        $semesters = Semester::join('school_years',  'school_years.id', '=', 'semester.school_year_id');

        return view('add.subject', compact('strand', 'email'));


    }
}
