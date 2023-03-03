<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        "patient_id",
        "doctor_id",
        "appointment_id",
        "check_in_time",
        "check_out_time"
    ];
}
