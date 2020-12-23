<?php

namespace App\Http\Controllers;

use App\Http\Requests\Patient\PatientRequest;
use App\Http\Resources\Patient\PatientResource;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $search = $request->name;
        $patients = Patient::whereLike(['full_name'], $search)
            ->get()
        ;

        return (PatientResource::collection($patients))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Pacientes han sido cargados.',
            ],
        ]);
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        $validated = $request->validated();
        $patient = Patient::create($validated);

        return (new PatientResource($patient))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Paciente ha sido registrado.',
            ],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
    }
}