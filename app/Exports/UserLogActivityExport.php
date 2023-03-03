<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\LogActivity;

class UserLogActivityExport implements FromCollection, withHeadings, withMapping
{
    protected $activities;

    public function __construct($activities)
    {
        $this->activities = $activities;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return LogActivity::whereIn('id', $this->activities)->latest()->get();
    }

    public function headings(): array
    {
        return ['Date', 'Time', 'Description', 'Action'];
    }

    public function map($activity): array
    {
        return [
            $activity->created_at->format('d-m-Y'),
            $activity->created_at->format('h:i:s'),
            $activity?->subject,
            $activity?->action,
        ];
    }

}