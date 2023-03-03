<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskMessage extends Model
{
    use HasFactory;

    protected $table = 'task_messages';

    protected $fillable = [
        'task_id',
        'message',
        'time',
        'mentions',
        'sent_by',
        'read'
    ];

    protected $casts = [
        'read' => 'boolean'
    ];
}
