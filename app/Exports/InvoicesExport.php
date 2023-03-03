<?php

namespace App\Exports;

use App\Models\Invoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class InvoicesExport implements FromCollection, withHeadings, withMapping
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
        return Invoice::with(['patient:id,last_name,first_name,unique_identifier', 'doctor:id,first_name,last_name'])
            ->whereIn('id', $this->invoices)->latest()->get();
    }

    public function headings(): array
    {
        return ['invoice no', 'patient', 'doctor', 'balance due', 'paid amount', 'status'];
    }

    public function map($invoice): array
    {
        return [
            $invoice?->invoice_id,
            $invoice?->patient?->first_name . ' ' . $invoice?->patient?->last_name,
            $invoice?->doctor?->first_name . ' ' . $invoice?->doctor?->last_name,
            $invoice?->balance_due,
            $invoice?->paidamount,
            $invoice?->status == 1 ? 'Paid' : 'Unpaid'
        ];
    }
}