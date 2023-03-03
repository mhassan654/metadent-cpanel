<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PatientsExport implements FromCollection, withHeadings, withMapping
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
        return Patient::whereIn('id', $this->patients)->latest()->get();
    }

    public function headings() :array
    {
        return ['Patient No', 'Patient Name','Patient Phone', 'Gender', 'Birth date', 'Email', 'Address'];
    }

    public function map($patient) :array
    {
        return [
            $patient->unique_identifier,
            $patient->first_name.' '.(is_null($patient->middle_name) ? ' ' : $patient->middle_name).' '.$patient->last_name,
            $patient->patient_phone,
            $patient->gender,
            $patient->birth_date,
            $patient->email,
            $patient->city
        ];
    }

}
