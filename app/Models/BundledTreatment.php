<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BundledTreatment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bundled_treatments';

    protected $fillable = [
        'color',
        'code',
        'treatment_name',
        'sub_treatments',
        'description',
    ];

    protected $casts = [
        'sub_treatments' => 'array',
    ];
}
