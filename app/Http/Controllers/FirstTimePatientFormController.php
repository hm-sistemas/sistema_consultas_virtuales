<?php

namespace App\Http\Controllers;

use App\Actions\FillFirstTimePatientFormPDF;
use App\Models\FirstTimePatientForm;
use App\Models\Patient;
use Illuminate\Http\Request;

class FirstTimePatientFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(FirstTimePatientForm $firstTimePatientForm)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(FirstTimePatientForm $firstTimePatientForm)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FirstTimePatientForm $firstTimePatientForm)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(FirstTimePatientForm $firstTimePatientForm)
    {
    }

    public function fillForm(Patient $patient, Request $request)
    {
        $output = $request['output'];

        $filler = new FillFirstTimePatientFormPDF($patient);
        $filler->fill($output);
    }
}