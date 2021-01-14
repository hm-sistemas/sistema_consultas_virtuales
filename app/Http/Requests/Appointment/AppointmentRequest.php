<?php

namespace App\Http\Requests\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start' => 'required',
            'end' => 'required',
            'date' => 'required|date',
            'user_id' => 'required',
            'patient_id' => 'required',
            'first_time' => 'required',
            'oximeter' => 'required',
            'thermometer' => 'required',
            'baumanometer' => 'required',
            'glucometer' => 'required',
            'comments' => 'string|nullable',
            'title' => 'string|required',
            'description' => 'string|nullable',
            'service' => 'required',
        ];
    }
}