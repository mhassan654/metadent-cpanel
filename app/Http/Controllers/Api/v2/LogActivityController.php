<?php

namespace App\Http\Controllers\Api\v2;

use App\Exports\PatientLogActivity;
use App\Exports\UserLogActivityExport;
use App\Models\LogActivity;
use App\Models\Patient;
use App\Modules\Common\Helper;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\ApiBaseController;

class LogActivityController extends ApiBaseController
{

    public function __construct()
    {
//        $this->middleware(['auth:api']);
    }

    public function index()
    {
        try {
            $logs = LogActivity::with(['user', 'patient', 'employee', 'invoice'])->latest()->paginate(20);
            return $this->customSuccessResponseWithPayload($logs);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function patient_logs(Request $request)
    {
        try {
            Helper::custom_validator($request->all(), ['patientId' => 'required|exists:App\Models\Patient,id|integer']);

            $patient_id = $request->patientId;

            $query_patient_logs = LogActivity::with('user')->where('patient_id', $patient_id);

            $query_patient_logs->when(request("action"), function ($query) use ($patient_id) {
                return $query->where('patient_id', $patient_id)->whereIn('action', request("action"));
            });
            $query_patient_logs->when(request("date_range"), function ($query) use ($patient_id) {
                $date_range = request("date_range");
                return $query->where('patient_id', $patient_id)->whereDate('created_at', '>=', $date_range[0])
                    ->whereDate('created_at', '<=', $date_range[1]);
            });
            $query_patient_logs->when(request("year"), function ($query) use ($patient_id) {
                return $query->where('patient_id', $patient_id)->whereYear('created_at', request("year"));
            });
            $query_patient_logs->when(request("month_range"), function ($query) use ($patient_id) {
                $month = request("month_range");
                return $query->where('patient_id', $patient_id)->whereMonth("created_at", $month[0])
                    ->whereYear("created_at", $month[1]);
            });
            $query_patient_logs->when(request("search_word"), function ($query) use ($patient_id) {
                $search_word = request("search_word");
                return $query->where('patient_id', $patient_id)->where('subject', 'LIKE', '%' . $search_word . '%')
                    ->where('action', 'LIKE', '%' . $search_word . '%')
                    ->orWhere('section', 'LIKE', '%' . $search_word . '%')
                    ->orWhereHas(
                        'user',
                        function ($query_user) use ($search_word, $patient_id) {
                            $query_user->where('patient_id', $patient_id)->where('first_name', 'LIKE', '%' . $search_word . '%')
                                ->orWhere('last_name', 'LIKE', '%' . $search_word . '%');
                        }
                    );
            });
            $patient_logs = $query_patient_logs->latest()->paginate(20);
            return $this->customSuccessResponseWithPayload($patient_logs);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function patient_activities_download_pdf()
    {
        try {
            Helper::custom_validator(request()->all(), ['patientId' => 'required|exists:App\Models\Patient,id|integer']);
            $request_activities = json_decode(request("logs"));
            $activities = LogActivity::with('user:id,first_name,last_name,maiden_name,middle_name')
                ->whereIn('id', $request_activities)->latest()->get();
            $patient = Patient::where('id', request("patientId"))->get(['id', 'first_name', 'last_name', 'unique_identifier', 'middle_name']);
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.patient_activity', compact('activities', 'patient'));
            $pdf->setPaper('a3', 'landscape');
            return $pdf->stream("Activity PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function patient_activities_download_excel()
    {
        try {
            $activities = json_decode(request("logs"));
            $patient = Patient::where('id', request("patientId"))->first(['id', 'first_name', 'last_name', 'unique_identifier', 'middle_name']);
            return Excel::download(new PatientLogActivity($activities), "$patient->first_name.'-'.$patient->last_name.'Activities.xlsx");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function patient_activities_download_csv()
    {
        try {
            $activities = json_decode(request("logs"));
            $patient = Patient::where('id', request("patientId"))->first(['id', 'first_name', 'last_name', 'unique_identifier', 'middle_name']);
            return Excel::download(new PatientLogActivity($activities), "$patient->first_name.'-'.$patient->last_name.'Activities.csv");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function user_system_logs(Request $request)
    {
        try {
            Helper::custom_validator($request->all(), ['userId' => 'required|exists:App\Models\Employee,id|integer']);
            $user_id = $request->userId;
            $query_user_system_logs = LogActivity::with([
                'patient',
                'invoice.patient',
                'invoice.doctor',
                'employee.country',
                'employee.department',
                'employee.position',
                'employee.city',
                'appointment.employees',
                'appointment.patient',
                'appointment.appointmentType',
                'appointment.treatmentType',
                'appointment.source',
                'appointment.status'
            ])->where('user_id', $user_id)
                ->whereIn('action', ['Update', 'Create', 'Delete', 'Read', 'Execute']);

            $query_user_system_logs->when(request("action"), function ($query) use ($user_id) {
                return $query->where('user_id', $user_id)->whereIn('action', request("action"));
            });
            $query_user_system_logs->when(request("date_range"), function ($query) use ($user_id) {
                $date_range = request("date_range");
                return $query->where('user_id', $user_id)->whereDate('created_at', '>=', $date_range[0])
                    ->whereDate('created_at', '<=', $date_range[1]);
            });
            $query_user_system_logs->when(request("year"), function ($query) use ($user_id) {
                return $query->where('User_id', $user_id)->whereYear('created_at', request("year"));
            });
            $query_user_system_logs->when(request("month_range"), function ($query) use ($user_id) {
                $month = request("month_range");
                return $query->where('user_id', $user_id)->whereMonth("created_at", $month[0])
                    ->whereYear("created_at", $month[1]);
            });
            $query_user_system_logs->when(request("search_word"), function ($query) use ($user_id) {
                $search_word = request("search_word");
                return $query->where('user_id', $user_id)->where('subject', 'LIKE', '%' . $search_word . '%')
                    ->orWhere('action', 'LIKE', '%' . $search_word . '%');
            });
            $user_system_logs = $query_user_system_logs->latest()->paginate(20);
            return $this->customSuccessResponseWithPayload($user_system_logs);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function user_auth_logs(Request $request)
    {
        try {

            Helper::custom_validator($request->all(), ['userId' => 'required|exists:App\Models\Employee,id|integer']);

            $user_id = $request->userId;
            $query_user_auth_logs = LogActivity::where('user_id', $user_id)->whereIn('action', ['LoginSuccess', 'Logout', 'LoginFail']);

            $query_user_auth_logs->when(request("action"), function ($query) use ($user_id) {
                return $query->where('user_id', $user_id)->whereIn('action', request("action"));
            });
            $query_user_auth_logs->when(request("date_range"), function ($query) use ($user_id) {
                $date_range = request("date_range");
                return $query->where('user_id', $user_id)->whereDate('created_at', '>=', $date_range[0])
                    ->whereDate('created_at', '<=', $date_range[1]);
            });
            $query_user_auth_logs->when(request("year"), function ($query) use ($user_id) {
                return $query->where('user_id', $user_id)->whereYear('created_at', request("year"));
            });
            $query_user_auth_logs->when(request("month_range"), function ($query) use ($user_id) {
                $month = request("month_range");
                return $query->where('user_id', $user_id)->whereMonth("created_at", $month[0])
                    ->whereYear("created_at", $month[1]);
            });
            $query_user_auth_logs->when(request("search_word"), function ($query) use ($user_id) {
                $search_word = request("search_word");
                return $query->where('user_id', $user_id)->where('subject', 'LIKE', '%' . $search_word . '%')
                    ->orWhere('action', 'LIKE', '%' . $search_word . '%');
            });
            $user_auth_logs = $query_user_auth_logs->latest()->paginate(20);
            return $this->customSuccessResponseWithPayload($user_auth_logs);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_user_activities_pdf(Request $request)
    {
        try {
            Helper::custom_validator($request->all(), ['userId' => 'required|exists:App\Models\Employee,id|integer']);
            $request_activities = json_decode(request("logs"));
            $user = Employee::where('id', request()->userId)->get(['id', 'first_name', 'last_name', 'maiden_name']);
            $activities = LogActivity::whereIn('id', $request_activities)->latest()->get();
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.user_activity_list', compact('activities', 'user'));
            $pdf->setPaper('a3', 'landscape');
            return $pdf->stream("Activity PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_user_activities_excel()
    {
        try {
            $activities = json_decode(request("logs"));
            return Excel::download(new UserLogActivityExport($activities), 'Activities.xlsx');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_user_activities_csv()
    {
        try {
            $activities = json_decode(request("logs"));
            return Excel::download(new UserLogActivityExport($activities), 'Activities.csv');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

}
