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
       $sections = Section::select('id', 'section_name')
       ->get();
        $strands = Strand::select('id','strands')
        ->get();
        ;
          return view('admin.addstudent', compact('email', 'strands', 'strands', 'sections'));
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


            'strands' => 'required|string|max:255',
            'section_id' => 'required|exists:sections,id',
            'teacher_id' => 'required|exists:teachers,id',
        ],[

           'strands.required' => 'The strand name field is required.',
            'section_id.required' => 'The section ID field is required.',
            'section_id.exists' => 'The selected section ID is invalid.',
            'teacher_id.required' => 'Select an Adviser.',
            'teacher_id.exists' => 'The selected section ID is invalid.',
        ]
        
        );
          

          Strand::create($validatedData);

         return redirect()->back()->with('success', 'Strand Successfully Created');

    }

    public function teacher(){
   
  $email = Auth::user()->email;
  $teachers = Teacher::all();
      return view('admin.teacheradd', compact('email', 'teachers'));

      

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
    'teacher_id' => 'numeric|required|digits:7|unique:teachers,teacher_id',
    'password' => 'string',
    'lastname' => 'required|string|max:255',
    'firstname' => 'required|string|max:255',
    'middlename' => 'required|string|max:255',
    'rank' => 'required|in:Teacher I,Teacher II,Teacher III,Master Teacher I,Master Teacher II,Master Teacher III,Master Teacher IV',
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
        
     'teacher_id.unique' => 'The teacher ID has already been taken.',
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
    'rank.required' => 'Please select a rank.',
    'rank.in' => 'The selected rank is invalid.',
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
        'lrn' => 'required|numeric|digits:12|unique:students,lrn',
        'lastname' => 'required|string|max:255',
        'firstname' => 'required|string|max:255',
        'middlename' => 'required|string|max:255',
        'sex' => 'required|in:male,female',
        'strand_id' => 'required|exists:strands,id',
        'section_id' => 'required|exists:sections,id',
        'grade_level' => 'required|integer|max:255|in:11,12',
        'year_start' => 'required|numeric|digits:4',
        'year_end' => 'required|numeric|digits:4',
        'place_birth' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'email' => 'required|email|max:255|unique:students,email',
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


       ]
       
       
       );
       $validateData['password'] = bcrypt($validateData['lrn']);

              Student::create($validateData);
       return redirect()->back()->with('success', 'Students Successfully Created');
  }
}
