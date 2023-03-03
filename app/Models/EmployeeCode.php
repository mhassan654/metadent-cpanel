<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCode extends Model
{
    use HasFactory;


    public $table = "employee_codes";

    protected $fillable = [
        'employee_id',
        'code',
        'credentials',
        'expire_time',
        'is_used',
        'last_login_time'
    ];
}
