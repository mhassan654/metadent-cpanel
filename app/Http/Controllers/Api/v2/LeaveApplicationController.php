<?php

namespace App\Http\Controllers\Api\v2;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\LeaveType;
use App\Modules\Common\Helper;
use App\Models\Appointment;
use App\Models\QuickAppointment;
use App\Models\LeaveApplication;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LeaveListExport;

class LeaveApplicationController extends ApiBaseController
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
            $applications = LeaveApplication::with(['leaveType', 'employee', 'approvedBy'])->get()->map(function ($application) {
                $employee_leave_type = DB::table('employee_leaves_types')->where('employee_id', $application->employee_id)->where('leave_type_id', $application->leaveType->id)->first();
                $leave_type = (object) [];
                if (is_null($employee_leave_type)) {
                    $leave_type->id = $application->leaveType->id;
                    $leave_type->type = $application->leaveType->type;
                    $leave_type->number_of_leave_days = $application->leaveType->number_of_leave_days;
                    $leave_type->leave_hours = $application->leaveType->leave_hours;
                    $leave_type->remaining_hours = $application->leaveType->leave_hours;
                } else {
                    $leave_type->id = $application->leaveType->id;
                    $leave_type->type = $application->leaveType->type;
                    $leave_type->number_of_leave_days = $application->leaveType->number_of_leave_days;
                    $leave_type->leave_hours = $application->leaveType->leave_hours;
                    $leave_type->remaining_hours = $employee_leave_type->remaining_time;
                }
                unset($application->leaveType);
                $application->leave_type = $leave_type;
                return $application;
            });
            return $this->customSuccessResponseWithPayload($applications);
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
        $validator = Validator::make(request()->all(), [
            "employeeId" => "required|integer",
            "leaveTypeId" => "required|integer",
            "applicationStartDate" => "required|date_format:d-m-Y",
            "applicationEndDate" => "required|date_format:d-m-Y",
            "startTime" => "nullable",
            "endTime" => "nullable",
            "requestedHours" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $application = new LeaveApplication;
        try {

            $application->employee_id = request()->employeeId;
            $application->leave_type_id = request()->leaveTypeId;
            $application->application_start_date = Carbon::parse(request()->applicationStartDate)->format('d-m-Y');
            $application->application_end_date = Carbon::parse(request()->applicationEndDate)->format('d-m-Y');
            $application->start_time = request()->startTime;
            $application->end_time = request()->endTime;
            $application->approved_by = Auth::user()->id;
            $application->reason = request()->reason;
            $application->is_approved = 2;
            $application->requested_hours = request()->requestedHours;
            $application->facility_id = Auth::user()->facility_id;
            $application->save();

            if ($application) {
                return $this->customSuccessResponseWithPayload($application);
            }

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

        return $this->customFailResponseWithPayload("Leave was not stored");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveAppliaction  $leaveAppliaction
     * @return \Illuminate\Http\Response
     */

    public function cancel_leave()
    {
        $validator = Validator::make(request()->all(), [
            "applicationId" => "required|integer",
            "cancelReason" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $application = LeaveApplication::find(request()->applicationId);
        try {
            $application->is_approved = 0;
            $application->cancel_reason = request()->cancelReason;
            $application->update();

            if ($application) {
                return $this->customSuccessResponseWithPayload(
                    'Application successfully canceled'
                );
            }

            return $this->customFailResponseWithPayload('Leave cancellation failed');


        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

        return $this->customFailResponseWithPayload("Leave was not updated");
    }
    public function approve()
    {
        $validator = Validator::make(request()->all(), [
            "applicationId" => "required|integer",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $application = LeaveApplication::find(request()->applicationId);
        try {

            $doctor_appointments = Appointment::where('facility_id', auth()->user()->facility_id)
                ->where('status_id', 2)
                ->whereJsonContains('doctors', [$application->employee_id])
                ->get();
            if (count($doctor_appointments) > 0) {
                foreach ($doctor_appointments as $appointment) {
                    $quick_appointment = QuickAppointment::create([
                        "facility_id" => Auth::user()->facility_id,
                        "patient_id" => $appointment->patient_id,
                        "type_id" => $appointment->type_id,
                        "status_id" => $appointment->status_id,
                        "source_id" => $appointment->source_id,
                        "period_id" => $appointment->period_id,
                        "department_id" => $appointment->department_id,
                        "task_id" => $appointment->task_id,
                        "interval" => $appointment->interval,
                        "main_doctor" => $appointment->main_doctor,
                        "treatment_id" => $appointment->treatment_id,
                        "treatment_type_id" => $appointment->treatment_type_id,
                        "appointment_type_id" => $appointment->appointment_type_id,
                        "doctors" => $appointment->doctors,
                        "comments" => $appointment->comments,
                        "date" => $appointment->date,
                        "material_name" => $appointment->material_name,
                        "material_date" => $appointment->material_date,
                    ]);
                    if ($quick_appointment) {
                        $task = Task::create([
                            'title' => 'Reschedule Appointment',
                            'task' => 'Reschedule Appointment' . '-' . $quick_appointment->id,
                            'due_date' => Carbon::now()->format('d-m-Y'),
                            'status_id' => 1,
                            'facility_id' => auth()->user()->facility_id,
                            'created_by' => auth()->user()->first_name,
                            'employee_id' => $application->employee_id
                        ]);
                        $quick_appointment->update([
                            'task_id' => $task->id
                        ]);
                        $appointment->delete();
                    }
                }
            }
            $leave_type = LeaveType::find($application->leave_type_id);
            $employee_leave_remaining_time = DB::table('employee_leaves_types')->where('employee_id', $application->employee_id)->where('leave_type_id', $leave_type->id)->first();
            if (is_null($employee_leave_remaining_time)) {
                DB::table('employee_leaves_types')->insert([
                    'employee_id' => $application->employee_id,
                    'leave_type_id' => $leave_type->id,
                    'remaining_time' => $leave_type->leave_hours - $application->requested_hours
                ]);
            } else {
                DB::table('employee_leaves_types')->where('employee_id', $application->employee_id)->where('leave_type_id', $leave_type->id)->update([
                    'remaining_time' => $employee_leave_remaining_time->remaining_time - $application->requested_hours
                ]);
            }
            $application->approved_by = Auth::user()->id;
            $application->is_approved = 1;
            $application->facility_id = Auth::user()->facility_id;
            $application->update();

            if ($application) {
                return $this->customSuccessResponseWithPayload(
                    'Application successfully approved'
                );
            }
            return $this->customFailResponseWithPayload('Leave Approval Failed');


        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

        return $this->customFailResponseWithPayload("Leave was not updated");
    }

    public function call_back_from_leave(Request $request)
    {
        try {
            $validator = Validator::make(request()->all(), [
                "applicationId" => "required|integer",
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return $this->customFailResponseMessage($validator->messages(), 404);
            }

            $used_time = 0;

            $application = LeaveApplication::find($request->applicationId);

            $leave_type = LeaveType::find($application->leave_type_id);

            $employee_leave_remaining_time = DB::table('employee_leaves_types')->where('employee_id', $application->employee_id)->where('leave_type_id', $leave_type->id)->first();

            if ($application->application_start_date == $application->application_end_date) {
                $used_time = round(abs(strtotime($application->start_time) - strtotime(Carbon::now()->format('h:i A'))) / 3600, 2);
                if ($used_time <= $application->requested_hours) {
                    DB::table('employee_leaves_types')->where('employee_id', $application->employee_id)->where('leave_type_id', $leave_type->id)->update([
                        'remaining_time' => $employee_leave_remaining_time->remaining_time - ($application->requested_hours - $used_time)
                    ]);
                }
            } else {
                $used_time = round((strtotime($application->application_start_date) - strtotime(Carbon::now()->format('d-m-Y'))) / (60 * 60 * 24), 2);
                if ($used_time <= $application->requested_hours) {
                    DB::table('employee_leaves_types')->where('employee_id', $application->employee_id)->where('leave_type_id', $leave_type->id)->update([
                        'remaining_time' => $employee_leave_remaining_time->remaining_time - $used_time
                    ]);
                }
            }

            $application->is_approved = 3;

            $application->update();

            return $this->customSuccessResponseWithPayload('Application Called Back');

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeaveApplication  $leaveAppliaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $validator = Validator::make(request()->all(), [
            "applicationId" => "required|integer",
            "employeeId" => "required|integer",
            "leaveTypeId" => "required|integer",
            "applicationStartDate" => "required|date_format:d-m-Y",
            "applicationEndDate" => "required|date_format:d-m-Y",
            "startTime" => "nullable",
            "endTime" => "nullable",
            "requestedHours" => "required"
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $application = LeaveApplication::find($request->applicationId);

        try {

            $application->employee_id = request()->employeeId;
            $application->leave_type_id = request()->leaveTypeId;
            $application->application_start_date = Carbon::parse(request()->applicationStartDate)->format('d-m-Y');
            $application->application_end_date = Carbon::parse(request()->applicationEndDate)->format('d-m-Y');
            $application->start_time = request()->startTime;
            $application->end_time = request()->endTime;
            $application->approved_by = Auth::user()->id;
            $application->reason = request()->reason;
            $application->is_approved = 2;
            $application->facility_id = Auth::user()->facility_id;
            $application->requested_hours = request()->requestedHours;
            $application->update();

            if ($application) {
                return $this->customSuccessResponseWithPayload($application);
            }

        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

        return $this->customFailResponseWithPayload("Leave was not updated");
    }


    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'applicationId' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages());
        }

        $application = LeaveApplication::find(request()->applicationId);

        if ($application) {
            $application->Delete();

            return $this->customSuccessResponseWithPayload(' Application  has been archived');
        }

        return $this->customFailResponseWithPayload(" Application  not found");
    }

    // return employee's leave history/applications
    public function leave_list()
    {
        $validator = Validator::make(request()->all(), [
            'employeeId' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->messages());
        }

        $id = request()->employeeId;

        $result = DB::select(
            DB::raw(
                " SELECT  id, application_start_date as fromdate,
            application_end_date as todate,apply_day,reason,is_approved FROM leave_applications WHERE employee_id =$id"
            )
        );

        return $this->customSuccessResponseWithPayload($result);
    }

    //employees on leave
    public function paginate_employees_on_leave()
    {
        try {

            Helper::custom_validator(
                request()->all(),
                ['year' => 'nullable|max:4|min:4', "month_range" => 'nullable|date_format:m-Y']
            );

            $query_employees_on_leave = LeaveApplication::with(['leaveType', 'employee', 'approvedBy:id,first_name,last_name'])->where('is_approved', 1);

            $query_employees_on_leave->when(request("leave_types"), function ($query) {
                return $query->whereIn('leave_type_id', request("leave_types"));
            });

            $query_employees_on_leave->when(request("employees"), function ($query) {
                return $query->whereIn('employee_id', request("employees"));
            });

            $query_employees_on_leave->when(request("search_word"), function ($query) {
                $search_word = request("search_word");
                return $query->where(
                    function ($q) use ($search_word) {
                        $q->where('reason', 'LIKE', '%' . $search_word . '%')
                            ->orWhereHas(
                                'leaveType',
                                function ($query_leave_type) use ($search_word) {
                                        $query_leave_type->where('type', 'LIKE', '%' . $search_word . '%');
                                    }
                            )->orWhereHas(
                                'approvedBy',
                                function ($query_approved_by) use ($search_word) {
                                        $query_approved_by->where('last_name', 'LIKE', '%' . $search_word . '%')
                                            ->orWhere('first_name', 'LIKE', '%' . $search_word . '%');
                                    }
                            )->orWhereHas('employee', function ($query_employee) use ($search_word) {
                                    $query_employee->where('last_name', 'LIKE', '%' . $search_word . '%')
                                        ->orWhere('first_name', 'LIKE', '%' . $search_word . '%');
                                }
                            );
                    }
                );
            });

            $query_employees_on_leave->when(request("date_range"), function ($query) {
                $date_range = request("date_range");
                return $query->whereRaw('STR_TO_DATE(application_start_date,"%d-%m-%Y") >= STR_TO_DATE("' . $date_range[0] . '","%d-%m-%Y")')
                    ->whereRaw('STR_TO_DATE(application_start_date,"%d-%m-%Y") <= STR_TO_DATE("' . $date_range[1] . '","%d-%m-%Y")');
            });

            $query_employees_on_leave->when(request('month_range'), function ($query) {
                $month = request("month_range");
                return $query->where('application_start_date', 'LIKE', '%' . $month . '%');
            });

            $query_employees_on_leave->when(request("year"), function ($query) {
                $year = request("year");
                return $query->where('application_start_date', 'LIKE', '%' . $year . '%');
            });

            $paginated_leaves = $query_employees_on_leave->latest()->paginate(20);

            return $this->customSuccessResponseWithPayload($paginated_leaves);
        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function download_employees_on_leave_pdf()
    {
        try {
            $request_leaves = json_decode(request("leaves"));
            $leaves = LeaveApplication::with(['leaveType', 'employee:id,first_name,last_name,maiden_name', 'approvedBy:id,first_name,last_name,maiden_name'])->where('is_approved', 1)
                ->whereIn('id', $request_leaves)->get();
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.leaves_list', compact('leaves'));
            $pdf->setPaper('a3', 'landscape');
            return $pdf->stream("Leaves PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function download_employees_on_leave_excel()
    {
        try {
            $leaves = json_decode(request("leaves"));
            return Excel::download(new LeaveListExport($leaves), 'Leaves.xlsx');
        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function download_employees_on_leave_csv()
    {
        try {
            $leaves = json_decode(request("leaves"));
            return Excel::download(new LeaveListExport($leaves), 'Leaves.csv');
        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

}
