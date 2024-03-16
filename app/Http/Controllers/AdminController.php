<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Section;
use App\Models\Strand;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect('/admin/dashboard');
        }

        return response()
            ->view('admin.login')
            ->header('Cache-control', 'no-store, no-cache, must-revalidate, max-age=0');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ], [
            'email.required' => 'Please enter an email',
            'email.email' => 'Please enter a valid email',
            'password.required'=> 'Please enter a password'
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect('/admin/dashboard')->with('success', 'Welcome user');
        }

        return redirect('/')
            ->withInput($request->only('email'))
            ->withErrors(['loginError'=> 'Incorrect Email or Password.']);
    }

    public function adminDashboard()
    {
        $email = Auth::user()->email;
        return view('admin.dashboard', compact('email'));
    }

    public function adminLogout()
    {
        auth()->logout();
        return redirect('/');
    }
       public function addStudents(){
       $email = Auth::user()->email;
       $strandName = Strand::all();
        $strands = Strand::select('id','strand_name');
          return view('admin.addstudent', compact('email', 'strands', 'strandName'));
       }
        public function addData(){
       $email = Auth::user()->email;
          return view('admin.add', compact('email'));
       }
    public function addParents()
    {
        $email = Auth::user()->email;
        return view('admin.addparents', compact('email'));
    }

    public function addParentsPost(Request $request)
    {
        $validatedData = $request->validate([
            'lastname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'relationship' => 'required|string|max:255',
            'phone' => 'nullable|numeric|digits_between:10,15',
            'occupation' => 'required|string|max:255',
            'place_of_birth' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email' => 'required|email|max:255|unique:users,email',
            'house_number' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'barangay' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:255',
        ],

        [
    'lastname.required' => 'The lastname field is required.',
    'middlename.required' => 'The middlename field is required.',
    'firstname.required' => 'The firstname field is required.',
    'relationship.required' => 'The relationship field is required.',
    'phone.numeric' => 'The phone must be a number.',
    'phone.digits_between' => 'The phone must be between 10 and 15 digits.',
    'occupation.required' => 'The occupation field is required.',
    'place_of_birth.required' => 'The place of birth field is required.',
    'birth_date.required' => 'The birth date field is required.',
    'birth_date.date' => 'The birth date must be a valid date.',
    'email.required' => 'The email field is required.',
    'email.email' => 'The email must be a valid email address.',
    'email.unique' => 'The email address has already been taken.',
]
        
        );
       
        Guardian::create($validatedData);

        return redirect()->back()->with('success', 'Parent form successfully created');
    }

    public function addSection(Request $request){
       $validatedData = $request->validate([
            'section_name' => ['required', 'max:255' , 'unique:sections,section_name']

       ],

            [
    'section_name.required' => 'The section name is required.',
    'section_name.max' => 'The section name must not exceed 255 characters.'
],
     
       );
          Section::create($validatedData);
     
       return redirect()->back()->with('success', 'Section successfully created');
    }

    public function strandPost(Request $request){
        
        $validatedData = $request->validate([


        'strand_name' => 'required',
        'section_id' => 'required|exists:sections,id', 
        ],[

           'strand_name.required' => 'The strand name field is required.',
            'section_id.required' => 'The section ID field is required.',
            'section_id.exists' => 'The selected section ID is invalid.',
        ]
        
        );
          

          Strand::create($validatedData);

         return redirect()->back()->with('success', 'Strand Successfully Created');

    }

    public function teacher(){
   
  $email = Auth::user()->email;
      return view('admin.teacheradd', compact('email'));

      

    }

    public function updateSection(Request $request, $id){
            
         $section = Section::find($id);

         $request->validate([
         
             'section_name' => ['required', 'max:255' , 'unique:sections,section_name']
         ],

         [

           'strand_name.required' => 'The strand name field is required.',
            'section_id.required' => 'The section ID field is required.',
            'section_id.exists' => 'The selected section ID is invalid.',
        ]
         
         );

         $input = $request->all();
         $section->update($input);
          return redirect()->back()->with('success', 'Section update successfully');
    
    }

    public function addTeacher(Request $request){
              
              $validatedData = $request->validate([
    'teacher_id' => 'numeric|required|digits:7',
    'lastname' => 'required|string|max:255',
    'firstname' => 'required|string|max:255',
    'middlename' => 'required|string|max:255',
    'sex' => 'required|in:male,female', 
    'status' => 'required|in:single,married,widowed',
    'birth_place' => 'required|string|max:255',
    'date_birth' => 'required|date',
    'email' => 'required|email|max:255|unique:users,email',
    'phone_number' => 'numeric|string|digits_between:10,15',
    'house_number' => 'numeric|nullable|string|max:255',
    'street' => 'nullable|string|max:255',
    'brgy' => 'nullable|string|max:255',
    'city' => 'nullable|string|max:255',
    'state' => 'nullable|string|max:255',
    'zip_code' => 'nullable|string|max:255',
        ],
      [
    'teacher_id.numeric' => 'The teacher ID must be a number.',
    'teacher_id.required' => 'The teacher ID field is required.',
    'teacher_id.max' => 'The teacher ID must be 7 characters.',
    'teacher_id.min' => 'The teacher ID must be 7 characters.',
    'lastname.required' => 'The lastname field is required.',
    'lastname.max' => 'The lastname may not be greater than 255 characters.',
    'firstname.required' => 'The firstname field is required.',
    'firstname.max' => 'The firstname may not be greater than 255 characters.',
    'middlename.required' => 'The middlename field is required.',
    'middlename.max' => 'The middlename may not be greater than 255 characters.',
    'sex.required' => 'The sex field is required.',
    'sex.in' => 'The selected sex is invalid.',
    'status.required' => 'The status field is required.',
    'status.in' => 'The selected status is invalid.',
    'birth_place.required' => 'The birth place field is required.',
    'birth_place.max' => 'The birth place may not be greater than 255 characters.',
    'date_birth.required' => 'The date of birth field is required.',
    'date_birth.date' => 'The date of birth must be a valid date.',
    'email.required' => 'The email field is required.',
    'email.email' => 'The email must be a valid email address.',
    'email.max' => 'The email may not be greater than 255 characters.',
    'email.unique' => 'The email has already been taken.',
    'phone_number.numeric' => 'The phone number must be a number.',
    'phone_number.digits' => 'The phone number may not be greater than 15 characters.',
    'house_number.numeric' => 'The house number must be a number.',
    'house_number.max' => 'The house number may not be greater than 255 characters.',
    'street.max' => 'The street may not be greater than 255 characters.',
    'brgy.max' => 'The barangay may not be greater than 255 characters.',
    'city.max' => 'The city may not be greater than 255 characters.',
    'state.max' => 'The state may not be greater than 255 characters.',
    'zip_code.max' => 'The zip code may not be greater than 255 characters.',
]  
        );

        Teacher::create($validatedData );
       return redirect()->back()->with('success', 'Teacher Successfully Created');
    }

  public function addStudentsPost(Request $request){

       $validateData = $request->validate([
             'lrn' => 'required|numeric|digits:12',
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'sex' => 'required|in:male,female',
            'strand_id' => 'required|string|exists:strands,id',
            'section' => 'required|string|max:255',
            'grade_level' => 'required|string|max:255',
            'school_year_start' => 'required|integer|digits:4', 
            'school_year_end' => 'required|integer|digits:4', 
            'place_of_birth' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|max:255|unique:students,email',
            'house_number' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'barangay' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|numeric|digits:5',

       

       ],

       [

       'lrn.required' => 'The LRN field is required.',
'lrn.numeric' => 'The LRN must be a number.',
'lrn.digits' => 'The LRN must be exactly 12 digits long.',
'lastname.required' => 'The last name field is required.',
'lastname.string' => 'The last name must be a string.',
'lastname.max' => 'The last name may not be greater than 255 characters.',
'firstname.required' => 'The first name field is required.',
'firstname.string' => 'The first name must be a string.',
'firstname.max' => 'The first name may not be greater than 255 characters.',
'middlename.required' => 'The middle name field is required.',
'middlename.string' => 'The middle name must be a string.',
'middlename.max' => 'The middle name may not be greater than 255 characters.',
'sex.required' => 'The sex field is required.',
'sex.in' => 'Please select a valid sex.',
'strand_id.required' => 'Please select a valid strand.',
'strand_id.exists' => 'The selected strand is invalid.',
'strand.max' => 'The strand may not be greater than 255 characters.',
'section.required' => 'The section field is required.',
'section.string' => 'The section must be a string.',
'section.max' => 'The section may not be greater than 255 characters.',
'grade_level.required' => 'The grade level field is required.',
'grade_level.string' => 'The grade level must be a string.',
'grade_level.max' => 'The grade level may not be greater than 255 characters.',
'school_year_start.required' => 'The school year start field is required.',
'school_year_start.integer' => 'The school year start must be an integer.',
'school_year_start.digits' => 'Please enter a valid year.',
'school_year_end.required' => 'Please enter a valid year.',
'school_year_end.integer' => 'The school year end must be an integer.',
'school_year_end.digits' => 'The school year end must be exactly 4 digits long.',
'place_of_birth.required' => 'The place of birth field is required.',
'place_of_birth.string' => 'The place of birth must be a string.',
'place_of_birth.max' => 'The place of birth may not be greater than 255 characters.',
'date_of_birth.required' => 'The date of birth field is required.',
'date_of_birth.date' => 'Please enter a valid date of birth.',
'email.required' => 'The email field is required.',
'email.email' => 'Please enter a valid email address.',
'email.max' => 'The email may not be greater than 255 characters.',
'email.unique' => 'The email has already been taken.',
'house_number.string' => 'The house number must be a string.',
'house_number.max' => 'The house number may not be greater than 255 characters.',
'street.string' => 'The street must be a string.',
'street.max' => 'The street may not be greater than 255 characters.',
'barangay.string' => 'The barangay must be a string.',
'barangay.max' => 'The barangay may not be greater than 255 characters.',
'city.string' => 'The city must be a string.',
'city.max' => 'The city may not be greater than 255 characters.',
'state.string' => 'The state must be a string.',
'state.max' => 'The state may not be greater than 255 characters.',
'zip_code.numeric' => 'The zip code must be a number.',
'zip_code.digits' => 'The zip must be 5 characters.',


       ]

       
       
       );

       Student::create($validateData);

      
       

       return redirect()->back()->with('success', 'Students Successfully Created');
  }
}
