<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject',
        'url',
        'method',
        'ip',
        'agent',
        'user_id',
        'date',
        'action',
        'patient_id',
        'section',
        'facility_id',
        'invoice_id',
        'employee_id',
        'appointment_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(Employee::class, 'user_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id')->withTrashed();
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id', 'id')->withTrashed();
    }

}