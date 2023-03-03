<?php

namespace App\Exports;

use App\Models\LeaveApplication;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LeaveListExport implements FromCollection, withHeadings, withMapping
{

    protected $leaves;

    public function __construct($leaves)
    {
        $this->leaves = $leaves;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return LeaveApplication::with(['leaveType', 'employee:id,first_name,last_name,maiden_name', 'approvedBy:id,first_name,last_name,maiden_name'])->where('is_approved', 1)
            ->whereIn('id', $this->leaves)->get();
    }

    public function headings(): array
    {
        return ['Employee', 'Leave Type', 'Start Date', 'End Date', 'Reason', 'Application Date', 'Approved By'];

    }

    public function map($leave): array
    {
        return [
            $leave->employee->first_name . ' ' . $leave->employee->last_name,
            $leave->leaveType->type,
            $leave->application_start_date,
            $leave->application_end_date,
            $leave->reason,
            $leave->created_at->format('d-m-Y'),
            $leave->approvedBy->first_name . ' ' . $leave->approvedBy->last_name
        ];
    }
}