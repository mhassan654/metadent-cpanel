<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DoctorDoneTreatments implements FromCollection, WithHeadings, withMapping
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
        return \App\Models\DoneTreatment::with(['patient', 'invoices:id,invoice_id'])
            ->whereIn('id', $this->treatments)->latest()->get();
    }

    public function headings(): array
    {
        return [
            'Treatment',
            'Patient',
            'Date',
            'Time',
            'Invoices',
            'Status'
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
        return [
            '#' . '000' . $treatment->id,
            $treatment?->patient?->first_name . ' ' . $treatment?->patient?->last_name,
            $treatment?->created_at->format('d-m-Y'),
            $treatment?->created_at->format('h:i A'),
            $invoices,
            $treatment?->treatment_status
        ];
    }
}