<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    protected $fillable = [
        'title',
        'user_id',
        'appointment_date',
        'appointment_time',
        'description',
    ];
}
