<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use App\Models\Section;
use App\Models\Strand;
use App\Models\Student;
use App\Models\StudentSection;
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

        $pluckSection = StudentSection::select('student_id', 'section_id');

        

        $sectionStuds = StudentSection::join('students', 'students.id', 'student_sections.student_id')
                                             ->join('sections', 'sections.id', '=', 'student_sections.section_id')
                                            ->select('students.lrn as lrn', 'students.lastname as lastname', 
                                            'students.firstname as firstname', 'students.middlename as middlename', 'student_sections.id as id')
                                            ->where('sections.id',$section_id )
                                            ->orderBy('students.lastname')
                                            ->get();



      


        return view('admin.sectionstudent', compact('email','students', 'strand' , 'level', 'section', 'sectionStuds', 'pluckSection'));

        


    }

    public function addStudent(Request $request, $section_id)
    {
        $section = Section::find($section_id);
    

        $validatedData = $request->validate([
            'student_id' => 'required|array|min:1',
            'student_id.*' => 'exists:students,id', 
        ], [
            'student_id.exists' => 'One or more selected students do not exist.', 
            'student_id.required' => 'Please select at least one student'
        ]);
        
    
        foreach ($request->student_id as $studentId) {
            $existingStudent = StudentSection::where('student_id', $studentId)
                                             ->where('section_id', $section_id)
                                             ->first();
    
            if ($existingStudent) {
                return redirect()->back()->withErrors('This student already exists in this section.');
            }
    
            $sectionStud = new StudentSection();
            $sectionStud->section_id = $section->id;
            $sectionStud->student_id = $studentId;
            $sectionStud->save();
        }
    
        return redirect()->back()->with('success', 'Students added successfully to this section');
    }
    
public function delete($id){

    $sectionStud = StudentSection::find($id);

    $sectionStud->delete();

    return redirect()->back()->with('success','This student succesfully remove on this section');


}
      







      



    

  
}
