<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TreatmentPlan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'main_description',
        'phase_number',
        'tooth',
        'status',
        'treatment_ids',
        'treatment_codes',
        'treatment_amounts',
        'treatment_descriptions',
        'appointments',
        'save_type',
        'created_by',
    ];
}
