<?php

namespace App\Http\Controllers;

use App\Models\Strand;
use App\Http\Requests\StoreStrandRequest;
use App\Http\Requests\UpdateStrandRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class StrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $email = Auth::user()->email;
        return view('admin.strandadd', compact('email'));
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
