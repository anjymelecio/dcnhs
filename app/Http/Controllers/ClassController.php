<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Strand;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    //

    public function index($id){

        $teacher = Teacher::find($id);
        $email = Auth::user()->email;

        $subjects = Subject::select('subject_name')
        ->whereNull('deleted_at')
        ->groupBy('subject_name')
        ->orderBy('subject_name')
        ->get();

        $sections = Section::select('section_name')
        ->get();
        $strands = Strand::select('strands')
        ->get();

        return view('admin.classes', compact('teacher', 'email', 'subjects', 'sections', 'strands'));
    }

    public function addClass(Request $request){

         $validateData = $request->validate([
         
         ]);
    }
}
