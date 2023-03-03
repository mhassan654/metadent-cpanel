<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuickAppointment extends Model
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
        'department_id',
        'period_id',
        'main_doctor',
        'interval',
        'appointment_type_id',
        'doctors',
        'comments',
        'material_name',
        'material_date',
        'date',
        'task_id'
    ];

    protected $table = 'quick_appointments';

    protected $casts = [
        'doctors' => 'array',
    ];

    public function period()
    {
        return $this->hasOne(Period::class, 'id', 'period_id');
    }

    public function patient()
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }

    public function doctor()
    {
        return $this->hasMany(Employee::class, 'id', 'doctor_id');
    }

    public function status()
    {
        return $this->hasOne(AppointmentStatus::class, 'id', 'status_id');
    }

    public function frequency()
    {
        return $this->hasOne(CalendarFrequency::class, 'id', 'frequency_id');
    }

    public function source()
    {
        return $this->hasOne(AppointmentSource::class, 'id', 'source_id');
    }

    public function appointmentType()
    {
        return $this->hasOne(AppointmentType::class, 'id', 'appointment_type_id');
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

    public function treatmentType()
    {
        return $this->hasOne(TreatmentType::class, 'id', 'treatment_type_id');
    }

    public function treatment()
    {
        return $this->hasOne(Treatment::class, 'id', 'treatment_id');
    }

    public function department()
    {
        return $this->hasOne(Department::class,'id','department_id');
    }

    public function task()
    {
        return $this->hasOne(Task::class, 'id','task_id');
    }

}
