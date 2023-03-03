<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\ApiBaseController;
use App\Http\Requests\StoreAttendanceTimeRequest;
use App\Http\Requests\UpdateAttendanceTimeRequest;
use App\Models\AttendanceTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AttendanceTimeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->customSuccessResponseWithPayload(AttendanceTime::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttendanceTimeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "name" => "required|unique:attendance_times",
            "startTime" => "required",
            "endTime" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $newDepartment = new AttendanceTime();
        $newDepartment->name = request()->name;
        $newDepartment->start_time = request()->startTime;
        $newDepartment->end_time = request()->endTime;
        $newDepartment->facility_id = Auth::user()->facility_id;
        $newDepartment->save();

        if ($newDepartment) {
            return $newDepartment;
        }

        return $this->customFailResponseWithPayload("Attendance time was not created");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendanceTimeRequest  $request
     * @param  \App\Models\AttendanceTime  $attendanceTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "attendanceTimeId" => "required",
            "name" => "required",
            "startTime" => "required",
            "endTime" => "required",
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->messages());
        }

        try {
                $attendance_times = AttendanceTime::find(request()->attendanceTimeId);
                if ($attendance_times) {
                    $attendance_times->name = request()->name;
                    $attendance_times->start_time = request()->startTime;
                    $attendance_times->end_time = request()->endTime;
                    $attendance_times->update();

                    if ($attendance_times):
                        return $this->customSuccessResponseWithPayload($attendance_times);
                    endif;
                } else {
                    return $this->customFailResponseWithPayload('Attendance time not found');
                }

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttendanceTime  $attendanceTime
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'attendanceTimeId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->messages(), 200);
        }

         $time = AttendanceTime::find(request()->attendanceTimeId);

         if($time)
         {
             $time->Delete();

             return $this->customSuccessResponseWithPayload('Attendance time  has been archived');
         }

         return $this->customFailResponseWithPayload("Attendance time  not found");
    }
}
