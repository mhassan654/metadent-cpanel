<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AutoMailCategory;

class AutoMail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'auto_mails';

    protected $fillable = [
        'body',
        'subject',
        'category_id'
    ];

    public function category()
    {
        return $this->hasOne(AutoMailCategory::class,'id','category_id');
    }

}
