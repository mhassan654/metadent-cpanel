<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'facility_id',
        'patient_id',
        'type_id',
        'status_id',
        'source_id',
        'treatment_type_id',
        'treatment_id',
        'parent_id',
        'period_id',
        'frequency_id',
        'department_id',
        'frequency_value',
        'interval',
        'appointment_type_id',
        'doctors',
        'date',
        'slots',
        'comments',
        'material_name',
        'material_date',
        'treatment_plan_id',
        'phase_id',
        'is_recallable'
    ];

    protected $casts = [
        'doctors' => 'array',
        'slots' => 'array',
    ];

    protected $dates = ['deleted_at'];

    protected $softDelete = true;

    public function period()
    {
        return $this->hasOne(Period::class, 'id', 'period_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->hasMany(Employee::class, 'id', 'doctor_id');
    }

    public function status()
    {
        return $this->belongsTo(AppointmentStatus::class, 'status_id', 'id');
    }

    public function frequency()
    {
        return $this->belongsTo(CalendarFrequency::class, 'frequency_id', 'id');
    }

    public function source()
    {
        return $this->belongsTo(AppointmentSource::class,'source_id','id');
    }

    public function appointmentType()
    {
        return $this->belongsTo(AppointmentType::class);
    }


    // public function procedure()
    // {
    //     return $this->hasOne(Procedures::class,'id','procedure_id');
    // }

    public function mainDoctor()
    {
        return $this->hasOne(Employee::class, 'id', 'main_doctor_id');
    }

    public function doctors(){
        return $this->belongsToMany(Employee::class, 'doctors_appointments');
    }

    public function recurrencies(): HasMany
    {
        return $this->hasMany(__CLASS__,'parent_id', 'id');
    }

    public function treatmentType()
    {
        return $this->belongsTo(TreatmentType::class);
    }

    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function employees(){
        return $this->belongsToMany(Employee::class)->withTimestamps();
    }

    public function treatmentPlan(){
        return $this->belongsTo(TreatmentPlan::class);
    }


}
