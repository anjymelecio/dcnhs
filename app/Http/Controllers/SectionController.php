<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\Strand;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    //

    public function index(){

        $email = Auth::user()->email;

        $strands = Strand::select('strands', 'id')
        ->get();

        $teachers = Teacher::select('firstname', 'lastname', 'teacher_id', 'id')

        ->get();

        $gradeLevel = GradeLevel::select('level', 'id')
        ->get();

        


        $sections = DB::table('sections')
        ->join('strands', 'strands.id', '=' ,'sections.strand_id')
        ->join('teachers', 'teachers.id', '=', 'sections.teacher_id')
        ->join('grade_levels', 'grade_levels.id', '=', 'sections.grade_level_id')
        ->select('teachers.firstname as firstname', 'teachers.lastname as lastname','teachers.teacher_id as teacher_id', 'sections.section_name as section',
        'sections.id as id',
        'grade_levels.level as level', 'strands.strands as strand',
        'strands.id as strand_id', 'grade_levels.id as grade_level_id',
        'teachers.id as teachers_id')
        ->whereNull('sections.deleted_at')
        ->get();

   
   

        return view('admin.section', compact( 'email', 'strands', 'teachers', 'gradeLevel','sections'));
        
    }

    public function create(Request $request)
{
    $validatedData = $request->validate([
        'section_name' => 'required|string|max:255|unique:sections,section_name',
        'strand_id' => 'required|exists:strands,id',
        'teacher_id' => 'required|exists:teachers,id|unique:sections,teacher_id',
        'grade_level_id' => 'required|exists:grade_levels,id',
       
    ], [
        'section_name.required' => 'The section name field is required.',
        'section_name.string' => 'The section name field must be a string.',
        'section_name.max' => 'The section name field may not be greater than :max characters.',
        'strand_id.required' => 'The strand ID field is required.',
        'strand_id.exists' => 'The selected strand ID is invalid.',
        'teacher_id.required' => 'The teacher ID field is required.',
        'teacher_id.exists' => 'The selected teacher ID is invalid.',
        'teacher_id.unique' => 'The selected teacher already has a section.',
        'grade_level_id.required' => 'The grade level ID field is required.',
        'grade_level_id.exists' => 'The selected grade level ID is invalid.',
        'school_year_id.required' => 'The school year ID field is required.',
        'school_year_id.exists' => 'The selected school year ID is invalid.',
    ]);


$existingSection = Section::where('section_name', $validatedData['section_name'])
        ->where('strand_id', $validatedData['strand_id'])
        ->where('grade_level_id', $validatedData['grade_level_id'])
       
      
        ->first();

    if ($existingSection) {
        return redirect()->back()->withErrors('A section with the same name, strand , adviser, grade level, and school year already exists.')->withInput($validatedData);
    }

  




        


       

    Section::create($validatedData);

    return redirect()->back()->with('success', 'Section successfully created');
}


public function update(Request $request, $id){

    $section = Section::find($id);

    $validatedData = $request->validate([
        'section_name' => 'required|string|max:255',
        'strand_id' => 'required|exists:strands,id',
        'teacher_id' => 'required|exists:teachers,id',
        'grade_level_id' => 'required|exists:grade_levels,id',
     
    ], [
        
    ]);

    $existingSection = Section::where('section_name', $validatedData['section_name'])
        ->where('strand_id', $validatedData['strand_id'])
        ->where('grade_level_id', $validatedData['grade_level_id'])
       
      
        ->first();

    if ($existingSection !== null && $existingSection->id !== $section->id) {
        return redirect()->back()->withErrors('A section with the same name, strand , adviser, grade level, and school year already exists.');
    }

    $section->update($validatedData);

    return redirect()->back()->with('success', 'Section successfully updated');
}

public function delete($id){

    $section = Section::find($id);

    $section->delete();
    return redirect()->back()->with('success', 'Section successfully deleted');
}


    }


   
