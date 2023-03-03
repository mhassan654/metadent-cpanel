<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextAppointment extends Model
{
    use HasFactory;

    // protected $fillable =[
    //     "patient_id",

    // ]


    /**
     * Get the appointment that owns the NextAppointment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class, 'main_appointment_id', 'id');
    }
}
