<?php

namespace App\Http\Controllers\Api\v2;

use Carbon\Carbon;
use App\Models\AccCoa;
use Illuminate\Http\Request;
use App\Models\SalaryGenerate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiBaseController;
use App\Models\SalarySheetGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Services\Payroll\PayrollListService;
use App\Services\Payroll\PayrollStoreService;
use App\Services\Payroll\SalaryGenerateService;

class PayrollController extends BaseController
{
    public function insert_salary_advance(PayrollStoreService $payrollStoreService)
    {
        return $payrollStoreService::store();
    }

    public function salary_advance_list(PayrollListService $payrollListService)
    {
        return $this->customSuccessResponseWithPayload($payrollListService::get_salary_advance_list());
    }

    public function salary_advance_to_be_paid(PayrollListService $payrollListService)
    {
        return $this->customSuccessResponseWithPayload($payrollListService::get_salary_advances_to_be_paid());
    }

    public function salary_sheet_generator(SalaryGenerateService $salaryGenerateService)
    {
        return $salaryGenerateService->employee_salary_generate();
    }

    public function salary_sheet_list(SalaryGenerateService $salaryGenerateService)
    {
        return $this->customSuccessResponseWithPayload($salaryGenerateService->get_salary_sheet_generated_list());
    }

    public function salary_gen_approve()
    {
        // $controller = new Controller();
        $validator = Validator::make(request()->all(), [
            'approve' => 'required|integer',
            'ssg_id' => 'required|integer',
        ]);

        if ($validator->fails()) {

            return $validator->messages();
        }

        $approve_sal = SalarySheetGenerator::where('id',request()->ssg_id)->first();
        $approve_sal->approved = 1;
        $approve_sal->approved_by = Auth()->user()->roles->pluck('name')->take(1)[0];
        $approve_sal->approved_date = Carbon::now()->format('Y-m-d');
        $approve_sal->update();

        return $this->customSuccessResponseWithPayload('Salary approved');
    }


    public function get_employee_salary_charts()
    {
        $validator = Validator::make(request()->all(), [
            'ssgId' => 'required|integer',
        ]);

        $ssg_id = request()->ssgId;

        if ($validator->fails()) {
            return $validator->messages();
        }

        // $data['salary_sheet_generate_info'] = $this->salary_sheet_generate_info($ssg_id);
		$data['employee_salary_charts']     = $this->employee_salary_charts($ssg_id);

		$data['user_info'] = Auth::user();

        return $this->customSuccessResponseWithPayload($data);
    }

    public function download_employee_salary_charts()
    {
        $validator = Validator::make(request()->all(), [
            'ssgId' => 'required|integer',
        ]);



        if ($validator->fails()) {
            return $validator->messages();
        }
        $ssg_id = request()->ssgId;

        $salary_sheet_generate_info = SalarySheetGenerator::where('id', $ssg_id)->first();

        try {
            if ( $salary_sheet_generate_info) {
                $data = SalaryGenerate::select(
                    'gmb_salary_generate.*',
                    DB::raw('count(DISTINCT(gmb_salary_generate.id)) as emp_sal_pay_id'),
                    'employees.id',
                    'employees.first_name',
                    'employees.last_name'
                )
                    ->leftJoin('employees', function ($join) {
                        $join->on('gmb_salary_generate.employee_id', '=', 'employees.id');
                    })->where('gmb_salary_generate.sal_month_year', $salary_sheet_generate_info->name)
                    ->groupBy('gmb_salary_generate.id')
                    ->orderBy('gmb_salary_generate.id', 'DESC')
                    ->get()->toArray();

                    Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
                    $pdf = Pdf::loadView('pdfs.salary_chart', compact('data'));
                    $pdf->setPaper('a3','landscape');

                return $pdf->stream("Salary_chart_for_$salary_sheet_generate_info->name.pdf'");
            }

            return $this->customFailResponseWithPayload('No data found');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }





    }


    private function salary_sheet_generate_info($ssg_id)
    {
        $salary_sheet_generate_info = SalarySheetGenerator::where('id', $ssg_id)->get();

        return $salary_sheet_generate_info;
    }

    private function employee_salary_charts($ssg_id)
    {
        $salary_sheet_generate_info = SalarySheetGenerator::where('id', $ssg_id)->first();

        $result = SalaryGenerate::select(
            'gmb_salary_generate.*',
            DB::raw('count(DISTINCT(gmb_salary_generate.id)) as emp_sal_pay_id'),
            'employees.id',
            'employees.first_name',
            'employees.last_name'
        )
            ->leftJoin('employees', function ($join) {
                $join->on('gmb_salary_generate.employee_id', '=', 'employees.id');
            })->where('gmb_salary_generate.sal_month_year', $salary_sheet_generate_info->name)
            ->groupBy('gmb_salary_generate.id')
            ->orderBy('gmb_salary_generate.id', 'DESC')
            ->get();

        return $result;
    }

