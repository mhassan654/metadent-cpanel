<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class AppointmentsExport implements FromCollection, withHeadings, withMapping
{
    protected $final_appointments;

    public function __construct($final_appointments) 
    {
        $this->appointments = $final_appointments;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Appointment::with(['patient:id,first_name,last_name','status','source','treatmentType','appointmentType','employees:id,first_name,last_name'])
        ->where('facility_id',auth()->user()->facility_id)
        ->whereIn('id',$this->appointments)->latest()->get();
    }

    public function headings() :array
    {
        return ['Patient','Treatment','Status','Date','Time','By','Source'];
    }

    public function map($appointment) :array
    {
        $doctors = '';
        foreach($appointment?->employees as $doctor){
                if($doctors == ''){
                    $doctors .= $doctor?->first_name.' '.$doctor?->last_name;
                }else {
                    $doctors .= ','.$doctor?->first_name.' '.$doctor?->last_name;
                }
        }
        return [
            $appointment?->patient?->first_name.' '.$appointment?->patient?->last_name,
            !is_null($appointment?->treatment_type) ? $appointment?->treatment_type?->title : $appointment?->appointment_type?->title,
            $appointment?->status?->status,
            $appointment?->date,
            $appointment?->slots[0]['start-time'].'-'.$appointment?->slots[0]['end-time'],
            $doctors,
            $appointment?->source?->source
        ];
    }
}
