<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Section;
use App\Models\Strand;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    //

    public function index(Request $request, $id){

        $teacher = Teacher::find($id);
        $email = Auth::user()->email;


        

        $subjects = Subject::select('subject_name', )
        ->whereNull('deleted_at')
        ->orderBy('subject_name')
        ->groupBy('subject_name')
        ->get();

        $sections = Section::select('section_name', 'id')
        ->get();
        $strands = Strand::select('strands', 'id')
        ->get();

        $mondayClasses  = DB::table('classes')
        ->join('strands', 'classes.strand_id', '=', 'strands.id')
        ->join('sections', 'classes.section_id', '=', 'sections.id')
        ->select('day', 'strands.strands as strands', 'sections.section_name as sections', 'subject',
         'time_start', 'time_end')
        ->where('teacher_id', $id)
        ->where('day', 'Monday')
         ->get();



          $tuesdayClasses  = DB::table('classes')
        ->join('strands', 'classes.strand_id', '=', 'strands.id')
        ->join('sections', 'classes.section_id', '=', 'sections.id')
        ->select('day', 'strands.strands as strands', 'sections.section_name as sections', 'subject',
         'time_start', 'time_end')
        ->where('teacher_id', $id)
        ->where('day', 'Tuesday')
         ->get();



         $wedClasses  = DB::table('classes')
        ->join('strands', 'classes.strand_id', '=', 'strands.id')
        ->join('sections', 'classes.section_id', '=', 'sections.id')
        ->select('day', 'strands.strands as strands', 'sections.section_name as sections', 'subject',
         'time_start', 'time_end')
        ->where('teacher_id', $id)
        ->where('day', 'Wednesday')
         ->get();



          $thClasses  = DB::table('classes')
        ->join('strands', 'classes.strand_id', '=', 'strands.id')
        ->join('sections', 'classes.section_id', '=', 'sections.id')
        ->select('day', 'strands.strands as strands', 'sections.section_name as sections', 'subject',
         'time_start', 'time_end')
        ->where('teacher_id', $id)
        ->where('day', 'Thursday')
         ->get();



         $friClasses  = DB::table('classes')
        ->join('strands', 'classes.strand_id', '=', 'strands.id')
        ->join('sections', 'classes.section_id', '=', 'sections.id')
        ->select('day', 'strands.strands as strands', 'sections.section_name as sections', 'subject',
         'time_start', 'time_end')
        ->where('teacher_id', $id)
        ->where('day', 'Friday')
         ->get();



        

       

        return view('admin.classes', compact('teacher', 'email', 
             'subjects', 'sections', 'strands', 'mondayClasses', 'tuesdayClasses',
              'wedClasses', 'thClasses', 'friClasses'));   
    }

    public function addClass(Request $request ){

         $validatedData = $request->validate([
    'teacher_id' => 'required|exists:teachers,id',
    'subject' => 'required|exists:subjects,subject_name',
    'section_id' => 'required|exists:sections,id',
    'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday', 
    'time_start' => 'required|date_format:H:i',
    'time_end' => 'required|date_format:H:i|after:time_start',
    'strand_id' => 'required|exists:strands,id',
    
], [
    'subject.required' => 'The subject field is required.',
    'subject.exists' => 'The selected subject is invalid.',
    'section_id.required' => 'The section field is required.',
    'section_id.exists' => 'The selected section is invalid.',
    'strand_id.required' => 'The strand field is required.',
    'strand_id.exists' => 'The selected strand is invalid.',
    'day.required' => 'The day field is required.',
    'day.in' => 'Please select a valid day.', // 
    'time_start.required' => 'The time start field is required.',
    'time_start.date_format' => 'The time start must be a valid time format (HH:MM).',
    'time_end.required' => 'The time end field is required.',
    'time_end.date_format' => 'The time end must be a valid time format (HH:MM).',
    'time_end.after' => 'The time end must be after the time start.',
]);

           
           Classes::create($validatedData);

           return redirect()->back()->with('success', 'Class succcessfully added');
    }
}