    public function gmb_employee_salary_approval()
    {
        $ssg_id = request()->ssgId;
        $data['salary_sheet_generate_info'] = $this->salary_sheet_generate_info($ssg_id);
        $employee_salary_charts = $this->employee_salary_charts($ssg_id);

        // Find Total Gross salary for the month
        $gross_salary = 0.0;
        $net_salary = 0.0;
        $loans = 0.0;
        $salary_advance = 0.0;
        $state_income_tax = 0.0;
        $employee_npf_contribution = 0.0; // It's indicates the social security tax(soc.sec.tax)...
        $employer_npf_contribution = 0.0; // It's indicates the employeer contribution if social security tax(soc.sec.tax) available
        $icf_amount = 0.0; // It indicates icf_amount...
        $total_npf_contribution = 0.0;

        foreach ($employee_salary_charts as $key => $value) {

            $gross_salary = $gross_salary + floatval($value->gross_salary);
            $net_salary = $net_salary + floatval($value->net_salary);
            // $loans = $loans + floatval($value->loan_deduct);
            $salary_advance = $salary_advance + floatval($value->salary_advance);
            $state_income_tax = $state_income_tax + floatval($value->income_tax);
            $employee_npf_contribution = $employee_npf_contribution + floatval($value->soc_sec_npf_tax);
            $employer_npf_contribution = $employer_npf_contribution + floatval($value->employer_contribution);
            $icf_amount = $icf_amount + floatval($value->icf_amount);
        }

        $total_npf_contribution = $employee_npf_contribution + $employer_npf_contribution;

        $data['gross_salary'] = $gross_salary;
        $data['net_salary'] = $net_salary;
        // $data['loans'] = $loans;
        $data['salary_advance'] = $salary_advance;
        $data['state_income_tax'] = $state_income_tax;
        $data['employee_npf_contribution'] = $employee_npf_contribution;
        $data['employer_npf_contribution'] = $employer_npf_contribution;
        $data['icf_amount'] = $icf_amount;
        $data['total_npf_contribution'] = $total_npf_contribution;

        $credit_amount = 0.0;
        $credit_amount = $net_salary + $loans + $salary_advance + $state_income_tax + $employee_npf_contribution;
        $data['credit_amount'] = $credit_amount;

        // Get all payment natures from account COA(acc_coa) table
        $data['payment_natures'] = $this->payment_natures();
        $data['bank_payment_natures'] = $this->payment_natures_bank();
        $data['ssg_id'] = $ssg_id;

        return $this->customSuccessResponseWithPayload($data);
    }

     // employee Information
     private function payment_natures()
     {
        $results = AccCoa::where('isCashNature', 1)->orWhere('isBankNature', 1)
        ->get(['HeadCode','HeadName','PHeadName','IsActive','isCashNature','isBankNature']);

         $respo_arr = array();
         foreach ($results as $key => $value) {
             if ($value->IsActive == 1) {
                 $respo_arr[$value->HeadCode] = $value->HeadName;
             }
         }
         return $respo_arr;
     }

     // employee Information
    public function payment_natures_bank()
    {

        $results = AccCoa::Where('isBankNature', 1)
        ->get(['HeadCode','HeadName','PHeadName','IsActive','isCashNature','isBankNature']);

         $respo_arr = array();
         foreach ($results as $key => $value) {
             if ($value->IsActive == 1) {
                 $respo_arr[$value->HeadCode] = $value->HeadName;
             }
         }
         return $respo_arr;

        $respo_arr = array();
        foreach ($results as $key => $value) {
            if ($value->IsActive == 1) {
                $respo_arr[$value->HeadCode] = $value->HeadName;
            }
        }
        return $respo_arr;

    }

    public function salary_generate_delete()
    {
        $validator = Validator::make(request()->all(), [
            'Id' => 'required|integer',
            'salName' => 'required',
        ]);

        if ($validator->fails()) {
            return $validator->messages();
        }

        try {
            $salary_sheet_generate = SalarySheetGenerator::where('id',request()->Id )->first();
            $salary_generate_delete =SalaryGenerate::where('sal_month_year',request()->salName )->first();

            if ($salary_sheet_generate){
                $salary_sheet_generate->delete();
                $salary_generate_delete->delete();

                return $this->customSuccessResponseWithPayload('Deleted Successfully');
            }

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

    }

}
