<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryType extends Model
{
    use HasFactory;

    protected $table = 'salary_types';

    protected $fillable = [
        'salary_name',
        'employee_salary_type',
        'default_amount',
        'status'
    ];

    protected $primaryKey = 'salary_type_id';
    
}
