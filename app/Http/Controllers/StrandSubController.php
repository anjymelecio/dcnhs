<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use App\Models\Semester;
use App\Models\Strand;
use App\Models\StrandSubject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StrandSubController extends Controller
{
    //

    public function index($id){

        $email = Auth::user()->email;

        $strand = Strand::find($id);

        $subjects = Subject::select('id', 'subjects')
        ->get();

        $semesters = Semester::select('semesters.id as id', 'semesters.semester as semester', 
        DB::raw('YEAR(school_years.date_start) as year_start'), DB::raw('YEAR(school_years.date_end) as year_end'))
        ->join('school_years', 'school_years.id', 'semesters.school_year_id')
        ->get();

        $gradeLevels = GradeLevel::select('id', 'level')
        ->get();
    
        return view('admin.strandsub', compact('strand', 'email', 'subjects', 'semesters', 'gradeLevels'));



    }


public function create(Request $request, $id)
{
    foreach ($request->subject_id as $subjectId) {
        $strand = Strand::find($id);

        $validatedData = $request->validate([
            'subject_id' => 'required|array|min:1',
            'subject_id.*' => 'exists:subjects,id',
            'semester_id' => 'required|exists:semesters,id',
            'grade_level_id' => 'required|exists:grade_levels,id',
        ], [
            'subject_id.required' => 'Please select at least one subject.',
            'subject_id.*.exists' => 'One or more selected subjects do not exist.',
            'semester_id.required' => 'Please select a semester.',
            'semester_id.exists' => 'The selected semester does not exist.',
            'grade_level_id.required' => 'Please select a grade level.',
            'grade_level_id.exists' => 'The selected grade level does not exist.',
        ]);

      
        $existingSubject = StrandSubject::where('strand_id', $id)
            ->where('subject_id', $subjectId)
            ->first();

        if ($existingSubject) {
            return redirect()->back()->withErrors('One of the subjects already exists in this strand');
        }

     
        $strandSubject = new StrandSubject();
        $strandSubject->strand_id = $strand->id;
        $strandSubject->subject_id = $subjectId;
        $strandSubject->semester_id = $validatedData['semester_id'];
        $strandSubject->grade_level_id = $validatedData['grade_level_id'];
        $strandSubject->save();
    }

    return redirect()->back()->with('success', 'Subjects added successfully');
}



       
        }
        
        
        


    

    

