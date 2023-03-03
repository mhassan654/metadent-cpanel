<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'code',
        'color',
        'agenda_interval',
        'for_web',
        'doctors',
        'week_days',
        'start_time',
        'end_time',
        'start_date',
        'end_date',
        'facility_id',
        'notes',
    ];

    protected $dates = ['deleted_at'];

    protected $softDelete = true;

    protected $casts = [
        'doctors' => 'array',
        'week_days' => 'array',
    ];

    public function employees(){
        return $this->belongsToMany(Employee::class,'appointment_type_employee');
    }
}

// {
//     "title": "",
//     "code": "",
//     "color": "",
//     "duration": "",
//     "agenda_interval": "",
//     "for_web": "",
//     "doctors": "",
//     "week_days": "",
//     "start_time": "",
//     "end_time": "",
//     "start_date": "",
//     "end_date": "",
//     "frequency_id": "",
//     "facility_id": "",
//     "notes": "",
// }
