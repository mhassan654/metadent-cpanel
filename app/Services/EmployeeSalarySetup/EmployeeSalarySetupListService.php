<?php
/**
 **Created by MUWONGE HASSAN on 06/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

namespace App\Services\EmployeeSalarySetup;

use App\Models\SalaryType;
use Illuminate\Support\Facades\DB;
use App\Models\EmployeeSalarySetup;


class EmployeeSalarySetupListService
{

    public static function get_employee_salary_setup()
    {
        $list = EmployeeSalarySetup::query()->select(
            'employee_salary_setup.*',
            'employees.id',
            DB::raw('count(DISTINCT(ess_id)) as e_s_s_id'),
            'positions.name',
            'positions.*',
            'departments.department'

        )
        ->leftJoin('employees', function ($join){
            $join->on('employee_salary_setup.employee_id', '=', 'employees.id');
        })
        ->leftJoin('positions', function ($join){
            $join->on('employees.position_id', '=', 'positions.id');
        })
        ->leftJoin('departments', function ($join){
            $join->on('departments.id', '=', 'employees.sub_department_id');
        })
        ->groupBy('employee_salary_setup.employee_id',)
        ->orderBy('employee_salary_setup.salary_type_id',)
        ->get();
        return $list;
    }

}
