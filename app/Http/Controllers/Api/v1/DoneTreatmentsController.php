<?php

namespace App\Http\Controllers\Api\v1;

use DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Models\Patient;
use App\Models\DoneTreatment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PatientDoneTreatments;

class DoneTreatmentsController extends Controller
{
    public function __construct()
    {
//        $this->middleware("auth:api");
    }

    public function index()
    {
        return $this->allDoneTreatments();
    }

    public function store()
    {
        request()->validate([
            "patientId" => "required",
            "visitId" => "required",
            "invoices" => 'nullable|array',
            "invoices.*" => 'integer',
            'doctors' => 'nullable|array',
            'doctors.*' => 'integer'
        ]);
        $treatment_exists = DoneTreatment::where('patient_id', request()->patientId)->where('visit_id', request()->visitId)->get();
        if (count($treatment_exists) === 0):
            $doneTreatment = DoneTreatment::create([
                "patient_id" => request()->patientId,
                "tooth" => request()->tooth,
                "visit_id" => request()->visitId,
                "treatment" => request()->treatment,
                "tooth_sections" => request()->sections,
                "treatment_complete" => request()->treatmentComplete,
                "payment_status" => request()->paymentStatus,
                "treatment_price" => request()->treatmentPrice,
                "facility_id" => Auth::user()->facility_id,
                "invoice_ids" => request()->invoices === null ? null : json_encode(request()->invoices),
                "doctors" => request()->doctors === null ? null : json_encode(request()->doctors),
            ]);
            if ($doneTreatment):
                Artisan::call("invoice:done-treatment-pivot");
                return $this->get_done_treatments_by_patient();
            endif;
            return $this->customFailResponseWithPayload($doneTreatment);
        endif;
        return $this->customFailResponseWithPayload("Failed to save the treatment done.");
    }

    public function update()
    {
        request()->validate([
            "doneTreatmentId" => "required",
            "treatmentComplete" => "required",
            "invoices" => 'nullable|array',
            "invoices.*" => 'integer',
            'doctors' => 'nullable|array',
            'doctors.*' => 'integer'
        ]);
        $doneTreatment = DoneTreatment::where('patient_id', request()->patientId)->where('visit_id', request()->visitId)->first();
        if ($doneTreatment):
            $doneTreatment->update([
                "treatment" => request()->treatment,
                "tooth_sections" => request()->sections,
                "payment_status" => request()->paymentStatus,
                "treatment_complete" => request()->treatmentComplete,
            ]);
            $doneTreatment->invoices()->detach();
            Artisan::call("invoice:done-treatment-pivot");
            return $this->get_done_treatments_by_patient();
        else:
            $doneTreatment = DoneTreatment::create([
                "patient_id" => request()->patientId,
                "tooth" => request()->tooth,
                "visit_id" => request()->visitId,
                "treatment" => request()->treatment,
                "tooth_sections" => request()->sections,
                "treatment_complete" => request()->treatmentComplete,
                "payment_status" => request()->paymentStatus,
                "treatment_price" => request()->treatmentPrice,
                "facility_id" => Auth::user()->facility_id,
                "invoice_ids" => request()->invoices === null ? null : json_encode(request()->invoices),
                "doctors" => request()->doctors === null ? null : json_encode(request()->doctors),
            ]);
            if ($doneTreatment):
                Artisan::call("invoice:done-treatment-pivot");
                return $this->get_done_treatments_by_patient();
            endif;
        endif;
        return $this->customFailResponseWithPayload("Failed to save the treatment done.");
    }

    public function destroy()
    {
        request()->validate([
            "doneTreatmentId" => "required",
        ]);

        $doneTreatment = DoneTreatment::find(request()->doneTreatmentId);

        if ($doneTreatment):
            $doneTreatment->invoices()->detach();
            $doneTreatment->delete();
            return $this->get_done_treatments_by_patient();
        endif;

        return $this->customFailResponseWithPayload("Failed to record done procedure");
    }

    public function get_patient_treatment_dates()
    {
        $done_treatment_dates = DoneTreatment::where('patient_id', request()->patientId)
            // ->groupBy(DB::raw('Date(updated_at)'))->pluck("updated_at");
            ->groupBy('visit_id')->pluck("updated_at");

        return $this->customSuccessResponseWithPayload($done_treatment_dates);
    }

    private function allDoneTreatments()
    {
        return $this->customSuccessResponseWithPayload(DoneTreatment::where("facility_id", Auth::user()->facility_id)->orderBy("created_at", "desc")->get());
    }

