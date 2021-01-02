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
        'phone_number',
        'gender',
        'email',
    ];
    protected $dates = ['birth_date'];

    public function gender()
    {
        switch ($this->gender) {
            case 0:
                return 'Masculino';

                break;

            case 1:
                return 'Femenino';

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
}