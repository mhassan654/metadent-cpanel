<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    use HasFactory;

    protected $table = 'charts_of_account';

    protected $fillable = [
        'account_name',
        'gl_code',
        'account_type',
        'account_sub_type',
        'description'
    ];
}