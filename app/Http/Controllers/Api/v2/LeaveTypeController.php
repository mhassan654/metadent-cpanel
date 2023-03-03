<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LeaveTypeController extends ApiBaseController
{
    public function __construct()
    {
//        $this->middleware(["auth:api"]);
        // auth()->check();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->customSuccessResponseWithPayload(LeaveType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "type" => "required|unique:leave_types",
            "numberOfDays" => "required|integer",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $type = new LeaveType();
        $type->type = request()->type;
        $type->number_of_leave_days = request()->numberOfDays;
        $type->facility_id = Auth::user()->facility_id;
        $type->leave_hours = request()->numberOfDays * 8;
        $type->save();

        if ($type) {
            return $this->customSuccessResponseWithPayload($type);
        }

        return $this->customFailResponseWithPayload("Leave Type was not created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveType  $leave_type
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveType $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeaveType  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "leaveTypeId" => "required|integer",
            "type" => "required",
            "numberOfDays" => "required|integer",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $type = LeaveType::find($request->leaveTypeId);
        try {

            if ($type) {
                $type->type = request()->type;
                $type->number_of_leave_days = request()->numberOfDays;
                $type->leave_hours = request()->numberOfDays * 8;
                $type->update();

                if ($type) {
                    return $type;
                }
            }

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

        return $this->customFailResponseWithPayload("Leave Type was not updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveType  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'leaveTypeId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }

        $leave = LeaveType::find(request()->leaveTypeId);

        if ($leave) {
            $leave->Delete();

            return $this->customSuccessResponseWithPayload(' leave type  has been archived');
        }

        return $this->customFailResponseWithPayload(" Leave type not found");
    }

    public function employee_leave_types()
    {
        try {
            $final_types = [];
            $leave_types = LeaveType::select(['id', 'type', 'leave_hours'])->get();
            foreach ($leave_types as $type) {
                $leave_type = (object) [];
                $employee_leave_remaining_time = DB::table('employee_leaves_types')->where('employee_id', auth()->user()->id)->where('leave_type_id', $type->id)->first();
                if (is_null($employee_leave_remaining_time)) {
                    $leave_type->id = $type->id;
                    $leave_type->type = $type->type;
                    $leave_type->number_of_leave_days = $type->number_of_leave_days;
                    $leave_type->leave_hours = $type->leave_hours;
                    $leave_type->remaining_hours = $type->leave_hours;
                    $final_types[] = $leave_type;
                } else {
                    $leave_type->id = $type->id;
                    $leave_type->type = $type->type;
                    $leave_type->number_of_leave_days = $type->number_of_leave_days;
                    $leave_type->leave_hours = $type->leave_hours;
                    $leave_type->remaining_hours = $employee_leave_remaining_time->remaining_time;
                    $final_types[] = $leave_type;
                }
            }
            return $this->customSuccessResponseWithPayload($final_types);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
}
