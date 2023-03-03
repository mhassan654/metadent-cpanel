<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeSalarySetup;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Validator;
use App\Services\EmployeeSalarySetup\EmployeeSalarySetupListService;

class EmployeeSalarySetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeeSalarySetupListService $employeeSalarySetupListService)
    {
        return $this->customSuccessResponseWithPayload($employeeSalarySetupListService::get_employee_salary_setup());
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
                'employeeId' => "required|integer",
                "salaryType" => "required|integer",
                "amount" => "required",
                "grossSalary" => "required",
                "updateId" => "nullable",
                "salaryTypeId" => "required|integer",
                "isPercentage" => "nullable|boolean"
            ]);

            if ($validator->fails()) {
                return $this->customFailResponseMessage($validator->messages(), 200);
            } else {
                $salarySetup = new EmployeeSalarySetup;
                $salarySetup->employee_id = $request->employeeId;
                $salarySetup->amount = $request->amount;
                $salarySetup->update_id = 1;
                $salarySetup->gross_salary = $request->grossSalary;
                $salarySetup->is_percentage = $request->isPercentage;
                $salarySetup->salary_type_id = $request->salaryTypeId;
                $salarySetup->salary_type = $request->salaryType;
                $salarySetup->save();

                if($salarySetup){
                    return $this->customSuccessResponseWithPayload($salarySetup);
                } else {
                    return $this->customFailResponseWithPayload('Setup not Created');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
