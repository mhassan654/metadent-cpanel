<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DoctorTreatmentsExport implements FromCollection, WithHeadings, withMapping
{
    protected $doctors;

    public function __construct($doctors)
    {
        $this->doctors = $doctors;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return \App\Models\Employee::with(['treatments.invoices', 'department'])->has('treatments')->whereIn('id', $this->doctors)->latest()->get()->map(function ($doctor) {
            $doctor->setRelation('treatments', $doctor->treatments->take(1));
            return $doctor;
        });
    }

    public function headings(): array
    {
        return [
            'Full Name',
            'Department',
            'Treatment',
            'Date',
            'Time',
            'Invoices',
            'Status'
        ];
    }

    public function map($doctor): array
    {
        $invoices = '';
        foreach ($doctor?->treatments[0]?->invoices as $invoice) {
            if ($invoices == '') {
                $invoices .= $invoice?->invoice_id;
            } else {
                $invoices .= ',' . $invoice?->invoice_id;
            }
        }
        return [
            $doctor?->first_name . ' ' . $doctor?->middle_name . ' ' . $doctor?->last_name,
            $doctor?->department?->department,
            '#' . '000' . $doctor?->treatments[0]?->id,
            $doctor?->treatments[0]?->created_at->format('d-m-Y'),
            $doctor?->treatments[0]?->created_at->format('h:i A'),
            $invoices,
            $doctor?->treatments[0]?->treatment_status
        ];
    }
}