<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatientAppointmentExport implements FromCollection, withHeadings, withMapping
{
    protected $appointments;

    public function __construct($appointments)
    {
        $this->appointments = $appointments;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Appointment::with(['treatmentType', 'source', 'status', 'employees:id,first_name,last_name'])
            ->whereIn('id', $this->appointments)->latest()
            ->get();
    }
    public function headings(): array
    {
        return ['Treatment', 'Status', 'Date', 'Time', 'Source', 'Doctor(s)'];
    }

    public function map($appointment): array
    {
        $doctors = '';
        foreach ($appointment?->employees as $doctor) {
            if ($doctors == '') {
                $doctors .= $doctor?->first_name . ' ' . $doctor?->last_name;
            } else {
                $doctors .= ',' . $doctor?->first_name . ' ' . $doctor?->last_name;
            }
        }
        return [
            !is_null($appointment?->treatmentType) ? $appointment?->treatmentType->title : $appointment?->appointmentType?->title,
            $appointment?->status?->status,
            $appointment?->date,
            $appointment?->slots[0]['start-time'] . '-' . $appointment?->slots[0]['end-time'],
            $appointment?->source->source,
            $doctors
        ];
    }
}