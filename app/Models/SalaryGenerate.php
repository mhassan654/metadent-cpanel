<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryGenerate extends Model
{
    use HasFactory;

    protected $table = 'gmb_salary_generate';

    protected $fillable=[
        'sal_month_year',
        'employee_id',
        'tin_no',
        'total_attendance',
        'total_count',
        'atten_allowance',
        'gross',
        'basic',
        'transport',
        'house_rent',
        'medical',
        'other_allowance',
        'gross_salary',
        'income_tax',
        'soc_sec_npf_tax',
        'employer_contribution',
        'icf_amount',
        'loan_deduct',
        'loan_id',
        'salary_advance',
        'salary_adv_id',
        'lwp',
        'pf',
        'stamp',
        'net_salary',
        'createDate',
        'createBy',
        'updateDate',
        'updateBy',
        'medical_benefit',
        'family_benefit',
        'transportation_benefit',
        'other_benefit',
        'normal_working_hrs_month',
        'actual_working_hrs_month',
        'hourly_rate_basic',
        'hourly_rate_trasport_allowance',
        'basic_salary_pro_rated',
        'transport_allowance_pro_rated',
        'basic_transport_allowance'
    ];

    public function employee_salary_charts($ssg_id)
    {
        // $salary_sheet_generate_info = $this->db->select('*')
        //     ->from('gmb_salary_sheet_generate')
        //     ->where('ssg_id', $ssg_id)
        //     ->get()
        //     ->row();

        $salary_sheet_generate_info = $this->query()->where('ssg_id', $ssg_id)->get();

        $result = $this->query()->select(
            'gmb_salary_generate.*',
            'count(DISTINCT(gmb_salary_generate.id)) as emp_sal_pay_id',
            'employee_histories.id',
            'employee_histories.first_name',
            'employee_histories.last_name'
        )
        ->leftJoin('employee_histories', function ( $join ) {
            $join->on('gmb_salary_generate.employee_id', '=', 'employee_histories.id');
        })->where('gmb_salary_generate.sal_month_year', $salary_sheet_generate_info->name )
        ->groupBy('gmb_salary_generate.id')
        ->orderBy('gmb_salary_generate.id','DESC')
        ->get();

        return $result;

        // return $this->db->select('count(DISTINCT(pment.id)) as emp_sal_pay_id,pment.*,p.employee_id,p.first_name,p.last_name')
        //     ->from('gmb_salary_generate pment')
        //     ->join('employee_history p', 'pment.employee_id = p.employee_id', 'left')
        //     ->group_by('pment.id')
        //     ->order_by('pment.id', 'desc')
        //     ->where('pment.sal_month_year', $salary_sheet_generate_info->name)
        //     ->get()
        //     ->result();
    }
}
