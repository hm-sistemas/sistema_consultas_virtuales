<?php

namespace App\Http\Requests\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
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
            'id' => 'required',
            'start' => 'required|date|before:end',
            'end' => 'required|date|after:start',
            'user_id' => 'required',
            'comments' => 'string|nullable',
            'title' => 'string|required',
            'description' => 'string|nullable',
        ];
    }
}