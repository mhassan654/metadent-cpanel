<?php

namespace App\Http\Controllers\Api\v2;

use App\Imports\AttendancesHistoryImport;
use App\Models\AttendanceHistory;
use App\Models\EmpAttendance;
use Metadent\AuthModule\Models\Employee;
use Auth;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use JamesMills\LaravelTimezone\Facades\Timezone;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceHistoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $history = AttendanceHistory::query()->whereHas('employee')
        ->select(
            'attendance_histories.employee_id','attendance_histories.time',
            'attendance_histories.id as attendance_histories_id',
            'attendance_histories.state as status',
            'employees.first_name as employee_first_name',
            'employees.last_name as employee_last_name',
            'employees.photo_url as photo',
            'attendance_histories.time as in_time',
            'emp_attendances.check_out as out_time',
            'emp_attendances.staytime as totaltime',
            'departments.department as department',
        )
        ->leftJoin('employees', function ($join){
            $join->on('attendance_histories.employee_id', '=', 'employees.id');})
        ->leftJoin('emp_attendances', function ($join){
            $join->on('emp_attendances.employee_id', '=', 'employees.id');})
        ->leftJoin('departments', function ($join){
            $join->on('employees.department_id', '=', 'departments.id');})
        ->whereDate('attendance_histories.created_at','=',Carbon::today())
        ->where('attendance_histories.state','=',1)
        ->get();
        return $this->customSuccessResponseWithPayload($history);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check_in(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "employeeId" => "required|integer|exists:App\Models\Employee,id",
            "checkIn" => "required|date",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        try {
            $time = request()->checkIn;

        $att_time = Carbon::parse($time)->format('Y-m-d H:i:s');

        $history = new AttendanceHistory;

        $history->time = $att_time;
        $history->employee_id = request()->employeeId;
        $history->state = 1;
        $history->facility_id = Auth::user()->facility_id;
        $history->save();

        if ($history) {
            return $this->customSuccessResponseWithPayload($history);
        }

        return $this->customFailResponseWithPayload("Failed to check in");

        }catch(\Throwable $th){
            return $this->customFailResponseWithPayload($th->getMessage());
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check_out(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "employeeId" => "required|integer|exists:App\Models\Employee,id",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        try {
            $type = AttendanceHistory::whereDate('time', Carbon::today())->where('employee_id', request()->employeeId)->first();

            // dd($type);

            $sign_out = Carbon::parse(Carbon::now())->format('Y-m-d H:i:s');

            $sign_in = Carbon::parse($type->time)->format('Y-m-d H:i:s');

            $in = Carbon::parse($sign_in);

            $out = Carbon::parse($sign_out);

            $interval = $in->diffInMinutes($out);

            $emp_attendance = new EmpAttendance;

            $emp_attendance->att_id = $type->id;
            $emp_attendance->employee_id = $type->employee_id;
            $emp_attendance->check_in = $sign_in;
            $emp_attendance->check_out = $sign_out;
            $emp_attendance->staytime = $interval;
            $emp_attendance->facility_id = $type->facility_id;
            $emp_attendance->save();

            if ($emp_attendance) {

                return $this->customSuccessResponseWithPayload($emp_attendance);

            }

            return $this->customFailResponseWithPayload("Failed to check in");

        } catch (\Throwable$th) {
            return $this->customFailResponseMessage($th->getMessage());
        }

    }

    public function get_employee_monthly_attendance(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "employeeId" => "required|integer|exists:App\Models\Employee,id",
            "year" => "required",
            "month" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $id = $request->employeeId;
        $year = $request->year;
        $month = $request->month;

        $data = AttendanceHistory::query()->whereHas('employee')
        ->select(
            'attendance_histories.employee_id','attendance_histories.time',
            'attendance_histories.id as attendance_histories_id',
            'employees.first_name as employee_first_name',
            'employees.last_name as employee_last_name',
            'emp_attendances.check_in as in_time',
            'emp_attendances.check_out as out_time',
            'emp_attendances.staytime as totaltime',
        )
        ->whereRaw("MONTH(attendance_histories.created_at) = {$month}")
        ->whereRaw("YEAR(attendance_histories.created_at) = {$year}")
        ->leftJoin('employees', function ($join){
            $join->on('attendance_histories.employee_id', '=', 'employees.id');})
        ->leftJoin('emp_attendances', function ($join){
            $join->on('emp_attendances.employee_id', '=', 'employees.id');})
        ->where('attendance_histories.employee_id', $id )
        ->get();

        return $this->customSuccessResponseWithPayload($data);
    }

    public function get_employee_attendance(){

        $validator = Validator::make(request()->all(), [
            "employeeId" => "required|integer|exists:App\Models\Employee,id",
            "date" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $date_start = request()->date;
        $id = request()->employeeId;

        $data = AttendanceHistory::query()
        ->whereDate('time','=',$date_start)
        ->where('employee_id',$id)
        ->orderBy('time', 'ASC')
        ->first();

        return $this->customSuccessResponseWithPayload($data);
    }

    public function lateness(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "employeeId" => "required|integer|exists:App\Models\Employee,id",
            "year" => "required",
            "month" => "required"
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $id = $request->employeeId;
        $year = $request->year;
        $month = $request->month;

        $employee_attendances = AttendanceHistory::query()->whereHas('employee')
        ->select(
            'employee_id','date',
            'attendance_histories.id as attendance_histories_id',
            'employees.first_name as employee_first_name',
            'employees.last_name as employee_last_name',
            'attendance_histories.check_in as in_time',
            'attendance_histories.check_out as out_time'
        )
        ->leftJoin('employees', function ($join){
            $join->on('attendance_histories.employee_id', '=', 'employees.id');})
        ->where('employee_id', $id )
        ->get();

        return $employee_attendances;
    }

    public function attendanceHistoryDatewise(Request $request)
    {
        $id = $request->employeeId;

        $start_date = Carbon::parse($request->fromDate)->toDateTimeString();
        $end_date = Carbon::parse($request->toDate)->toDateTimeString();

            $query = AttendanceHistory::query()
            ->select('*',
            DB::raw('DATE(time) as mydate'),
            )
            ->where('employee_id',$id)->whereBetween('time',[$start_date,$end_date])
            ->groupBy('time')
            ->orderBy('time', 'desc')
            ->get();

        $attendance = [];
        $i = 1;

        foreach ($query as $att) {

            $attendance[] = EmpAttendance::query()
            ->select(
                'emp_attendances.*',
                // DB::raw('MIN(check_in) as intime'),
                // DB::raw('MAX(check_out) as outtime'),
                DB::raw('TIMEDIFF(MAX(check_out),MIN(check_in)) as totalhours'),
                DB::raw('DATE(emp_attendances.created_at) as date'),
                DB::raw('Time(emp_attendances.created_at) as punchtime'),
                'employees.first_name as first_name',
                'employees.last_name as last_name',
            )
            ->leftJoin('employees', function ($join){
                $join->on('emp_attendances.employee_id', '=', 'employees.id');})
            ->where('emp_attendances.created_at', '>=', date("Y-m-d", strtotime($att->mydate)))
            ->where('emp_attendances.employee_id', $att->employee_id)
            ->orderBy('emp_attendances.created_at', 'desc')
            ->get();

            $i = 1;

            foreach ($attendance as $k => $v) {

                $attendance[$k]['totalhours'] = date("H:i:s", strtotime($attendance[$k][0]['totalhours']));
                $attendance[$k]['date'] = $attendance[$k][0]['date'];

                $data = AttendanceHistory::query()->whereHas('employee')->select(
                    'attendance_histories.*',
                    'employee_id',
                    'employees.first_name',
                    'employees.last_name',
                )
                ->leftJoin('employees', function ( $join ) {
                    $join->on('attendance_histories.employee_id', '=', 'employees.id');
                })
                ->where('attendance_histories.employee_id', $attendance[$k][0]['employee_id'])
                ->whereDate('time', '=', date("Y-m-d", strtotime($attendance[$k][0]['created_at'])))
                ->orderBy('attendance_histories.id', 'asc')
                ->get();

                $ix = 1;
                $in_data = [];
                $out_data = [];
                foreach ($data as $attendancedata) {

                    if ($ix % 2) {
                        $status = "IN";
                        $in_data[$ix] = $attendancedata->time;

                    } else {
                        $status = "OUT";
                        $out_data[$ix] = $attendancedata->time;
                    }
                    $ix++;
                }

                $result_in = array_values($in_data);

                $result_out = array_values($out_data);
                // dd($result_out);
                $total = [];
                $count_out = count($result_out);


                if ($count_out == 2) {
                    $n_out = $count_out;
                    // dd($n_out);
                } else {
                    $n_out = $count_out - 1;
                }

                for ($i = 0; $i < $n_out; $i++) {

                    $date_a = new Carbon($result_in[$i + 1]);
                    $date_b = new Carbon($result_out[$i]);
                    $interval = $date_a->diffInDays($date_b);

                    $total[$i] = $interval->format('%h:%i:%s');
                }

                $hou = 0;
                $min = 0;
                $sec = 0;
                $totaltime = '00:00:00';

                $length = sizeof($total);

                for ($x = 0; $x <= 10; $x++) {
                    $split = explode(":", @$total[$x]);
                    $hou += (int)$split[0];
                    $min += (int)$split[0];
                    $sec += (int)$split[0];
                }

                $seconds = $sec % 60;
                $minutes = $sec / 60;
                $minutes = (integer) $minutes;
                $minutes += $min;
                $hours = $minutes / 60;
                $minutes = $minutes % 60;
                $hours = (integer) $hours;
                $hours += $hou % 24;

                $attendance[$k]['wastage'] = $totalwastage
                    = $hours . ":" . $minutes . ":" . $seconds;

                    // echo $attendance[$k][0]['totalhours'] .'<br>';
                // echo date("H:i:s", strtotime($attendance[$k][0]['totalhours'])).'<br>'
                $totalhours = new DateTime(date("H:i:s", strtotime($attendance[$k][0]['totalhours'])));
                $wastagehours = new DateTime($totalwastage);
                $networkhours = date_diff($totalhours, $wastagehours);

                $attendance[$k]['nethours'] = $networkhours->format('%h:%i:%s');
            }

            $i++;
        }

        return $this->customSuccessResponseWithPayload($attendance);
    }

    public function missing(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "employeeId" => "required|integer|exists:App\Models\Employee,id",
            "year" => "required",
            "month" => "required",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $id = $request->employeeId;
        $year = $request->year;
        $month = $request->month;

        // $missing =  AttendanceHistory::query()->whereHas('employee')->where('employee_id', $id )->where('check_in' ,'=',null)
        // ->get();
        $missing =  AttendanceHistory::get();


        return $this->customSuccessResponseWithPayload($missing);
    }

    public function getDateWiseRecords(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            "employeeId" => "required|integer|exists:App\Models\Employee,id",
            "startDate" => "required|date",
            "endDate" => "required|date",
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        $startDate = date($request->startDate);
        $endDate = date($request->endDate);

        $employeeId = $request->employeeId;

        $employees = Employee::all();

        $query = AttendanceHistory::query()
            // ->whereBetween('date', [$startDate, $endDate])
            ->where('employee_id', $employeeId)
            ->groupBy('date')->orderBy('date','asc')
            ->get();

        $attendees = [];

        $i = 1;

        // foreach ($query as $row) {

        //     $attendees[] = AttendanceHistory::select(
        //         'id', 'date','employee_id',
        //         DB::raw('MAX(check_in) as intime'),
        //         DB::raw('MIN(check_out) as outtime'),
        //         DB::raw('TIMEDIFF(MAX(check_in),MIN(check_out)) as totaltime'),
        //         DB::raw('SUM(stayin) as workedhours')
        //     )->whereBetween(
        //         'date', [$startDate, $endDate])
        //         ->groupBy('date')->orderBy('date')->get();
        // }

        $attendances = AttendanceHistory::query()->select(
            'employee_id','date',
            'attendance_histories.id as attendance_histories_id',
            'employees.first_name as employee_first_name',
            'employees.last_name as employee_last_name',
            'attendance_histories.check_in as in_time',
            'attendance_histories.check_out as out_time',
            )->whereIn('employee_id',$employees->pluck('id'))
            ->whereBetween('date', [$startDate, $endDate])
            ->leftJoin('employees', function ($join){
                $join->on('attendance_histories.employee_id', '=', 'employees.id');
            })->get();


        return $items;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttendanceHistory  $attendanceHistory
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceHistory $attendanceHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttendanceHistory  $attendanceHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttendanceHistory $attendanceHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttendanceHistory  $attendanceHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceHistory $attendanceHistory)
    {
        //
    }

    public function import(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'attendance_histories' => 'required|file|mimes:xls,xlsx,csv',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->customFailResponseMessage($validator->messages(), 404);
        }

        // dd($request->attendanceHistory);

        $path = $request->file('attendance_histories');

        $data = Excel::import(new AttendancesHistoryImport, $path);

        return response()->json(['message' => 'uploaded successfully'], 200);
    }

    /**
     * download file
     *
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Auth\Access\Response
     */
    public function download(Request $request)
    {
        $file = public_path() . "/files/attendance_histories.xlsx";
        // $headers = ['Content-Type: image/jpeg'];

        return \Response::download($file, 'sample-attendance_history.xlsx');
    }
}
