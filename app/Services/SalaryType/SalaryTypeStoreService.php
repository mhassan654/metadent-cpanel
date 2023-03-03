<?php
/**
 **Created by MUWONGE HASSAN on 06/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

namespace App\Services\SalaryType;

use App\Models\SalaryType;
use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class SalaryTypeStoreService
{
    use ApiResponser;

    /**
     * Method store
     *
     * @return void
     */
    public static function store()
    {
        $controller = new Controller();
        try {
            $validator = Validator::make(request()->all(),[
                'salaryName' => 'required',
                'employeeSalaryType' => 'required',
                'defaultAmount' => 'required',
                'status' => 'required'
            ]);
            if ($validator->fails()) {

                return $controller->customFailResponseMessage($validator->messages(), 404);

            } else {

                $salaryType = new SalaryType;
                $salaryType->salary_name = request()->salaryName;
                $salaryType->employee_salary_type = request()->employeeSalaryType;
                $salaryType->default_amount = request()->defaultAmount;
                $salaryType->status = request()->status;
                $salaryType->save();

                if ($salaryType) {
                    return $controller->customSuccessResponseWithPayload($salaryType);
                } else {
                    return $controller->customFailResponseWithPayload('Salary Type not Created');
                }
            }

        } catch (\Throwable $th) {
            return $controller->customFailResponseWithPayload($th->getMessage());
        }
    }


}
