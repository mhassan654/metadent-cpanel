<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToggleSettings extends Model
{
    use HasFactory;

    protected $table = 'toggle_settings';

    protected $fillable = [
        'name',
        'status'
    ];
}
