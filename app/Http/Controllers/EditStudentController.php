<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class EditStudentController extends Controller
{
    public function updateStudent(Request $request, $id){

        $students = Student::find($id);

       

            $request->validate([
                'lrn' => 'required|numeric|digits:12|unique:students,lrn,'.$id,
                'lastname' => 'required|string|max:255',
                'firstname' => 'required|string|max:255',
                'middlename' => 'required|string|max:255',
                'sex' => 'required|in:Male,Female,male,female',
                'strand_id' => 'required|exists:strands,id',
                'section_id' => 'required|exists:sections,id',
                'grade_level' => 'required|integer|max:255|in:11,12',
                'year_start' => 'required|numeric|digits:4',
                'year_end' => 'required|numeric|digits:4',
                'place_birth' => 'required|string|max:255',
                'birth_date' => 'required|date',
                'email' => 'required|email|max:255|unique:students,email,'.$id,
                  'guardian_id' => 'required|exists:guardians,id',
                'house_address' => 'nullable|string|max:255',
                'brgy' => 'nullable|string|max:255',
                'city' => 'nullable|string|max:255',
                'state' => 'nullable|string|max:255',
                'zip' => 'nullable|numeric|digits:5',
               
        
               ],
        
               [
        
                'lrn.required' => 'LRN is required.',
                'lrn.numeric' => 'LRN must be a number.',
                'lrn.digits' => 'LRN must be exactly :digits digits.',
                'lrn.unique' => 'LRN already exists.',
            
                'lastname.required' => 'Last name is required.',
                'lastname.string' => 'Last name must be a string.',
                'lastname.max' => 'Last name may not be greater than :max characters.',
            
                'firstname.required' => 'First name is required.',
                'firstname.string' => 'First name must be a string.',
                'firstname.max' => 'First name may not be greater than :max characters.',
            
                'middlename.required' => 'Middle name is required.',
                'middlename.string' => 'Middle name must be a string.',
                'middlename.max' => 'Middle name may not be greater than :max characters.',
            
                'sex.required' => 'Sex is required.',
                'sex.in' => 'Please select a valid sex.',
            
                'strand_id.required' => 'Strand is required.',
                'strand_id.exists' => 'Selected strand is invalid.',
                
                'section_id.required' => 'Section is required.',
                'section_id.exists' => 'Selected section is invalid.',
            
                'grade_level.required' => 'Grade level is required.',
                'grade_level.integer' => 'Grade level must be an integer.',
                'grade_level.max' => 'Grade level may not be greater than :max.',
                'grade_level.in' => 'Grade level must be either 11 or 12.',
            
                'year_start.required' => 'Input a valid year.',
                'year_start.numeric' => 'Input a valid year.',
                'year_start.digits' => 'Input a valid year.',
            
                'year_end.required' => 'Input a valid year.',
                'year_end.numeric' => 'Input a valid year.',
                'year_end.digits' => 'Input a valid year.',
            
                'place_birth.required' => 'Place of birth is required.',
                'place_birth.string' => 'Place of birth must be a string.',
                'place_birth.max' => 'Place of birth may not be greater than :max characters.',
            
                'birth_date.required' => 'Date of birth is required.',
                'birth_date.date' => 'Date of birth must be a valid date.',
            
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.max' => 'Email may not be greater than :max characters.',
                'email.unique' => 'Email already exists.',
                 'guardian_id.exist' => 'Selected guardian is invalid',
                 'guardian.required' => 'Selected guardian is invalid',
            
                'house_address.string' => 'House number must be a string.',
                'house_address.max' => 'House number may not be greater than :max characters.',
            
                'brgy.string' => 'Barangay must be a string.',
                'brgy.max' => 'Barangay may not be greater than :max characters.',
            
                'city.string' => 'City must be a string.',
                'city.max' => 'City may not be greater than :max characters.',
            
                'state.string' => 'State must be a string.',
                'state.max' => 'State may not be greater than :max characters.',
            
                'zip.numeric' => 'Zip code must be a number.',
                'zip.digits' => 'Zip code must be exactly :digits digits.',
        
        
               


        ]);
        
        $input = $request->all();

       $students->update($input);
        
        return redirect()->back()->with('success', 'Student update successfully');
    }

    public function archiveStudent($id){
          


        $data = Student::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Student Deleted');
    }
}
