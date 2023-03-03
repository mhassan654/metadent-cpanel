<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\SalaryType;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Validator;
use App\Services\SalaryType\SalaryTypeListService;
use App\Services\SalaryType\SalaryTypeStoreService;
use App\Services\SalaryType\SalaryTypeUpdateService;

class SalaryTypeController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SalaryTypeListService $salaryTypeListService)
    {
        return $this->customSuccessResponseWithPayload($salaryTypeListService::get_salary_type_list());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalaryTypeStoreService $salaryTypeStoreService)
    {
        return $salaryTypeStoreService::store();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalaryTypeUpdateService $salaryTypeUpdateService)
    {
        return $salaryTypeUpdateService::update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $validator = Validator::make(request()->all(),[
            'salaryTypeId' => 'required',
        ]);
        if ($validator->fails()) {

            return $this->customFailResponseMessage($validator->messages(), 404);

        }

        SalaryType::destroy(request()->salaryTypeId);

        return $this->customSuccessResponseWithPayload('Salary type deleted successfully');
    }
}
