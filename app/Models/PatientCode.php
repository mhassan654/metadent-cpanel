<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientCode extends Model
{
    use HasFactory;

    protected $table = 'patient_codes';

    protected $fillable = [
        'patient_id',
        'code'
    ];
}
