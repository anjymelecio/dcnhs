<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $email = Auth::user()->email;
        
        return view('admin.section', compact('email'));
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
    public function store(StoreSectionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectionRequest $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        //
    }
}
