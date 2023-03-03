<?php

namespace App\Models;

// use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $hidden = [
        'created_at',
        'updated_at',
        'code',
    ];
}
