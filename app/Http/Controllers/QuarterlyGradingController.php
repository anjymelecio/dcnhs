<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuarterlyGradingController extends Controller
{
    public function index(){
        

        return view('teacher.studentgrades', compact('hello'));
    }
}
