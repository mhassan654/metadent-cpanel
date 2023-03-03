<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalaryType extends Model
{
    use HasFactory;

    protected $table = 'employee_salary_type';

    protected $fillable = [
        'payment_period'
    ];
}
