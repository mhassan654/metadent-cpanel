<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'frequency_id',
        'event_id',
        'facility_id',
        'color',
        'code',
        'contact_email',
//        'recurrences',
        'recurrence',
        'contact_name',
        'contact_phone',
        'contact_address',
        'duration',
        'title',
        'doctors',
        'attendees',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'slots',
        'comments',
        'days',
        'date',
    ];

    protected $casts = [
        'doctors' => 'array',
        'days' => 'array',
        'attendees' => 'array',
    ];

    public function employees(){
        return $this->belongsToMany(Employee::class);
    }

    public function frequency(){
        return $this->belongsTo(Frequency::class);
    }

    public function facility(){
        return $this->belongsTo(Facility::class);
    }

}
