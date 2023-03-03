<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeeExport implements FromCollection, withHeadings, withMapping
{
    protected $employees;

    public function __construct($employees)
    {
        $this->employees = $employees;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return \App\Models\Employee::with(['position','reportingTo','city','department'])
        ->whereIn('id',$this->employees)->latest()->get(['id','first_name','email','phone','last_name','city_id','position_id','reporting_to','department_id'])
        ->makeHidden(['permissions']);
    }

    public function headings() :array
    {
        return ['Full Name','Roles', 'Position','Department','Address','Email','Phone Number', 'Reporting To'];
    }

    public function map($employee) :array
    {
        $roles = '';
        foreach($employee?->roles as $role){
            if($roles == ''){
                $roles .= $role?->name;
            }else {
                $roles .= ','.$role?->name;
            }
        }
        $name = '';
        $last_name = is_null($employee?->last_name) ? '' : $employee?->last_name;
        $first_name = is_null($employee?->first_name) ? '' : $employee?->first_name;
        $name = $first_name.' '.$last_name;
        return [
            $name,
            $roles,
            is_null($employee?->position) ? '' : $employee?->position?->name,
            is_null($employee?->department) ? '' : $employee?->department?->department,
            is_null($employee?->city) ? '' : $employee?->city->city,
            is_null($employee?->email) ? '' : $employee?->email,
            is_null($employee?->phone) ? '' : $employee?->phone,
            is_null($employee?->reportingTo) ? '' : $employee?->reportingTo?->name
        ];
    }
}
