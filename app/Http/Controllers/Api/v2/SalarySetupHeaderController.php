<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use Illuminate\Http\Request;
use App\Models\SalarySetupHeader;
use Illuminate\Support\Facades\Validator;

class SalarySetupHeaderController extends BaseController
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
                'employeeId' => 'required|integer',
                'salaryPayable' => 'nullable',
                'abscentPayable' => 'nullable',
                'taxManager' => 'required',
                'status' => 'required'
            ]);

            if ($validator->fails()){
                return $this->customFailResponseWithPayload($validator->errors()->all());
            } else {
                $salarySetupHeader = new SalarySetupHeader;
                $salarySetupHeader->employee_id = $request->employeeId;
                $salarySetupHeader->salary_payable = $request->salaryPayable;
                $salarySetupHeader->abscent_payable = $request->abscentPayable;
                $salarySetupHeader->tax_manager = $request->taxManager;
                $salarySetupHeader->status = $request->status;
                $salarySetupHeader->save();
                if($salarySetupHeader){
                    return $this->customSuccessResponseWithPayload($salarySetupHeader);
                } else {
                    return $this->customFailResponseWithPayload('Not Created');
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
