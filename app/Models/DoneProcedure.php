<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoneProcedure extends Model
{
    use HasFactory;

    protected $fillable = [
        "patient_id",
        "visit_id",
        "procedure",
        "complete",
        "procedure_price",
        "facility_id"
    ];
}
