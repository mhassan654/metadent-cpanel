<?php
/**
 **Created by MUWONGE HASSAN on 06/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

namespace App\Services\Payroll;

use App\Traits\ApiResponser;
use App\Models\SalaryAdvance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class PayrollListService
{
    use ApiResponser;

    public static function get_salary_advance_list()
    {
        $list = SalaryAdvance::query()->select(
            'salary_advances.*',
            'employees.first_name',
            'employees.last_name',

        )
        ->leftJoin('employees', function ($join){
            $join->on('salary_advances.employee_id', '=', 'employees.id');
        })
        ->get();

        return $list;
    }

    public static function get_salary_advances_to_be_paid()
    {
        $controller = new Controller();

        $validator = Validator::make(request()->all(), [
            'employeeId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $validator->messages();
        }

        $id = request()->employeeId;

        return SalaryAdvance::where('paid',0)->where('employee_id',$id)->get();
    }


}
