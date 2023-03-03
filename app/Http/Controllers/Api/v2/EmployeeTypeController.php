<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\EmployeeType;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Validator;

class EmployeeTypeController extends Controller
{
    public function __construct()
    {
//        $this->middleware(["auth:api"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return $this->customSuccessResponseWithPayload(EmployeeType::with('department')->latest()->get());
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'type' => 'required|string',
            'departmentId' => 'required|integer'
        ]);
        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all());
        } else {
            $employeeType = new EmployeeType;
            $employeeType->type = $request->type;
            $employeeType->department_id = $request->departmentId;
            $employeeType->save();
            if($employeeType) {
                return $this->customSuccessResponseWithPayload($employeeType);
            } else {
                return $this->customFailResponseWithPayload('Type not Created');
            }
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'type' => 'required|string',
            'departmentId' => 'required|integer'
        ]);
        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all());
        } else {
            $employeeType = EmployeeType::find($id);
            $employeeType->type = $request->type;
            $employeeType->department_id = $request->departmentId;
            $employeeType->update();
            if($employeeType) {
                return $this->customSuccessResponseWithPayload($employeeType);
            } else {
                return $this->customFailResponseWithPayload('Type not Updated');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeType  $employeeType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $employeeType = EmployeeType::find($id);
         $employeeType->delete();
         if($employeeType) {
            return $this->customSuccessResponseWithPayload('Type Deleted');
         } else {
            return $this->customFailResponseWithPayload('Type not Deleted');
         }

    }
}