    public function get_done_treatments_by_patient()
    {
        $doneTreatments = DoneTreatment::where('patient_id', request()->patientId)
            ->orderBy("updated_at", "desc")
            ->groupBy('visit_id')
            ->get();
        return $this->customSuccessResponseWithPayload($doneTreatments);
    }

    public function get_done_treatments_by_patient_and_date()
    {
        $doneTreatments = DoneTreatment::where('patient_id', request()->patientId)
            ->whereDate('updated_at', Carbon::parse(request()->date)->toDateString())
            ->orderBy("updated_at", "desc")
            ->latest('updated_at')
            ->first();

        return $this->customSuccessResponseWithPayload($doneTreatments);
    }

    public function get_last_done_treatments()
    {
        $doneTreatments = DoneTreatment::where('patient_id', request()->patientId)
            ->where('visit_id', request()->visitId)
            ->orderBy("updated_at", "desc")
            ->get();
        return $this->customSuccessResponseWithPayload($doneTreatments);
    }

    public function recent_treatments()
    {
        try {
            Helper::custom_validator(
                request()->all(),
                ['year' => 'nullable|max:4|min:4', 'status' => 'nullable']
            );
            $query_recent_treatments = DoneTreatment::with(['employees.country', 'employees.city', 'employees.position', 'employees.department', 'employees.reportingTo', 'patient', 'invoices'])
                ->whereDate('created_at', '>=', Carbon::now()->subDays(30));

            $query_recent_treatments->when(request("date_range"), function ($query) {
                $date_range = request("date_range");
                $query->where(
                    function ($q) use ($date_range) {
                        $q->whereDate('created_at', '>=', $date_range[0])->whereDate('created_at', '<=', $date_range[1]);
                    }
                );
            });

            $query_recent_treatments->when(request("status"), function ($query) {
                $status = request("status");
                $query->where(
                    function ($q) use ($status) {
                        $q->where('treatment_status', $status);
                    }
                );
            });

            $query_recent_treatments->when(request("doctors"), function ($query) {
                $doctors = request("doctors");
                $query->where(
                    function ($q) use ($doctors) {
                        foreach ($doctors as $doctor) {
                            $q->orWhereJsonContains('doctors', $doctor);
                        }
                    }
                );
            });

            $query_recent_treatments->when(request("search_word"), function ($query) {
                $search_word = request("search_word");
                $query->where(
                    function ($q) use ($search_word) {
                        $q->where('id', 'LIKE', '%' . $search_word . '%')->orWhere('treatment_status', 'LIKE', '%' . $search_word . '%')
                            ->orWhereHas(
                                'patient',
                                function ($query_patients) use ($search_word) {
                                        $query_patients->where('last_name', 'LIKE', '%' . $search_word . '%')
                                            ->orWhere('first_name', 'LIKE', '%' . $search_word . '%');

                                    }
                            )->orWhereHas(
                                'employees',
                                function ($query_doctors) use ($search_word) {
                                        $query_doctors->where('last_name', 'LIKE', '%' . $search_word . '%')
                                            ->orWhere('first_name', 'LIKE', '%' . $search_word . '%');
                                    }
                            );
                    }
                );

            });

            $query_recent_treatments->when(request("patient_name"), function ($query) {
                $search_patient = request("patient_name");
                $query->where(
                    function ($q) use ($search_patient) {
                        $q->whereHas(
                            'patient',
                            function ($query_patient) use ($search_patient) {
                                    $query_patient->where('last_name', 'LIKE', '%' . $search_patient . '%')
                                        ->orWhere('first_name', 'LIKE', '%' . $search_patient . '%');
                                }
                        );
                    }
                );

            });

            $paginated_treatments = $query_recent_treatments->latest()->paginate(20);

            return $this->customSuccessResponseWithPayload($paginated_treatments);

        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function done_treatments_report()
    {
        try {

            Helper::custom_validator(
                request()->all(),
                ['year' => 'nullable|max:4|min:4', 'status' => 'nullable']
            );

            $query_treatments = DoneTreatment::with(['employees.country', 'employees.city', 'employees.position', 'employees.department', 'employees.reportingTo', 'patient', 'invoices']);

            $query_treatments->when(request("year"), function ($query) {
                $year = request("year");
                $query->whereYear('created_at', $year);
            });

            $query_treatments->when(request("status"), function ($query) {
                $query->where('treatment_status', request("status"));
            });

            $query_treatments->when(request("doctors"), function ($query) {
                $doctors = request("doctors");
                $query->where(
                    function ($q) use ($doctors) {
                        foreach ($doctors as $doctor) {
                            $q->orWhereJsonContains('doctors', $doctor);
                        }
                    }
                );
            });

            $query_treatments->when(request("date_range"), function ($query) {
                $date_range = request("date_range");
                $query->whereDate('created_at', '>=', $date_range[0])->whereDate('created_at', '<=', $date_range[1]);
            });

            $query_treatments->when(request('month_range'), function ($query) {
                $month_range = request("month_range");
                $query->whereMonth('created_at', $month_range[0])->whereYear('created_at', $month_range[1]);
            });

            $query_treatments->when(request("patient_name"), function ($query) {
                $search_patient = request("patient_name");
                $query->whereHas(
                    'patient',
                    function ($query_patient) use ($search_patient) {
                        $query_patient->where('last_name', 'LIKE', '%' . $search_patient . '%')
                            ->orWhere('first_name', 'LIKE', '%' . $search_patient . '%');
                    }
                );

            });

            $query_treatments->when(request("search_word"), function ($query) {
                $search_word = request("search_word");
                $query->where('id', 'LIKE', '%' . $search_word . '%')->orWhere('treatment_status', 'LIKE', '%' . $search_word . '%')
                    ->orWhereHas(
                        'patient',
                        function ($query_patients) use ($search_word) {
                            $query_patients->where('last_name', 'LIKE', '%' . $search_word . '%')
                                ->orWhere('first_name', 'LIKE', '%' . $search_word . '%');
                        }
                    )->orWhereHas(
                        'employees',
                        function ($query_doctors) use ($search_word) {
                            $query_doctors->where('last_name', 'LIKE', '%' . $search_word . '%')
                                ->orWhere('first_name', 'LIKE', '%' . $search_word . '%');
                        }
                    );
            });

            $paginated_treatments = $query_treatments->latest()->paginate(20);

            return $this->customSuccessResponseWithPayload($paginated_treatments);

        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function doctor_treatments()
    {
        try {
            Helper::custom_validator(
                request()->all(),
                ['year' => 'nullable|max:4|min:4', 'status' => 'nullable', 'doctorId' => 'required|integer']
            );
            $doctor_treatments = DoneTreatment::whereJsonContains('doctors', [request()->doctorId])->with(['invoices', 'patient']);

            $doctor_treatments->when(request()->status, function ($query) {
                $status = request()->status;
                $query->where(
                    function ($q) use ($status) {
                        $q->where('treatment_status', $status);
                    }
                );
            });

            $doctor_treatments->when(request()->year, function ($query) {
                $year = request()->year;
                $query->where(
                    function ($q) use ($year) {
                        $q->whereYear('created_at', $year);
                    }
                );
            });
            $doctor_treatments->when(request("date_range"), function ($query) {
                $date_range = request("date_range");
                $query->where(
                    function ($q) use ($date_range) {
                        $q->whereDate('created_at', '>=', $date_range[0])->whereDate('created_at', '<=', $date_range[1]);
                    }
                );
            });
            $doctor_treatments->when(request("month_range"), function ($query) {
                $month_range = request("month_range");
                $query->where(
                    function ($q) use ($month_range) {
                        $q->whereMonth('created_at', $month_range[0])->whereYear('created_at', $month_range[1]);
                    }
                );
            });
            $doctor_treatments->when(request("patients"), function ($query) {
                $patients = request("patients");
                $query->where(
                    function ($q) use ($patients) {
                        $q->whereIn('patient_id', $patients);
                    }
                );
            });
            $doctor_treatments->when(request("search_word"), function ($query) {
                $search_word = request("search_word");
                $query->where(
                    function ($q) use ($search_word) {
                        $q->where('id', 'LIKE', '%' . $search_word . '%')->orWhere('treatment_status', 'LIKE', '%' . $search_word . '%')->orWhereHas(
                            'patient',
                            function ($query_doctors) use ($search_word) {
                                    $query_doctors->where('last_name', 'LIKE', '%' . $search_word . '%')
                                        ->orWhere('first_name', 'LIKE', '%' . $search_word . '%');
                                }
                        );
                    }
                );
            });
            $paginated_treatments = $doctor_treatments->latest()->paginate(20);
            return $this->customSuccessResponseWithPayload($paginated_treatments);
        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function patient_treatments()
    {
        try {
            Helper::custom_validator(
                request()->all(),
                ['year' => 'nullable|max:4|min:4', 'status' => 'nullable', 'patientId' => 'required|integer']
            );
            $patient_treatments = DoneTreatment::where('patient_id', request()->patientId)->with(['employees.country', 'employees.city', 'employees.position', 'employees.department', 'employees.reportingTo', 'invoices']);
            $patient_treatments->when(request()->status, function ($query) {
                $status = request()->status;
                $query->where(
                    function ($q) use ($status) {
                        $q->where('treatment_status', $status);
                    }
                );
            });
            $patient_treatments->when(request()->year, function ($query) {
                $year = request()->year;
                $query->where(
                    function ($q) use ($year) {
                        $q->whereYear('created_at', $year);
                    }
                );
            });
            $patient_treatments->when(request("date_range"), function ($query) {
                $date_range = request("date_range");
                $query->where(
                    function ($q) use ($date_range) {
                        $q->whereDate('created_at', '>=', $date_range[0])->whereDate('created_at', '<=', $date_range[1]);
                    }
                );
            });
            $patient_treatments->when(request("month_range"), function ($query) {
                $month_range = request("month_range");
                $query->where(
                    function ($q) use ($month_range) {
                        $q->whereMonth('created_at', $month_range[0])->whereYear('created_at', $month_range[1]);
                    }
                );
            });
            $patient_treatments->when(request("doctors"), function ($query) {
                $doctors = request("doctors");
                $query->where(
                    function ($q) use ($doctors) {
                        foreach ($doctors as $doctor) {
                            $q->orWhereJsonContains('doctors', $doctor);
                        }
                    }
                );
            });
            $patient_treatments->when(request("search_word"), function ($query) {
                $search_word = request("search_word");
                $query->where(
                    function ($q) use ($search_word) {
                        $q->where('id', 'LIKE', '%' . $search_word . '%')->orWhere('treatment_status', 'LIKE', '%' . $search_word . '%')->orWhereHas(
                            'employees',
                            function ($query_doctors) use ($search_word) {
                                    $query_doctors->where('last_name', 'LIKE', '%' . $search_word . '%')
                                        ->orWhere('first_name', 'LIKE', '%' . $search_word . '%');
                                }
                        );
                    }
                );
            });
            $paginated_treatments = $patient_treatments->latest()->paginate(20);
            return $this->customSuccessResponseWithPayload($paginated_treatments);
        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function download_pdf()
    {
        try {
            $request_treatments = json_decode(request("treatments"));

            $done_treatments = DoneTreatment::with(['employees', 'patient', 'invoices'])
                ->whereIn('id', $request_treatments)->latest()->get();

            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.done_treatments_list', compact('done_treatments'));
            $pdf->setPaper('a3', 'landscape');
            return $pdf->stream("Treatments PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }

    }

    public function download_csv()
    {
        try {
            $request_treatments = json_decode(request("treatments"));
            return Excel::download(new DoneTreatmentExport($request_treatments), 'Treatments.csv');
        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function download_excel()
    {
        try {
            $request_treatments = json_decode(request("treatments"));
            return Excel::download(new DoneTreatmentExport($request_treatments), 'Treatments.xlsx');
        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function download_patient_treatments_pdf()
    {
        try {
            Helper::custom_validator(
                request()->all(),
                ['patientId' => 'required|integer']
            );
            $request_treatments = json_decode(request("treatments"));

            $done_treatments = DoneTreatment::with(['employees', 'invoices', 'patient:id,first_name,last_name,unique_identifier'])
                ->whereIn('id', $request_treatments)->latest()->get();
            $patient = Patient::where('id', request("patientId"))->get(['id', 'first_name', 'last_name', 'unique_identifier', 'middle_name']);
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.patient_treatment_list', compact('done_treatments', 'patient'));
            $pdf->setPaper('a3', 'landscape');
            return $pdf->stream("PatientTreatments PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function download_patient_treatments_excel()
    {
        try {
            $request_treatments = json_decode(request("treatments"));
            return Excel::download(new PatientDoneTreatments($request_treatments), 'PatientTreatments.xlsx');
        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }

    public function download_patient_treatments_csv()
    {
        try {
            $request_treatments = json_decode(request("treatments"));
            return Excel::download(new PatientDoneTreatments($request_treatments), 'PatientTreatments.csv');
        } catch (\Throwable $th) {
            return $this->customFailResponseMessage($th->getMessage());
        }
    }
}
