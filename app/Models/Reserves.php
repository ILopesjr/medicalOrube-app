<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserves extends Model
{
    use HasFactory;

    protected $fillable = ['id_doctor', 'id_room', 'lease_date', 'available'];

}
