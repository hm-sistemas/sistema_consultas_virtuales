<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public $fillable = [
        'start',
        'end',
        'date',
        'title',
        'description',
        'comments',
        'first_time',
        'user_id',
        'patient_id',
        'creator_id',
        'status',
    ];

    protected $dates = ['date', 'start', 'end'];

    public function status()
    {
        switch ($this->status) {
            case 0:
                return 'Cita';

                break;

            case 1:
                return 'Llamada pendiente';

                break;

            case 2:
                return 'Paciente llamará';

                break;

            case 3:
                return 'Otro';

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

    public function doctor()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'creator_id', 'id');
    }
}