<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'treatement_id',
        'procedure_id',
        'slots',
        'end',
    ];
}
