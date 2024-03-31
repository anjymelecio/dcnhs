<?php

namespace App\Http\Controllers;

use App\Models\Strand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StrandController extends Controller


{

public function index(){


  $strands = Strand::select('id', 'strands', 'description')
  ->get();

  $email = Auth::user()->email;


   return view('admin.strand', compact('strands', 'email'));


}
    
 
     public function strandPost(Request $request){
         
         $validatedData = $request->validate([
 
 
             'strands' => 'required|string|max:255|unique:strands,strands',
              'description' => 'required|string|max:255|unique:strands,description',
            
         ],[
 
            'strands.required' => 'The Strand name field is required.',
            'description.required' => 'The Description name field is required.',
            'strands.unique' => 'The strand name has already been taken.',
             
             
         ]
         
         );
           
 
           Strand::create($validatedData);
 
          return redirect()->back()->with('success', 'Strand Successfully Created');
 
     }
 
    
 
 
}
