<?php

namespace App\Http\Controllers;

use App\Http\Requests\Patient\PatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Http\Resources\Patient\PatientResource;
use App\Models\FirstTimePatientForm;
use App\Models\Patient;
use Carbon\Carbon;
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
        $patients = Patient::paginate(20);

        return view('patients.index', compact('patients'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $search = $request->name;
        $patients = Patient::query()->whereLike(['full_name'], $search)
            ->get()->take(15)
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
        $validated['patient_id'] = $patient->id;
        $validated['arrival_time'] = Carbon::createFromFormat('Y-m-d H:i', $validated['date'].' '.$validated['time']);

        FirstTimePatientForm::create($validated);

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
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $validated = $request->validated();
        $patient->full_name = $validated['name'].' '.$validated['last_name'];
        $patient->fill(($validated));
        $patient->save();

        $validated['arrival_time'] = Carbon::createFromFormat('Y-m-d H:i', $validated['date'].' '.$validated['arrival_time']);

        $validated['first_consult'] = $request->has('first_consult');
        $validated['first_visit'] = $request->has('first_visit');
        $validated['insured'] = $request->has('insured');

        $patient->firstTimePatientForm->fill(($validated));
        $patient->firstTimePatientForm->save();

        return redirect()->route('patients.show', $patient)->withStatus(__('Paciente actualizado.'));
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