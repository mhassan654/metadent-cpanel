<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerioConfiguration extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'arrangement',
        'created_by',
    ];

    protected $casts = [
        'arrangement' => 'array'
    ];
}
