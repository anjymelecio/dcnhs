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
        ->orderBy('subjects')
        ->get();

        $semesters = Semester::select('semesters.id as id', 'semesters.semester as semester')
        ->get();

        $gradeLevels = GradeLevel::select('id', 'level')
        ->get();


        $strandSubjects = StrandSubject::join('subjects', 'subjects.id', '=', 'strand_subjects.subject_id')
    ->join('semesters', 'semesters.id', '=', 'strand_subjects.semester_id')
    ->join('grade_levels', 'grade_levels.id', '=', 'strand_subjects.grade_level_id')
    ->select('subjects.subjects as subject', 'subjects.id as subject_id', 'semesters.semester as semester',
        'semesters.id as semester_id', 'grade_levels.level as level', 'grade_levels.id as grade_level_id', 'strand_subjects.id as id')
        ->where('strand_subjects.strand_id', $id)
    ->get();




    
        return view('admin.strandsub', compact('strand', 'email', 'subjects',
         'semesters', 'gradeLevels', 'strandSubjects'));



    }


public function create(Request $request, $id)
{

if($request->has('subject_id') && $request->subject_id !== null){



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

      
            return redirect()->back()->withErrors("The subject already exists in this strand");
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

    else{

    return redirect()->back()->withErrors('Please select subject');


    }
    
}

public function delete($id){

    try {
        $strandSub = StrandSubject::findOrFail($id);
        $strandSub->delete();
        return redirect()->back()->with('success', 'This subject was successfully deleted on this strand');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors('Error deleting subject: ' . $e->getMessage());
    }
        
        


    

    
    }
}
    
