<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompositeType extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
        'facility_id',
        'material_type',
        'code',
        'material_name'
    ];
}
