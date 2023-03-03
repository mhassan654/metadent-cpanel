<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalarySetup extends Model
{
    use HasFactory;

    protected $table = 'employee_salary_setup';

    protected $fillable = [
        'employee_id',
        'salary_type',
        'salary_type_id',
        'amount',
        'gross_salary',
        'is_percentage',
        'update_id'
    ];
}
