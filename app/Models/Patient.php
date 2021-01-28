<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    public $fillable = [
        'last_name',
        'name',
        'full_name',
        'birth_date',
        'street',
        'street_number',
        'city',
        'state',
        'zip_code',
        'phone_number',
        'gender',
        'status',
        'occupation',
        'email',
        'insured',
        'deductible',
        'country',
        'birth_city',
        'birth_state',
        'birth_country',
    ];
    protected $dates = ['birth_date'];

    public function status()
    {
        switch ($this->status) {
            case 0:
                return 'Otro';

                break;

            case 1:
                return 'Casado';

                break;

            case 2:
                return 'Soltero';

                break;

            default:
                // code...
                break;
        }
    }

    public function occupation()
    {
        switch ($this->occupation) {
            case 0:
                return 'Otro';

                break;

            case 1:
                return 'Empleado';

                break;

            case 2:
                return 'Estudiante';

                break;

            case 3:
                return 'Estudiante tiempo parcial';

                break;

            default:
                // code...
                break;
        }
    }

    public function gender()
    {
        switch ($this->gender) {
            case 0:
                return 'M';

                break;

            case 1:
                return 'F';

                break;

            default:
                // code...
                break;
        }
    }

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }

    public function firstTimePatientForm()
    {
        return $this->hasOne('App\Models\FirstTimePatientForm');
    }
}