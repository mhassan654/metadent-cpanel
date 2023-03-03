<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\LogActivity;

class PatientLogActivity implements FromCollection,withHeadings, withMapping
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
        return LogActivity::with('user:id,first_name,last_name,maiden_name,middle_name')
        ->whereIn('id', $this->activities)->latest()->get();
    }

    public function headings() :array
    {
        return ['Date', 'Time', 'Section','Description','Action','By'];
    }

    public function map($activity) :array
    {
        return [
            $activity->created_at->format('d-m-Y'),
            $activity->created_at->format('h:i:s'),
            $activity?->section,
            $activity?->subject,
            $activity?->action,
            !is_null($activity?->user) ? $activity?->user?->first_name.' '.$activity?->user?->last_name : ''
        ];
    }

}
