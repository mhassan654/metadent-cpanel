<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    use HasFactory;

    protected $fillable =[
        'to_user',
        'first_name',
        'last_name',
        'subject',
        'message',
        'user_id'
    ];
}