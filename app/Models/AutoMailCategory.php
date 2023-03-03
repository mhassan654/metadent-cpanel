<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AutoMailCategory extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'auto_email_categories';

    protected $fillable = [
        'name'
    ];

}
