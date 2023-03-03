<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalSubQuestion extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function medicalQuestion()
    {
        return $this->belongsTo(MedicalQuestion::class, 'medical_question_id');
    }
}
