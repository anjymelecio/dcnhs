<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use App\Models\Strand;
use App\Models\StrandSubject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    if (!$strand) {
        return redirect()->back()->with('error', 'Strand not found.');
    }

    if(!empty($request->subject_id)){

        foreach($request->subject_id as  $subject_id){

            $strandSubject = new StrandSubject();
           

           $strandSubject->subject_id = $subject_id;
           $strandSubject->strand_id =  $request->strand_id;
           $strandSubject->grade_level_id =  $request->grade_level_id;
           $strandSubject->semester =  $request->semester;

           $strandSubject->save();


            

          


           





        }


         return redirect()->back()->with('success', 'Subjects added successfully.');

          


    }

    else{


        return redirect()->back()->with('error', 'Due Some error, please try again');
    }


    


}

    
}
