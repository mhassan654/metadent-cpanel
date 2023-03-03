<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatting extends Model
{
    use HasFactory;

    protected $fillable = [
        "from_user_id",
        "from_fname",
        "from_lname",
        "from_email",
        "to_user",
        "to_user_id",
        "sender_model",
        "subject",
        "message",
        "read_at",
        "status",
        "snooze_date",
    ];
    public function emailattachments()
    {
        return $this->hasMany(Attachmentsdocs::class);
    }

    public function ALL_replies()
    {
        return $this->hasMany(replying::class);
    }
    public function scopeToUser($query)
    {
        return $query->select('to_user_id');
    }

    public function scopelistUser($query)
    {
        return $query->select('from_fname', 'from_lname', 'from_email', 'from_user_id');
    }
}
