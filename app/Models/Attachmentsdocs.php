<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachmentsdocs extends Model
{
    use HasFactory;

    protected $appends = ["url"];
    public function getUrlAttribute()
    {
        return route('fetch.photo',['file'=>$this->docs,'folder'=>'emailattachments']);;

    }
    protected $fillable =[
        'chatting_id',
        'docs'
    ];

    public function chatting(){
        return $this->belongsTo(Chatting::class);
    }
}
