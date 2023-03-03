<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatientInvoicesExport implements FromCollection, withHeadings, withMapping
{
    protected $invoices;
    public function __construct($invoices)
    {
        $this->invoices = $invoices;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return \App\Models\Invoice::
            whereIn('id', $this->invoices)->latest()->get();
    }

    public function headings(): array
    {
        return [
            'Invoice Number',
            'Paid Amount',
            'Amount Due',
            'Total Amount',
            'Status',
            'Date Created'
        ];
    }

    public function map($invoice): array
    {
        return [
            $invoice?->invoice_id,
            $invoice?->paidamount,
            $invoice?->balance_due,
            $invoice?->total_with_vat,
            $invoice?->status == 1 ? 'Paid' : 'Unpaid',
            $invoice?->created_at->format('d-m-Y')
        ];
    }
}