<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalarySetupHeader extends Model
{
    use HasFactory;

    protected $table = 'salary_setup_header';

    protected $fillable = [
        'employee_id',
        'salary_payable',
        'abscent_payable',
        'tax_manager',
        'status'
    ];
}
