<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentBridgeConnector extends Model
{
    use HasFactory;

    protected $fillable=[
        "connector_name",
        "connector_code"
    ];
}
