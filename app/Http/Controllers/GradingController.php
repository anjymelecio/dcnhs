<?php

namespace App\Http\Controllers;

use App\Models\Grading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradingController extends Controller
{
    public function index(){

        $email =  Auth::user()->email;

        $gradings = Grading::select('written_works', 'performance_task', 'assesment', 'id')
        ->get();

        return view('admin.grading', compact('email' , 'gradings'));
    }

    public function update(Request $request, $id){

        $gradings = Grading::find($id);
        
      




        $validate = $request->validate([

            'written_works' => 'required|numeric|between:0,100',
            'performance_task' => 'required|numeric|between:0,100',
            'assesment' => 'required|numeric|between:0,100',

        ],
    
    [
        'written_works.required' => 'The written works field is required.',
        'written_works.numeric' => 'The written works field must be a number.',
        'written_works.between' => 'The written works field must be between 0 and 100.',
        'performance_task.required' => 'The performance task field is required.',
        'performance_task.numeric' => 'The performance task field must be a number.',
        'performance_task.between' => 'The performance task field must be between 0 and 100.',
        'assesment.required' => 'The assessment field is required.',
        'aassesment.numeric' => 'The assessment field must be a number.',
        'assesment.between' => 'The assessment field must be between 0 and 100.',
    ]
    );


    $total = $validate['written_works'] + $validate['performance_task'] + $validate['assesment'];

    if($total >= 101){

    return redirect()->back()->withErrors('The grading total are not valid');


 



    }

   

    $gradings->update($validate);


    return redirect()->back()->with('success', 'Grading system succesfully update');

        
    }
}
