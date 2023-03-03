<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemCode extends Model
{
    use HasFactory;

    protected $table = 'system_codes';

    protected $fillable = [
        'code',
        'description'
    ];
}
