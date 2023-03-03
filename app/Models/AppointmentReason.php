<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentReason extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "reason",
        "facility_id",
    ];

    protected $dates = ['deleted_at'];

    protected $softDelete = true;
}
