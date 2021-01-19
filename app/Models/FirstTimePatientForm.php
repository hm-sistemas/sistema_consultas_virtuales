<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstTimePatientForm extends Model
{
    use HasFactory;
    public $fillable = [
        'date',
        'arrival_time',
        'first_consult',
        'first_visit',
        'children',
        'referral',
        'referrer_name',
        'patient_id',
        'contact_name',
        'contact_email',
        'contact_phone_number',
        'insured_name',
        'insured_ssn',
        'insured_relationship',
        'insurer_name',
        'insurer_phone_number',
        'work_name',
        'work_phone_number',
    ];

    protected $dates = ['date', 'arrival_time'];

    public function referral()
    {
        switch ($this->referral) {
            case 0:
                return __('Farmacia');

                break;

            case 1:
                return __('Familiar');

                break;

            case 2:
                return __('Amigo');

                break;

            case 3:
                return __('Sólo');

                break;

            case 4:
                return __('Rótulo');

                break;

            case 5:
                return __('Otro');

                break;

            default:
                // code...
                break;
        }
    }

    public function relationship()
    {
        switch ($this->insured_relationship) {
            case 1:
                return 'Hijo(a).';

                break;

            case 2:
                return 'Esposo(a)';

                break;

            case 3:
                return 'Yo mismo(a)';

                break;

            default:
                // code...
                break;
        }
    }

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }
}