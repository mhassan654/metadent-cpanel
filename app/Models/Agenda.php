<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $softDelete = true;

    public function doctors(){
        return $this->belongsToMany(Employee::class, 'doctors_agendas');
    }
    /**
     * Get the appointmentType associated with the Agenda
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function appointmentType()
    {
        return $this->belongsTo(AppointmentType::class);
    }

}
