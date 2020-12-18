<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'full_name' => 'max:250|required',
            'birth_date' => 'date',
            'gender' => 'max:255',
            'phone_number' => 'max:255',
            'email' => 'max:255',
            'last_name' => 'required|max:80',
            'name' => 'required|min:2|max:100',
        ];
    }
}