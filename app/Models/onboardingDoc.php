<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class onboardingDoc extends Model
{
    use HasFactory;

    protected $appends = ["url"];
    public function getUrlAttribute()
    {
        return route('fetch.photo',['file'=>$this->file_url,'folder'=>'emailattachments']);

    }
    protected $fillable =[
        'patient_id',
        'file_name',
        'add_by',
        'under_category',
        'file_url',
    ];
}
