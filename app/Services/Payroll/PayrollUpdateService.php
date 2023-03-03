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

use App\Models\Payroll;
use App\Traits\ApiResponser;
use App\Models\SalaryAdvance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class PayrollUpdateService
{
    use ApiResponser;

    public static function store()
    {
        $controller = new Controller();
        try {
            $validator = Validator::make(request()->all(),[
                'employeeId' => 'required',
                'salaryMonth' => 'required',
                'amount' => 'required',
            ]);
            if ($validator->fails()) {

                return $controller->customFailResponseMessage($validator->messages(), 404);

            } else {

                $salaryAdvance = SalaryAdvance::find(request()->advanceId);
                $salaryAdvance->employee_id = request()->employeeId;
                $salaryAdvance->salary_month = request()->salaryMonth;
                $salaryAdvance->amount = request()->amount;
                $salaryAdvance->created_by = request()->status;
                $salaryAdvance->update();

                if ($salaryAdvance) {
                    return $controller->customSuccessResponseWithPayload($salaryAdvance);
                } else {
                    return $controller->customFailResponseWithPayload('Salary Type not Created');
                }
            }

        } catch (\Throwable $th) {
            return $controller->customFailResponseWithPayload($th->getMessage());
        }

    }



}
