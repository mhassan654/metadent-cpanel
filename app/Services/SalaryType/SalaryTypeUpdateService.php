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


class SalaryTypeUpdateService
{
    use ApiResponser;

    /**
     * Method store
     *
     * @return void
     */
    public static function update()
    {
        $controller = new Controller();
        try {
            $validator = Validator::make(request()->all(),[
                'salaryTypeId' => 'required',
                'salaryName' => 'required',
                'employeeSalaryType' => 'required',
                'defaultAmount' => 'required',
                'status' => 'required'
            ]);
            if ($validator->fails()) {

                return $controller->customFailResponseMessage($validator->messages(), 404);

            } else {

                $salaryType = SalaryType::where('salary_type_id',request()->salaryTypeId)->first();
                $salaryType->salary_name = request()->salaryName;
                $salaryType->employee_salary_type = request()->employeeSalaryType;
                $salaryType->default_amount = request()->defaultAmount;
                $salaryType->status = request()->status;
                $salaryType->update();

                if ($salaryType) {
                    return $controller->customSuccessResponseWithPayload($salaryType);
                } else {
                    return $controller->customFailResponseWithPayload('Salary Type not Updated');
                }
            }

        } catch (\Throwable $th) {
            return $controller->customFailResponseWithPayload($th->getMessage());
        }
    }


}
