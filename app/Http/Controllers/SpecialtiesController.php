<?php

namespace App\Http\Controllers;

use App\Models\Specialties;
use Illuminate\Http\Request;

class SpecialtiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Returns all speciality rows
        return Specialties::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialties  $specialties
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get specialties with a specific id
        return Specialties::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialties  $specialties
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialties $specialties)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialties  $specialties
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialties $specialties)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialties  $specialties
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialties $specialties)
    {
        //
    }
}
