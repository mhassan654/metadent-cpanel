<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Procedures extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        "procedure",
        "code",
        "price",
        "facility_id",
    ];

    protected $dates = ['deleted_at'];

    protected $softDelete = true;
}
