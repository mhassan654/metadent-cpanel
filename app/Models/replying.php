<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class replying extends Model
{
    use HasFactory;

    protected $fillable = [
        'chatting_id',
        'message_id',
        'subject',
        'from_user_id',
        'sender_model',
        'from_fname',
        'from_lname',
        'to_user',
        'replyMessage',
    ];
    public function message()
    {
        return $this->belongsTo(Chatting::class)
                    ->orderBy('id','desc');
    }
}
