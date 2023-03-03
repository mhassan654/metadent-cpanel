<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class smsPatient extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'phonenumber',
        'message',
        'status',
    ];
}
