<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use Illuminate\Http\Request;
use App\Models\EmployeeSalaryPayment;
use Illuminate\Support\Facades\Validator;

class EmployeeSalaryPaymentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'employeeId' => 'required',
                'totalSalary' => 'required',
                'totalWorkingMinutes' => 'required',
                'workingPeriod' => 'required',
                'paymentDue' => 'required',
                'paidBy' => 'required',
                'paymentDate' => 'required',
                'salaryName' => 'nullable',
                'paymentType' => 'nullable',
                'bankName' => 'nullable'
            ]);

            if($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all());
            } else {
                $salaryPayment = new EmployeeSalaryPayment;
                $salaryPayment->employee_id = $request->employeeId;
                $salaryPayment->total_working_minutes = $request->totalWorkingMinutes;
                $salaryPayment->total_salary = $request->totalSalary;
                $salaryPayment->payment_due = $request->paymentDue;
                $salaryPayment->paid_by = $request->paidBy;
                $salaryPayment->payment_date = $request->paymentDate;
                $salaryPayment->salary_name = $request->salaryName;
                $salaryPayment->payment_type = $request->paymentType;
                $salaryPayment->bank_name = $request->bankName;
                $salaryPayment->save();

                if($salaryPayment){
                    return $this->customSuccessResponseWithPayload($salaryPayment);
                } else {
                    return $this->customFailResponseWithPayload('Payment not Created');
                }
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
