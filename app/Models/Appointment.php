<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_patient',
        'id_doctor',
        'initial_time_attendance',
        'end_time_attendance',
        'complaint_disease',
        'proceedings',
        'height',
        'weight',
        'age',
        'gender',
        'service_date',
        'visible'
    ];
}
