<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InvoiceTransactions implements FromCollection, withHeadings, withMapping
{
    protected $transactions;

    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return \App\Models\InvoiceTransaction::whereIn('id', $this->transactions)->get();
    }

    public function headings(): array
    {
        return [
            'No.',
            'Amount',
            'Method',
            'Date',
            'Status'
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction?->id,
            $transaction?->currency . ' ' . $transaction?->amount,
            $transaction?->method,
            $transaction?->created_at->format('jS M Y'),
            $transaction?->status
        ];
    }
}