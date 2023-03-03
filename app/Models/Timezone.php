<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    use HasFactory;

    protected $table = 'timezones';

    protected $fillable = [
        'time_zone_key',
        'time_zone_value'
    ];
}
