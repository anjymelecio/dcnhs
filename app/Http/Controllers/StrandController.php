<?php

namespace App\Http\Controllers;

use App\Models\Strand;
use App\Http\Requests\StoreStrandRequest;
use App\Http\Requests\UpdateStrandRequest;
use App\Models\Section;
use App\Models\Teacher;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $email = Auth::user()->email;

       
   
  $sections = DB::table('sections')
    ->select('sections.*', 'id', 'section_name')
    ->get();

     $teachers = DB::table('teachers')
     ->select('teachers.*', 'firstname', 'lastname' , 'rank')
     ->get();


        return view('admin.strand', compact('email','sections' , 'teachers'));
    }
       
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

      
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStrandRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Strand $strand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Strand $strand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStrandRequest $request, Strand $strand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Strand $strand)
    {
        //
    }
}
