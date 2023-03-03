<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeNotification extends Model
{
    use HasFactory;

    protected $fillable=[
        'employee_id',
        'model',
        'message',
        'is_viewed'
    ];
}
