<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolyearController extends Controller
{
    
    public function index(){

        $email = Auth::user()->email;

        $schoolYears = SchoolYear::select('date_start', 'date_end', 'school_year_name', 'id')
        ->whereNull('deleted_at')
        ->get();
       
 
      

        return view('admin.schoolyear', compact('email', 'schoolYears'));
    }

    public function schoolYearPost(Request $request){

        $validatedData = $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'school_year_name' => 'required|string|max:255',
        ], [
            'date_start.required' => 'The school year start date is required.',
            'date_start.date' => 'The school year start must be a valid date.',
            'date_end.required' => 'The school year end date is required.',
            'date_end.date' => 'The school year end must be a valid date.',
            'date_end.after' => 'The school year end must be after the school year start.',
            'school_year_name.required' => 'The school year name is required.',
            'school_year_name.string' => 'The school year name must be a string.',
            'school_year_name.max' => 'The school year name must not exceed 255 characters.',
        ]);

         SchoolYear::create($validatedData);
         return redirect()->back()->with('success', 'School Year Created');
        
    }

    public function update(Request $request, $id){

       $schoolYear = SchoolYear::find($id);


        $validatedData = $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'school_year_name' => 'required|string|max:255',
        ], [
            'date_start.required' => 'The school year start date is required.',
            'date_start.date' => 'The school year start must be a valid date.',
            'date_end.required' => 'The school year end date is required.',
            'date_end.date' => 'The school year end must be a valid date.',
            'date_end.after' => 'The school year end must be after the school year start.',
            'school_year_name.required' => 'The school year name is required.',
            'school_year_name.string' => 'The school year name must be a string.',
            'school_year_name.max' => 'The school year name must not exceed 255 characters.',
        ]);

        
        $schoolYear->update($validatedData);
         return redirect()->back()->with('success', 'School Succesfully update');



    }

    public function delete($id){

        $schoolYear= SchoolYear::find($id); 

        $schoolYear->delete();
        return redirect()->back()->with('success', 'School Year deleted successfully.');

    }
}
