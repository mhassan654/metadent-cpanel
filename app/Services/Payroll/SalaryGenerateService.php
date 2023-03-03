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

use App\Http\Controllers\Controller;
use App\Models\AccTransaction;
use App\Models\AttendanceHistory;
use App\Models\EmployeeFile;
use App\Models\EmployeeSalaryPayment;
use App\Models\EmployeeSalarySetup;
use App\Models\Payroll;
use App\Models\PayrollTaxSetup;
use App\Models\SalaryAdvance;
use App\Models\SalaryGenerate;
use App\Models\SalarySheetGenerator;
use App\Models\TaxCalculation;
use Metadent\AuthModule\Models\Employee;
use App\Services\SalaryAdvance\SalaryAdvanceStoreService;
use App\Traits\ApiResponser;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SalaryGenerateService
{
    use ApiResponser;

    /**
     * Method generate
     *
     * @return void
     */
    public static function generate()
    {
        $controller = new Controller();
        try {
            $validator = Validator::make(request()->all(), [
                'name' => 'required',
            ]);

            if ($validator->fails()) {

                return $controller->customFailResponseMessage($validator->messages(), 404);
            }

            list($month, $year) = explode(' ', request()->name);

            $query = SalarySheetGenerator::where('name', request()->name)->get();

            if (count($query) > 0) {

                return response()->json('Salary of ' . $month . $year . ' ' . 'already generated');
            }

            switch ($month) {
                case "January":
                    $month = '1';
                    break;
                case "February":
                    $month = '2';
                    break;
                case "March":
                    $month = '3';
                    break;
                case "April":
                    $month = '4';
                    break;
                case "May":
                    $month = '5';
                    break;
                case "June":
                    $month = '6';
                    break;
                case "July":
                    $month = '7';
                    break;
                case "August":
                    $month = '8';
                    break;
                case "September":
                    $month = '9';
                    break;
                case "October":
                    $month = '10';
                    break;
                case "November":
                    $month = '11';
                    break;
                case "December":
                    $month = '12';
                    break;
            }

            $fdate = $year . '-' . $month . '-' . '1';
            $lastday = date('t', strtotime($fdate));
            $edate = $year . '-' . $month . '-' . $lastday;
            $startd = $fdate;

            // dd($startd < '2022-04-10');

            $employee = EmployeeSalarySetup::groupBy('employee_id')->get();

            $ab = Carbon::now()->format('Y-m-d');

            $new_salary_generate = new SalarySheetGenerator;
            $new_salary_generate->name = request()->name;
            $new_salary_generate->start_date = $startd;
            $new_salary_generate->end_date = $edate;
            $new_salary_generate->g_date = $ab;
            $new_salary_generate->generate_by = Auth::user()->first_name . ' ' . Auth::user()->last_name;
            $new_salary_generate->save();

            if (sizeof($employee) > 0) {

                foreach ($employee as $key => $value) {

                    $aAmount = EmployeeSalarySetup::query()->select(
                        'employee_salary_setup.*',
                        'employee_salary_setup.salary_type',
                        'employee_salary_setup.gross_salary',
                        'employee_salary_setup.employee_id',
                        'employees.first_name',
                        'employees.last_name',
                    )
                        ->leftJoin('employees', function ($join) {
                            $join->on('employee_salary_setup.employee_id', '=', 'employees.id');
                        })
                        ->where('employee_salary_setup.employee_id', $value->employee_id)
                        ->first();

                    $Amount = $aAmount->gross_salary;

                    $startd = $startd;

                    $end = $edate;

                    $att_in =
                    AttendanceHistory::query()->select(
                        'employee_id', 'time',
                        DB::raw('MIN(time) as intime'),
                        DB::raw('MAX(time) as outtime'),
                        DB::raw('TIMEDIFF(MAX(time),MIN(time)) as totalhours'),
                        DB::raw('DATE(time) as mydate'),
                        DB::raw('Time(time) as punchtime')
                    )
                        ->whereRaw("DATE(time) >= '" . date('Y-m-d', strtotime($startd)) . "'")
                        ->whereRaw("DATE(time) <= '" . date('Y-m-d', strtotime($end)) . "'")
                        ->where('employee_id', $value->employee_id)
                        ->groupBy('time')
                        ->get();

                    $idx = 1;
                    $totalhour = [];
                    $totalday = [];

                    foreach ($att_in as $attendancedata) {

                        $date_a = new DateTime($attendancedata->outtime);
                        $date_b = new DateTime($attendancedata->intime);
                        $interval = date_diff($date_a, $date_b);

                        $totalwhour = $interval->format('%h:%i:%s');
                        $totalhour[$idx] = $totalwhour;
                        $totalday[$idx] = $attendancedata->mydate;
                        $idx++;
                    }

                    $seconds = 0;

                    foreach ($totalhour as $t) {
                        $timeArr = array_reverse(explode(":", $t));

                        foreach ($timeArr as $key => $tv) {
                            if ($key > 2) {
                                break;
                            }

                            $seconds += pow(60, $key) * $tv;
                        }

                    }

                    $hours = floor($seconds / 3600);
                    $mins = floor(($seconds - ($hours * 3600)) / 60);
                    $secs = floor($seconds % 60);
                    $times = $hours * 3600 + $mins * 60 + $secs;

                    // end new salary generate
                    $wormin = ($times / 60);
                    $worhour = number_format($wormin / 60, 2);
                    $netAmount = '';

                    // dd($aAmount);

                    if ($aAmount->sal_type == 1) {

                        $dStart = new DateTime($startd);
                        $dEnd = new DateTime($end);
                        $dDiff = $dStart->diff($dEnd);
                        $numberofdays = $dDiff->days + 1;
                        $totamount = $Amount * $worhour;
                        $PYI = ($totamount / $numberofdays) * 365;
                        $PossibleYearlyIncome = round($PYI);

                        $taxrate = PayrollTaxSetup::where('start_amount', '<', $PossibleYearlyIncome)->get();

                        $TotalTax = 0;

                        foreach ($taxrate as $row) {

                            // "Inside tax calculation";
                            if ($PossibleYearlyIncome > $row['start_amount'] && $PossibleYearlyIncome > $row['end_amount']) {
                                $diff = $row['end_amount'] - $row['start_amount'];
                            }
                            if ($PossibleYearlyIncome > $row['start_amount'] && $PossibleYearlyIncome < $row['end_amount']) {
                                $diff = $PossibleYearlyIncome - $row['start_amount'];
                            }

                            $tax = (($row['rate'] / 100) * $diff);
                            $TotalTax += $tax;
                        }

                        $TaxAmount = ($TotalTax / 365) * $numberofdays;

                        $netAmount = number_format(($totamount - $TaxAmount), 2);

                    } else if ($aAmount->sal_type == 2) {

                        $netAmount = $Amount;
                    }

                    $workingper = count($totalday);

                    $paymentData = array(
                        'employee_id' => $value->employee_id,
                        'total_salary' => $netAmount,
                        'total_working_minutes' => $worhour,
                        'salary_name' => request()->name,
                        'working_period' => $workingper,
                    );

                    $payment = new EmployeeSalaryPayment;

                    if (!empty($aAmount->employee_id)) {

                        $payment = new EmployeeSalaryPayment;
                        $payment->employee_id = $value->employee_id;
                        $payment->total_salary = $netAmount;
                        $payment->total_working_minutes = $worhour;
                        $payment->salary_name = request()->name;
                        $payment->working_period = $workingper;
                        $payment->save();

                        EmployeeSalaryPayment::insert($paymentData);

                        $c_code = $aAmount->employee_id;
                        $c_name = $aAmount->first_name . $aAmount->last_name;
                        $c_acc = $c_code . '-' . $c_name;
                        // $headcode = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $c_acc)->get()->row()->HeadCode;
                        $headcode = DB::table('acc_coa')->where('HeadName', $c_acc)->pluck('HeadCode');

                        // dd($headcode);

                        $createby = Auth::user()->first_name . ' ' . Auth::user()->last_name;
                        $createdate = Carbon::now()->format('Y-m-d H:i:s');

                        $accpayable = new AccTransaction;
                        $accpayable->v_no = request()->name;
                        $accpayable->v_type = 'Generated Salary';
                        $accpayable->v_date = Carbon::now()->format('Y-m-d');
                        $accpayable->COAID = $headcode;
                        $accpayable->narration = 'Salary For Employee Id' . $aAmount->employee_id;
                        $accpayable->debit = 1;
                        $accpayable->created_by = $createby;
                        $accpayable->is_approve = 1;
                        $accpayable->save();

                    }
                }
            }

            return 'Salary sheet has been generated successfully';

        } catch (\Throwable $th) {
            return $controller->customFailResponseWithPayload($th->getMessage());
        }

    }

    public function salary_paymentinfo($id = null)
    {

        return DB::select('count(DISTINCT(pment.emp_sal_pay_id)) as emp_sal_pay_id,pment.*,p.employee_id,
        p.first_name,p.last_name,desig.position_name,p.rate as basic,p.rate_type as salarytype')
            ->from('employee_salary_payment pment')
            ->join('employee_history p', 'pment.employee_id = p.employee_id', 'left')
            ->join('position desig', 'desig.pos_id = p.pos_id', 'left')
            ->where('pment.emp_sal_pay_id', $id)
            ->group_by('pment.emp_sal_pay_id')
            ->get();
    }

    public function employee_salary_generate()
    {
        $salaryAdvanceStoreService = new SalaryAdvanceStoreService;

        $controller = new Controller();

        $validator = Validator::make(request()->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {

            return $controller->customFailResponseMessage($validator->messages(), 404);
        }

        try {

            list($month, $year) = explode(' ', request()->name);

            // Check if, salary already generated for the selected month
            $query = SalarySheetGenerator::where('name', request()->name)->get();

            if (count($query) > 0) {

                return $this->customFailResponseWithPayload('Salary of ' . $month . ' ' . $year . ' ' . 'already generated');
            }
            // End of Check if, salary already generated for the selected month

            // Get month number based on moth name..
            $month = $this->month_number_check($month);

            $fdate = $year . '-' . $month . '-' . '1';
            $lastday = date('t', strtotime($fdate));
            $edate = $year . '-' . $month . '-' . $lastday;
            $startd = $fdate;

            // Getting all active employee list from employee_history table
            // $employee = $this->db->select('employee_id,monthly_work_hours,sos,employee_type')
            // ->from('employee_history')->where('employee_status', 1)->get()->result();

            $employee = Employee::get(['id', 'monthly_working_hours', 'employee_type_id']);

            $ab = Carbon::now()->format('Y-m-d');

            $postData = [
                'name' => request()->name,
                'g_date' => $ab,
                'start_date' => $startd,
                'end_date' => $edate,
                'generate_by' => Auth()->user()->id,
            ];

            // Saving data into gmb_salary_sheet_generate table
            $respo = SalarySheetGenerator::create($postData);

            // keepting activity logs for salary generate
            // addActivityLog("salary generate", "create", $salary_sheet_generate_id, "gmb_salary_sheet_generate", 2, $postData);

            /*Generate salary*/

            // dd(sizeof($employee) > 0);

            if (sizeof($employee) > 0) {

                foreach ($employee as $key => $value) {

                    $emp_id = $value->id;

                    $employee_file = EmployeeFile::where('employee_id', $emp_id)->first();

                    // echo $employee_file .',';

                    if ($employee_file) {

                        /*Hourly rate compution along with transport allowance*/
                        $worked_hours = $this->employee_worked_hours($emp_id, $startd, $edate);

                        $actual_working_hrs_month = floatval($worked_hours); // this is for calculation
                        $month_actual_work_hrs = floatval($worked_hours);

                        // Check if actual_working_hrs_month by employee is greater than monthly_work_hours, then set monthly_work_hours as
                        //  his/her actual_working_hrs_month for now..
                        if ($actual_working_hrs_month > floatval($value->monthly_working_hours)) {

                            $actual_working_hrs_month = floatval($value->monthly_working_hours);
                        }

                        $hourly_rate_basic = floatval($employee_file->basic / $value->monthly_working_hours);
                        $hourly_rate_trasport_allowance = floatval($employee_file->transport / $value->monthly_working_hours);

                        $basic_salary_pro_rated = $basic_salary = floatval($hourly_rate_basic * $actual_working_hrs_month);
                        $transport_allowance_pro_rated = floatval($hourly_rate_trasport_allowance * $actual_working_hrs_month);

                        // Benefits amounts
                        $total_benefits = 0.0;
                        $total_benefits = floatval($employee_file->medical_benefit) + floatval($employee_file->family_benefit) + floatval($employee_file->transportation_benefit) + floatval($employee_file->other_benefit);

                        $basic_transport_allowance = $gross_salary = $basic_salary_pro_rated + $transport_allowance_pro_rated + $total_benefits;
                        /*End of Hourly rate compution along with transport allowance*/

                        /* Start of tax calculation*/
                        $state_income_tax = 0.0;
                        // Check if employee type is Full_time and Tin no is not null
                        if ($employee_file->tin_no != null && (int) $value->employee_type_id == 3) {
                            $state_income_tax = floatval($this->state_income_tax($gross_salary));
                        }
                        // Check if employee SOS.Sec.NPF is available
                        $soc_sec_npf_tax = 0.0;
                        $employer_contribution = 0.0;
                        $icf_amount = 0.0;

                        $soc_sec_npf_tax_percnt = floatval(5);
                        if ($value->sos != "" && (int) $value->employee_type == 3) {
                            $soc_sec_npf_tax = floatval(($basic_salary * $soc_sec_npf_tax_percnt) / 100);
                            // Employer contribution is 10% of basic salary..
                            $employer_contribution = floatval(($basic_salary * 10) / 100);
                            if ($basic_salary > 0) {
                                $icf_amount = 15;
                            }
                        }

                        /* End  of tax calculation*/

                        /* Starts of salary advance deduction*/
                        $salary_advance = 0.0;
                        $salary_advance_id = null;

                        // dd($salary_advance_id);
                        // $salary_advance_respo = $salaryAdvanceStoreService->salary_advance_deduction($emp_id, request()->name);
                        $salary_advance_respo = DB::select(DB::raw('SELECT * FROM `salary_advances` WHERE `salary_month` = ' . "'" . request()->name . "'" . ' AND `employee_id` = ' . $emp_id . ' AND (`amount` - `release_amount`) > 0'));
                        // echo print_r($salary_advance_respo);

                        // echo $salary_advance;

                        if ($salary_advance_respo) {
                            $salary_advance = floatval($salary_advance_respo->amount);
                            $salary_advance_id = $salary_advance_respo->id;
                        }

                        /*Net salary calculation*/
                        $net_salary = 0.0;
                        $total_deductions = 0.0;
                        $total_deductions = ($state_income_tax + $soc_sec_npf_tax + $salary_advance);
                        $net_salary = ($gross_salary - $total_deductions);

                        /*Ends*/
                        $salary_generate_respo = new SalaryGenerate;
                        $salary_generate_respo->employee_id = $emp_id;
                        $salary_generate_respo->tin_no = $employee_file->tin_no;
                        $salary_generate_respo->total_attendance = $value->monthly_work_hours; //tagret_hours / days
                        $salary_generate_respo->total_count = $month_actual_work_hrs; //weorked_hours / days
                        $salary_generate_respo->gross = $employee_file->gross_salary;
                        $salary_generate_respo->basic = $employee_file->basic;
                        $salary_generate_respo->transport = $employee_file->transport;
                        $salary_generate_respo->gross_salary = $gross_salary;
                        $salary_generate_respo->income_tax = $state_income_tax;
                        $salary_generate_respo->soc_sec_npf_tax = $soc_sec_npf_tax;
                        $salary_generate_respo->employer_contribution = $employer_contribution;
                        $salary_generate_respo->salary_advance = $salary_advance;
                        $salary_generate_respo->salary_adv_id = $salary_advance_id;
                        $salary_generate_respo->net_salary = $net_salary;
                        $salary_generate_respo->sal_month_year = request()->name;
                        $salary_generate_respo->createDate = Carbon::now()->format('Y-m-d');
                        $salary_generate_respo->createBy = Auth()->user()->id;
                        $salary_generate_respo->medical_benefit = floatval($employee_file->medical_benefit);
                        $salary_generate_respo->family_benefit = floatval($employee_file->family_benefit);
                        $salary_generate_respo->transportation_benefit = floatval($employee_file->transportation_benefit);
                        $salary_generate_respo->other_benefit = floatval($employee_file->other_benefit);
                        $salary_generate_respo->normal_working_hrs_month = $value->monthly_working_hours;
                        $salary_generate_respo->actual_working_hrs_month = $month_actual_work_hrs;
                        $salary_generate_respo->basic_salary_pro_rated = $basic_salary_pro_rated;
                        $salary_generate_respo->transport_allowance_pro_rated = $transport_allowance_pro_rated;
                        $salary_generate_respo->basic_transport_allowance = $basic_transport_allowance;
                        $salary_generate_respo->save();

                        if ($salary_generate_respo) {
                            // Update salary advance afetr applying it to salary generate

                            $sala_adv_data = array(
                                'id' => $salary_advance_id,
                                'release_amount' => $salary_advance,
                                'updated_by' => Auth()->user()->id,
                            );

                            $this->update_sal_advance($sala_adv_data);
                        }

                    }
                }

            }
            /*End of Generate salary*/

            if ($respo) {
                return $controller->customSuccessResponseWithPayload('employees salaries have been generated');
            } else {
                $controller->customSuccessResponseWithPayload('Please Try again');
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }

    // Check month number based on month name
    public function month_number_check($month_name)
    {
        $month = '';

        switch ($month_name) {
            case "January":
                $month = '1';
                break;
            case "February":
                $month = '2';
                break;
            case "March":
                $month = '3';
                break;
            case "April":
                $month = '4';
                break;
            case "May":
                $month = '5';
                break;
            case "June":
                $month = '6';
                break;
            case "July":
                $month = '7';
                break;
            case "August":
                $month = '8';
                break;
            case "September":
                $month = '9';
                break;
            case "October":
                $month = '10';
                break;
            case "November":
                $month = '11';
                break;
            case "December":
                $month = '12';
                break;
        }

        return $month;

    }

    // Get employee worked hours for the requested date range/ month
    public function employee_worked_hours($employee_id, $startd, $edate)
    {
        $startd = $startd;
        $end = $edate;

        // $att_in = $this->db->select('a.time,MIN(a.time) as intime,MAX(a.time) as outtime,a.uid, DATE(time) as mydate')
        // ->from('attendance_history a')
        // ->where('a.uid',$employee_id)
        //  ->where('DATE(a.time) >=',date('Y-m-d', strtotime($startd)))
        //  ->where('DATE(a.time) <=',date('Y-m-d', strtotime($end)))
        // ->group_by('DATE(a.time)')
        // ->get()
        // ->result();

        $att_in = AttendanceHistory::query()->select(
            'employee_id', 'time',
            DB::raw('MIN(time) as intime'),
            DB::raw('MAX(time) as outtime'),
            DB::raw('TIMEDIFF(MAX(time),MIN(time)) as totalhours'),
            DB::raw('DATE(time) as mydate'),
            DB::raw('Time(time) as punchtime')
        )
            ->whereRaw("DATE(time) >= '" . date('Y-m-d', strtotime($startd)) . "'")
            ->whereRaw("DATE(time) <= '" . date('Y-m-d', strtotime($end)) . "'")
            ->where('employee_id', $employee_id)
            ->groupBy('time')
            ->get();

        $idx = 1;
        $totalhour = [];
        $totalday = [];

        foreach ($att_in as $attendancedata) {

            $date_a = new DateTime($attendancedata->outtime);
            $date_b = new DateTime($attendancedata->intime);
            $interval = date_diff($date_a, $date_b);

            $totalwhour = $interval->format('%h:%i:%s');
            $totalhour[$idx] = $totalwhour;
            $totalday[$idx] = $attendancedata->mydate;
            $idx++;
        }

        $seconds = 0;

        foreach ($totalhour as $t) {
            $timeArr = array_reverse(explode(":", $t));

            foreach ($timeArr as $key => $tv) {
                if ($key > 2) {
                    break;
                }

                $seconds += pow(60, $key) * $tv;
            }
        }

        $hours = floor($seconds / 3600);
        $mins = floor(($seconds - ($hours * 3600)) / 60);
        $secs = floor($seconds % 60);
        $times = $hours * 3600 + $mins * 60 + $secs;
        // end new salary generate
        $wormin = ($times / 60);
        $worhour = number_format($wormin / 60, 2);

        return $worhour;
    }

    /* Calculate state income tax*/
    public function state_income_tax($gross_salary)
    {
        $tax_calculations = TaxCalculation::get();

        $tax_amount = 0.0;

        foreach ($tax_calculations as $row) {

            if (floatval($gross_salary) > floatval($row->min) && floatval($gross_salary) <= floatval($row->max) && floatval($row->min) != floatval($row->max)) {

                $amount = floatval($gross_salary) - floatval($row->min);
                $gross_salary_tax = ($amount * floatval($row->tax_percent)) / 100;
                $tax_amount = floatval($row->add_smount) + floatval($gross_salary_tax);
            }

            if (floatval($gross_salary) > floatval($row->min) && floatval($gross_salary) > floatval($row->max) && floatval($row->min) == floatval($row->max)) {

                $amount = floatval($gross_salary) - floatval($row->min);
                $gross_salary_tax = ($amount * floatval($row->tax_percent)) / 100;
                $tax_amount = floatval($row->add_smount) + floatval($gross_salary_tax);
            }
        }
        return $tax_amount;
    }

    private function update_sal_advance($sala_adv_data)
    {
        // dd($sala_adv_data);
        $controller = new Controller();
        try {
            $salaryAdvance = SalaryAdvance::find($sala_adv_data['id']);

            $salaryAdvance->release_amount = $sala_adv_data['release_amount'];
            $salaryAdvance->updated_by = $sala_adv_data['updated_by'];
            $salaryAdvance->update();

        } catch (\Throwable $th) {
            return $controller->customFailResponseWithPayload($th->getMessage());
        }

    }

    public function get_salary_sheet_generated_list()
    {
        // $controller = new Controller();
        // $validator = Validator::make(request()->all(), [
        //     'name' => 'required',
        // ]);

        // if ($validator->fails()) {

        //     return $validator->messages();
        // }

        return SalarySheetGenerator::get();
    }

}
