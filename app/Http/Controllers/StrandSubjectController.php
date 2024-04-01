<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use App\Models\Strand;
use App\Models\StrandSubject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StrandSubjectController extends Controller
{
    //

    public function addSubject($id){

        $email = Auth::user()->email;

        $strand = Strand::find($id);

        $subjects = Subject::select('id', 'subject_name')
        ->get();

        $gradeLevel = GradeLevel::select('id', 'level')
        ->get();

        return view('admin.strandsubject' , compact('strand', 'subjects', 'gradeLevel', 'email'));




    }



public function storeSubject(Request $request, $id)
{
    $strand = Strand::find($id);

    // Check if the strand exists
    if (!$strand) {
        return redirect()->back()->with('error', 'Strand not found.');
    }

    // Validate the request data
    $request->validate([
        'subject_id' => 'required|array', 
        'subject_id.*' => 'exists:subjects,id',
        'strand_id' => 'required|exists:strands,id', 
        'grade_level_id' => 'required|exists:grade_levels,id', 
        'semester' => 'required', 
    ]);

    foreach ($request->subject_id as $subject_id) {
      
       $subjectIds = implode(', ', $request->subject_id);
        $existingSubject = StrandSubject::where('strand_id', $request->strand_id)
            ->where('grade_level_id', $request->grade_level_id)
            ->where('subject_id', $subject_id)
            
            ->first();

        // If subject already exists, skip adding it
        if ($existingSubject) {
        return redirect()->back()->withErrors(['subject_id'=>  'This subject already added in this strand.']);
    }

        // If subject doesn't exist for the strand and grade level, create a new record
        $strandSubject = new StrandSubject();
        $strandSubject->subject_id = $subject_id;
        $strandSubject->strand_id = $request->strand_id;
        $strandSubject->grade_level_id = $request->grade_level_id;
        $strandSubject->semester = $request->semester;
        $strandSubject->save();
    }

    return redirect()->back()->with('success', 'Subjects added successfully.');
}


 public function showSubjectStrand($id)
{

    $strand = Strand::find($id);


    if (!$strand) {
        return redirect()->back()->with('error', 'Strand not found.');
    }


    $email = Auth::user()->email;


    $elevenFirst = StrandSubject::query()
        ->join('subjects', 'subjects.id', '=', 'strand_subjects.subject_id')
        ->join('strands', 'strands.id', '=', 'strand_subjects.strand_id')
        ->join('grade_levels', 'grade_levels.id', '=', 'strand_subjects.grade_level_id')
        ->where('strand_subjects.semester', '1st semester')
        ->where('strand_subjects.strand_id', $id)
        ->where('grade_levels.level', 11)
        ->select('subjects.subject_name as subject', 'strands.strands as strand', 'strand_subjects.semester', 'grade_levels.level as level', 'strand_subjects.id as id ')
        ->get();


         $elevenSecond = StrandSubject::query()
        ->join('subjects', 'subjects.id', '=', 'strand_subjects.subject_id')
        ->join('strands', 'strands.id', '=', 'strand_subjects.strand_id')
        ->join('grade_levels', 'grade_levels.id', '=', 'strand_subjects.grade_level_id')
        ->where('strand_subjects.semester', '2nd semester')
        ->where('strand_subjects.strand_id', $id) 
         ->where('grade_levels.level', 11)
        ->select('subjects.subject_name as subject', 'strands.strands as strand', 'strand_subjects.semester', 'grade_levels.level as level' , 'strand_subjects.id as id')
        ->get();


        $twelveFirst = StrandSubject::query()
        ->join('subjects', 'subjects.id', '=', 'strand_subjects.subject_id')
        ->join('strands', 'strands.id', '=', 'strand_subjects.strand_id')
        ->join('grade_levels', 'grade_levels.id', '=', 'strand_subjects.grade_level_id')
        ->where('strand_subjects.semester', '1st semester')
        ->where('strand_subjects.strand_id', $id)
         ->where('grade_levels.level', 12)
        ->select('subjects.subject_name as subject', 'strands.strands as strand', 'strand_subjects.semester', 'grade_levels.level as level', 'strand_subjects.id as id')
        ->get();


           $twelveSecond = StrandSubject::query()
        ->join('subjects', 'subjects.id', '=', 'strand_subjects.subject_id')
        ->join('strands', 'strands.id', '=', 'strand_subjects.strand_id')
        ->join('grade_levels', 'grade_levels.id', '=', 'strand_subjects.grade_level_id')
        ->where('strand_subjects.semester', '1st semester')
        ->where('strand_subjects.strand_id', $id) 
        ->where('grade_levels.level', 12)
        ->select('subjects.subject_name as subject', 'strands.strands as strand', 'strand_subjects.semester', 'grade_levels.level as level', 'strand_subjects.id as id')
        ->get();

    
    return view('data.strandsubject', compact('elevenFirst', 'elevenSecond' , 'twelveFirst' ,
    'twelveSecond'
    , 'strand', 'email'));
}



    
}
