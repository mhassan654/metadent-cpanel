<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    protected $table = 'medical_history';

    protected $fillable = [
        'patient_id',
        'questions',
        'approved',
        'approved_at',
        'approved_by'
    ];

    protected $casts = [
        'others' => 'array',
        'approved' => 'boolean'
    ];
}
