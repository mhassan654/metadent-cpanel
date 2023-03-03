<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatientTreatmentsExport implements FromCollection, WithHeadings, withMapping
{
    protected $treatments;

    public function __construct($patients)
    {
        $this->patients = $patients;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return \App\Models\Patient::whereIn('id', $this->patients)->with('latestTreatment.invoices')->has('latestTreatment.invoices')->latest()->get();
    }

    public function headings(): array
    {
        return [
            'Patient Name',
            'BSN',
            'Treatment',
            'Date',
            'Time',
            'Invoices',
            'Status'
        ];
    }

    public function map($patient): array
    {
        $invoices = '';
        foreach ($patient?->latestTreatment?->invoices as $invoice) {
            if ($invoices == '') {
                $invoices .= $invoice?->invoice_id;
            } else {
                $invoices .= ',' . $invoice?->invoice_id;
            }
        }
        return [
            $patient?->first_name . ' ' . $patient?->middle_name . ' ' . $patient?->last_name,
            $patient?->BSN,
            '#' . '000' . $patient->latestTreatment?->id,
            $patient?->latestTreatment?->created_at->format('d-m-Y'),
            $patient?->latestTreatment?->created_at->format('h:i A'),
            $invoices,
            $patient->latestTreatment?->treatment_status
        ];
    }
}