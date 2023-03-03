<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatientTodayAppointmentsExport implements FromCollection, withHeadings, withMapping
{
    protected $patients;
    public function __construct($patients)
    {
        $this->patients = $patients;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $date = \Carbon\Carbon::now()->format('d-m-Y');
        return
            \App\Models\Patient::with([
                'appointments.status',
                'appointments.treatmentType',
                'appointments.appointmentType',
                'appointments.employees',
                'appointments.source'
            ])->has('appointments')->whereHas('appointments', function ($query) use ($date) {
                $query->where('date', $date);
            })->whereIn('id', $this->patients)->get()->map(function ($patient) use ($date) {
            $patient->setRelation('appointments', $patient->appointments->where('date', $date)->take(1));
            return $patient;
        });
    }

    public function headings(): array
    {
        return [
            'Patient',
            'Phone Number',
            'Email',
            'Treatment',
            'Status',
            'Time',
            'Source'
        ];
    }

    public function map($patient): array
    {
        return [
            $patient?->first_name . ' ' . $patient?->last_name,
            $patient->patient_phone,
            $patient->email,
            !is_null($patient?->appointments[0]?->treatmentType) ? $patient?->appointments[0]?->treatmentType?->title : $patient?->appointments[0]?->appointmentType?->title,
            $patient?->appointments[0]?->status?->status,
            $patient?->appointments[0]?->slots[0]['start-time'] . '-' . $patient?->appointments[0]?->slots[0]['end-time'],
            $patient?->appointments[0]->source?->source
        ];
    }
}