<?php
/**
 **Created by MUWONGE HASSAN on 06/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

namespace App\Services\SalaryAdvance;

use App\Http\Controllers\Controller;
use App\Models\SalaryAdvance;
use App\Traits\ApiResponser;

class SalaryAdvanceStoreService
{
    use ApiResponser;

    public function salary_advance_deduction($emp_id, $salary_month)
    {
        $salaryAdvance = DB::select(DB::raw('SELECT * FROM `salary_advances` WHERE `salary_month` = ' . "'" . $salary_month . "'" . ' AND `employee_id` = ' . $emp_id . ' AND (`amount` - `release_amount`) > 0'));

        return $salaryAdvance;
    }

    public function update_sal_advance($sala_adv_data)
    {
        $controller = new Controller();
        try {
            $salaryAdvance = SalaryAdvance::find($sala_adv_data['id']);

            $salaryAdvance->amount = $sala_adv_data['amount'];
            $salaryAdvance->release_amount = $sala_adv_data['release_amount'];
            $salaryAdvance->created_by = $sala_adv_data['created_by'];
            $salaryAdvance->update();

        } catch (\Throwable $th) {
            return $controller->customFailResponseWithPayload($th->getMessage());
        }
    }

}
