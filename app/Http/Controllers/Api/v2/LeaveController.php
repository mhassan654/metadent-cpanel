<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LeaveController extends ApiBaseController
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
        return $this->customSuccessResponseWithPayload(Leave::all());
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
            "name" => "required|unique:attendance_times",
            "from" => "required|date_format:d-m-Y",
            "to" => "required|date_format:d-m-Y|after:from",
            "numberOfDays" => "required|integer",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $leave = new Leave();
        $leave->name = request()->name;
        $leave->from = request()->from;
        $leave->to = request()->to;
        $leave->number_of_days = request()->numberOfDays;
        $leave->facility_id = Auth::user()->facility_id;
        $leave->save();

        if ($leave) {
            return $leave;
        }

        return $this->customFailResponseWithPayload("Leave was not created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "leaveId" => "required|integer",
            "name" => "required|unique:attendance_times",
            "from" => "required|date_format:d-m-Y",
            "to" => "required|date_format:d-m-Y|after:from",
            "numberOfDays" => "required|integer",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $leave = Leave::find($request->leaveId);
        try {

            if ($leave) {
                $leave->name = request()->name;
                $leave->from = request()->from;
                $leave->to = request()->to;
                $leave->number_of_days = request()->numberOfDays;
                $leave->update();

                if ($leave) {
                    return $leave;
                }
            }

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

        return $this->customFailResponseWithPayload("Leave was not updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        $validator = Validator::make(request()->all(), [
            'leaveId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages(), 200);
        }

        $leave = Leave::find(request()->leaveId);

        if ($leave) {
            $leave->Delete();

            return $this->customSuccessResponseWithPayload(' leave  has been archived');
        }

        return $this->customFailResponseWithPayload(" Leave  not found");
    }

    public function leave_list()
    {

        $validator = Validator::make(request()->all(), [
            "employeeId" => "required|integer",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $leave_list = LeaveApplication::with('leaveType')->where('employeeId',2)->first();
        // $results = DB::select(DB::raw(
        //     "
        //     SELECT leave_applications.*, application_end_date as end_date, application_start_date as from_date, apply_day, reason, is_approved WHERE employee_id = 2
        //  "));
        dd($leave_list);

    }
}
