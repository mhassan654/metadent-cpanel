<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalaryPayment extends Model
{
    use HasFactory;

    protected $table = 'employee_salary_payment';

    protected $fillable = [
        'employee_id',
        'total_salary',
        'total_working_minutes',
        'working_period',
        'payment_due',
        'payment_date',
        'salary_name',
        'payment_type',
        'bank_name',
        'paid_by'
    ];
}
