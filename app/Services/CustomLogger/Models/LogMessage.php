<?php

namespace App\Services\CustomLogger\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogMessage extends Model
{
    use HasFactory;

    // protected $fillable=[
    //     'level',
    //     'level_name',
    //     'message',
    //     'logged_at',
    //     'context',
    //     'extra',
    // ];

     /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'context' => AsArrayObject::class,
        'extra' => AsArrayObject::class,
    ];
}
