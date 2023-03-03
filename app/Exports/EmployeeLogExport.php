<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmployeeLogExport implements FromCollection, withHeadings, withMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $employees;

    public function __construct($employees)
    {
        $this->employees = $employees;
    }
    public function collection()
    {
        return \App\Models\Employee::with(['department', 'latestLog'])->whereIn('id', $this->employees)->latest()->get();
    }

    public function headings(): array
    {
        return [
            'Full Name',
            'Department',
            'Roles',
            'Last Action',
            'Last Activity',
            'Last Activity Date'
        ];
    }

    public function map($employee): array
    {
        $roles = '';
        foreach ($employee?->roles as $role) {
            if ($roles == '') {
                $roles .= $role?->name;
            } else {
                $roles .= ',' . $role?->name;
            }
        }
        return [
            $employee->first_name . ' ' . $employee->last_name,
            $employee->department->department,
            $roles,
            $employee->latestLog->action,
            $employee->latestLog->subject,
            $employee->latestLog->date
        ];
    }
}