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


class SalaryTypeListService
{

    public static function get_salary_type_list()
    {
        $list = SalaryType::orderBy('salary_type_id','desc')->get();
        return $list;
    }

}
