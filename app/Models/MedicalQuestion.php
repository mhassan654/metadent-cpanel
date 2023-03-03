<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalQuestion extends Model
{
    use HasFactory;

    public function subQuestions()
    {
        return $this->hasMany(MedicalSubQuestion::class);
    }
}
