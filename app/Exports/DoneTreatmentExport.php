<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DoneTreatmentExport implements FromCollection, withHeadings, withMapping
{
    protected $treatments;

    public function __construct($treatments)
    {
        $this->treatments = $treatments;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return \App\Models\DoneTreatment::with(['employees', 'patient', 'invoices'])
            ->whereIn('id', $this->treatments)->latest()->get();
    }

    public function headings(): array
    {
        return [
            'Patient',
            'Treatment',
            'Status',
            'Date',
            'Time',
            'By',
            'Invoice'
        ];
    }

    public function map($treatment): array
    {
        $invoices = '';
        foreach ($treatment?->invoices as $invoice) {
            if ($invoices == '') {
                $invoices .= $invoice?->invoice_id;
            } else {
                $invoices .= ',' . $invoice?->invoice_id;
            }
        }
        $doctors = '';
        foreach ($treatment?->employees as $doctor) {
            if ($doctors == '') {
                $doctors .= $doctor?->first_name . ' ' . $doctor?->last_name;
            } else {
                $doctors .= ',' . $doctor?->first_name . ' ' . $doctor?->last_name;
            }
        }
        return [
            !is_null($treatment?->patient) ? $treatment?->patient?->first_name . ' ' . $treatment?->patient?->last_name : '',
            '#' . '000' . $treatment->id,
            $treatment?->treatment_status,
            $treatment?->created_at->format('d-m-Y'),
            $treatment?->created_at->format('h:i A'),
            $doctors,
            $invoices
        ];
    }
}
