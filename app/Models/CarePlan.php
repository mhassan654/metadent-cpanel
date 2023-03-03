<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarePlan extends Model
{
    use HasFactory;

    protected $casts = [
        'pps_number_date' => 'datetime:d-m-Y',
        'plaque_index_date' => 'datetime:d-m-Y',
        'bleeding_index_date' => 'datetime:d-m-Y',
    ];

    protected $fillable = [
        'patient_id',
        'appointment_id',
        'long_term_goal_one',
        'goal_period',
        'long_term_goal_two',
        'caries_risk',
        'bitewing_interval',
        'caries_risk_explanation',
        'periodontal_risk',
        'periodontal_risk_explanation',
        'wear_risk',
        'wear_risk_explanation',
        'soft_tissue_risk',
        'soft_tissue_risk_explanation',
        'medical_risk',
        'medical_risk_explanation',
        'mouth_hygiene_risk',
        'mouth_hygiene_risk_explanation',
        'pps_number',
        'plaque_index_parcentage',
        'bleeding_index_percentage',
        'pps_number_date',
        'plaque_index_date',
        'bleeding_index_date',
        'created_by',
    ];
}
