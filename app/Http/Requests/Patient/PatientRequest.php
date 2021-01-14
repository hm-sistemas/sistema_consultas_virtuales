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
            'gender' => 'required',
            'phone_number' => 'max:255',
            'email' => 'required|max:255',
            'last_name' => 'required|max:80',
            'name' => 'required|min:2|max:100',
            'status' => 'required',
            'occupation' => 'required',
            'insured' => 'required',
            'deductible' => 'required',
            'street' => 'max:255',
            'street_number' => 'max:255',
            'city' => 'max:255',
            'state' => 'max:255',
            'country' => 'max:255',
            'zip_code' => 'max:255',
            'birth_city' => 'max:255',
            'birth_state' => 'max:255',
            'birth_country' => 'max:255',
        ];
    }
}