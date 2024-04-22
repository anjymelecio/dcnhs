<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class GuardianController extends Controller
{
    //
    public function index(){

        $email = Auth::user()->email;

        return view('admin.guardian', compact('email'));
    }

    public function create(Request $request)
{
  $validatedData =   $request->validate([
         'password' => 'string',
        'lastname' => 'required|string|max:255',
        'middlename' => 'required|string|max:255',
        'firstname' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'occupation' => 'required|string|max:255',
        'place_of_birth' => 'required|string|max:255',
        'email' => 'required|string|email|unique:guardians|max:255',
        'birth_date' => 'required|date',
        'street' => 'nullable|string|max:255',
        'barangay' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'sex' => 'required|in:Male,Female',
    ] , [
    'lastname.required' => 'Please provide your last name.',
    'middlename.required' => 'Please provide your middle name.',
    'firstname.required' => 'Please provide your first name.',
    'phone.required' => 'Please provide your phone number.',
    'occupation.required' => 'Please provide your occupation.',
    'place_of_birth.required' => 'Please provide your place of birth.',
    'email.required' => 'Please provide your email address.',
    'email.email' => 'Please provide a valid email address.',
    'email.unique' => 'The email address has already been taken.',
    'birth_date.required' => 'Please provide your birth date.',
    'sex.required' => 'Please select a sex.',
    'sex.in' => 'The selected sex is invalid.',
]);


    $validatedData['password'] = bcrypt('password1234');

    Guardian::create($validatedData);

    return redirect()->back()->with('success', 'Guardian successfully created');

     
}


public function data(){
    $email = Auth::user()->email;

    $datas = Guardian::select('id', 'lastname', 'firstname', 'middlename', 'phone', 'occupation', 'place_of_birth',
                          'email', 'birth_date', 'street', 'barangay', 'city', 'sex')
                ->whereNull('deleted_at')
                ->get();

    return view('data.guardians', compact('email','datas'));
}

public function update(Request $request, $id) {
    $data = Guardian::findOrFail($id);

    $validatedData = $request->validate([
        'password' => 'nullable|string', 
        'lastname' => 'required|string|max:255',
        'middlename' => 'required|string|max:255',
        'firstname' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'occupation' => 'required|string|max:255',
        'place_of_birth' => 'required|string|max:255',
        'email' => 'required|string|email|unique:guardians,email,' . $data->id . ',id|max:255',
        'birth_date' => 'required|date',
        'street' => 'nullable|string|max:255',
        'barangay' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'sex' => 'required|in:Male,Female',
    ], [
        'lastname.required' => 'Please provide your last name.',
        'middlename.required' => 'Please provide your middle name.',
        'firstname.required' => 'Please provide your first name.',
        'phone.required' => 'Please provide your phone number.',
        'occupation.required' => 'Please provide your occupation.',
        'place_of_birth.required' => 'Please provide your place of birth.',
        'email.required' => 'Please provide your email address.',
        'email.email' => 'Please provide a valid email address.',
        'email.unique' => 'The email address has already been taken.',
        'birth_date.required' => 'Please provide your birth date.',
        'sex.required' => 'Please select a sex.',
        'sex.in' => 'The selected sex is invalid.',
    ]);


    if(isset($validatedData['password'])) {
        $validatedData['password'] = bcrypt($validatedData['password']);
    }

    $data->update($validatedData);

    return redirect()->back()->with('success', 'Guardian successfully updated');
}

public function delete($id){


$guardian = Guardian::find($id);

$guardian->delete();

return redirect()->back()->with('success', 'Guardian successfully deleted');





}

public function archive(){

    $email = Auth::user()->email;

   $datas = Guardian::onlyTrashed()
    ->select('id', 'lastname', 'firstname', 'middlename', 'phone', 'occupation', 'place_of_birth',
             'email', 'birth_date', 'street', 'barangay', 'city', 'sex')
    ->get();


    return view('deleted.guardians', compact('email','datas'));



}

public function restore($id){
    $guardian = Guardian::onlyTrashed()->find($id);

   
    if (!$guardian) {
        return redirect()->back()->with('error', 'Guardian not found');
    }

  
    $guardian->restore();

    return redirect()->back()->with('success', 'Guardian successfully restored');


}




}
