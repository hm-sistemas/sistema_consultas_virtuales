<?php

namespace App\Http\Controllers;

use App\Http\Requests\Appointment\AppointmentRequest;
use App\Http\Requests\Appointment\UpdateAppointmentRequest;
use App\Http\Resources\Appointment\AppointmentResource;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointments.index');
    }

    public function filter(Request $request)
    {
        if (!auth()->user()->doctor) {
            return AppointmentResource::collection(Appointment::whereBetween('date', [$request->start, $request->end])
                ->with('doctor', 'patient', 'user')
                ->get())
          ;
        }

        return AppointmentResource::collection(Appointment::whereBetween('date', [$request->start, $request->end])
            ->with('doctor', 'patient', 'user')
            ->where('user_id', auth()->user()->id)
            ->get())
          ;
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
    public function store(AppointmentRequest $request)
    {
        $validated = $request->validated();
        $validated['creator_id'] = auth()->user()->id;
        $validated['status'] = 0;
        $appointment = Appointment::create($validated);

        return (new AppointmentResource($appointment))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Cita ha sido registrada.',
            ],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $appointment = Appointment::findOrFail($request->id);

        return (new AppointmentResource($appointment))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Cita ha sido cargada.',
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request)
    {
        $validated = $request->validated();
        $appointment = Appointment::findOrFail($validated['id']);
        $appointment->fill($validated);
        $appointment->save();

        return (new AppointmentResource($appointment))->additional([
            'meta' => [
                'success' => true,
                'message' => 'Cita ha sido actualizada.',
            ],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return response()->json('Cita ha sido eliminada.', 204);
    }
}