<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DoctorQuestion extends Model
{
    use HasFactory;
    
    protected $table = 'doctor_questions';

    protected $fillable = [
        'questions',
        'risks',
    ];

    public function doctor()
    {
        return $this->hasOne(Employee::class, 'id', 'doctor_id');
    }
}
