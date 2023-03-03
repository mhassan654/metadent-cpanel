<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatientLogExport implements FromCollection,  withHeadings, withMapping
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
        return  \App\Models\Patient::whereIn('id', $this->patients)->latest()->get();
    }

    public function headings() :array
    {
        return [
            'Patient Name',
            'Log Date',
            'Action',
            'Description',
            'By',
            'BSN',
            'Birth date'
        ];
    }

    public function map($patient) :array
    {
        $last_log_index = \App\Models\LogActivity::where('patient_id',$patient->id)->with('user:id,first_name,last_name,maiden_name')->latest()->first();
        
        return [
            $patient->first_name.' '.$patient->middle_name.' '.$patient->last_name,
            $last_log_index?->created_at->format('d-m-Y'),
            $last_log_index?->action,
            $last_log_index?->subject,
            $last_log_index?->user?->first_name.' '.$last_log_index?->user?->maiden_name.' '.$last_log_index?->user?->last_name,
            $patient->BSN,
            $patient->birth_date
        ];
    }

}
