<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;
    protected $table = 'audiences';
    protected $fillable = [
        'name'
    ];

    public function patients()
    {
        return $this->belongsToMany(Patient::class)->select(array('patients.id', 'first_name', 'middle_name', 'last_name'));
    }
}