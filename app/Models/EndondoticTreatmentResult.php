<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndondoticTreatmentResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'appointment_id',
        'tooth_number',
        'treatment_id',
        'treatment_results',
        'treatment_price',
        'created_by'
    ];
    public function treatment()
    {
        return $this->hasOne(EndondoticTreatment::class, "id", "treatment_id");
    }
}
