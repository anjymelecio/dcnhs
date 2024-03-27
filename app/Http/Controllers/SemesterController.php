<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SemesterController extends Controller
{
    //

    public function index(){
        $email = Auth::user()->email;

        $years = SchoolYear::select('id', 'date_start', 'date_end')
        ->get();

        return view('admin.semester', compact('email', 'years'));
    }
}
