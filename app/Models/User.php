<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'full_name',
        'phone_number',
        'gender',
        'cedulas',
        'titles',
        'type',
        'doctor',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function type()
    {
        switch ($this->type) {
            case 0:
                return 'Normal';

                break;
            case 1:
                return 'Administrador';

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
        return $this->hasMany('App\Appointment');
    }
}