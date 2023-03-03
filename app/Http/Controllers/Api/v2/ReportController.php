<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\DoneTreatment;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Treatment;
use App\Models\Employee;
use App\Http\Controllers\ApiBaseController;

class ReportController extends ApiBaseController
{
    public function __construct()
    {
//        $this->middleware(['auth:api']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [
            'treatments' => count(Treatment::all()),
            'employees' => count(Employee::all()),
            'patients' => count(Patient::all()),
            'invoices' => count(Invoice::all()),
            'appointments' => count(Appointment::all())
        ];
        return $this->customSuccessResponseWithPayload($response);
    }

    private function get_months_data($data_to_filter)
    {
        $jan = $feb = $mar = $apr = $may = $jun = $jul = $aug = $sep = $oct = $nov = $dec = 0;
        foreach ($data_to_filter as $data) {
            if ($data->created_at->format('M') === 'Jan') {
                $jan++;
            }
            if ($data->created_at->format('M') === 'Feb') {
                $feb++;
            }
            if ($data->created_at->format('M') === 'Mar') {
                $mar++;
            }
            if ($data->created_at->format('M') === 'Apr') {
                $apr++;
            }
            if ($data->created_at->format('M') === 'May') {
                $mar++;
            }
            if ($data->created_at->format('M') === 'Jun') {
                $jun++;
            }
            if ($data->created_at->format('M') === 'Jul') {
                $jul++;
            }
            if ($data->created_at->format('M') === 'Aug') {
                $aug++;
            }
            if ($data->created_at->format('M') === 'Sep') {
                $sep++;
            }
            if ($data->created_at->format('M') === 'Oct') {
                $oct++;
            }
            if ($data->created_at->format('M') === 'Nov') {
                $nov++;
            }
            if ($data->created_at->format('M') === 'Dec') {
                $dec++;
            }
        }
        $filtered = [$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec];
        return $filtered;
    }

    private function get_appointment_months_data($data_to_filter)
    {
        $jan = $feb = $mar = $apr = $may = $jun = $jul = $aug = $sep = $oct = $nov = $dec = 0;
        foreach ($data_to_filter as $data) {
            $month = \Carbon\Carbon::createFromFormat('d-m-Y', $data)->format('m');
            if ($month === '01') {
                $jan++;
            }
            if ($month === '02') {
                $feb++;
            }
            if ($month === '03') {
                $mar++;
            }
            if ($month === '04') {
                $apr++;
            }
            if ($month === '05') {
                $mar++;
            }
            if ($month === '06') {
                $jun++;
            }
            if ($month === '07') {
                $jul++;
            }
            if ($month === '08') {
                $aug++;
            }
            if ($month === '09') {
                $sep++;
            }
            if ($month === '10') {
                $oct++;
            }
            if ($month === '11') {
                $nov++;
            }
            if ($month === '12') {
                $dec++;
            }
        }
        $filtered = [$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec];
        return $filtered;
    }

    /**
     * Fetch data of bar graph.
     *
     * @return \Illuminate\Http\Response
     */
    public function bar_graph_data_patients_counters_system_reports()
    {

        $year = isset(request()->year) ? request()->year : \Carbon\Carbon::now()->format('Y');

        $given_patients = Patient::whereYear('created_at', $year)->get();

        $response = [
            [
                'label' => 'Patients',
                'data' => $this->get_months_data($given_patients)
            ],
            [
                'categories' => [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            ]
        ];
        return $this->customSuccessResponseWithPayload($response);

    }

    public function bar_graph_data_appointments_counters_system_reports()
    {

        $year = isset(request()->year) ? request()->year : \Carbon\Carbon::now()->format('Y');

        try {
            $appointments = Appointment::pluck('date')->all();

            $given_appointments = [];

            foreach ($appointments as $appointment) {
                $appointment_year = \Carbon\Carbon::createFromFormat('d-m-Y', $appointment)->format('Y');
                if ($appointment_year == $year) {
                    $given_appointments[] = $appointment;
                }
            }

            $response = [
                [
                    'label' => 'Appointments',
                    'data' => $this->get_appointment_months_data($given_appointments)
                ],
                [
                    'categories' => [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ]
                ]
            ];
            return $this->customSuccessResponseWithPayload($response);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }

    public function bar_graph_data_employees_counters_system_reports()
    {

        $year = isset(request()->year) ? request()->year : \Carbon\Carbon::now()->format('Y');

        $given_employees = Employee::whereYear('created_at', $year)->get();

        $response = [
            [
                'label' => 'Registered Employees',
                'data' => $this->get_months_data($given_employees)
            ],
            [
                'categories' => [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            ]
        ];
        return $this->customSuccessResponseWithPayload($response);

    }

    public function bar_graph_data_donetreatments_counters_system_reports()
    {

        $year = isset(request()->year) ? request()->year : \Carbon\Carbon::now()->format('Y');

        $given_treatments = DoneTreatment::whereYear('created_at', $year)->get();

        $response = [
            [
                'label' => 'Treatments',
                'data' => $this->get_months_data($given_treatments)
            ],
            [
                'categories' => [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            ]
        ];
        return $this->customSuccessResponseWithPayload($response);

    }

    public function bar_graph_data_invoices_counters_system_reports()
    {

        $year = isset(request()->year) ? request()->year : \Carbon\Carbon::now()->format('Y');

        $given_paid = Invoice::whereYear('created_at', $year)->where('status', 1)->get();

        $given_unpaid = Invoice::whereYear('created_at', $year)->where('status', 0)->get();

        $response = [
            [
                'label' => 'Paid Invoices',
                'data' => $this->get_months_data($given_paid)
            ],
            [
                'label' => 'Unpaid Invoices',
                'data' => $this->get_months_data($given_unpaid)
            ],
            [
                'categories' => [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            ]
        ];
        return $this->customSuccessResponseWithPayload($response);

    }

    private function get_months_payments($data_to_filter)
    {
        $jan = $feb = $mar = $apr = $may = $jun = $jul = $aug = $sep = $oct = $nov = $dec = 0.00;
        foreach ($data_to_filter as $data) {
            if ($data->created_at->format('M') === 'Jan') {
                $jan += $data->paidamount;
            }
            if ($data->created_at->format('M') === 'Feb') {
                $feb += $data->paidamount;
            }
            if ($data->created_at->format('M') === 'Mar') {
                $mar += $data->paidamount;
            }
            if ($data->created_at->format('M') === 'Apr') {
                $apr += $data->paidamount;
            }
            if ($data->created_at->format('M') === 'May') {
                $mar += $data->paidamount;
            }
            if ($data->created_at->format('M') === 'Jun') {
                $jun += $data->paidamount;
            }
            if ($data->created_at->format('M') === 'Jul') {
                $jul += $data->paidamount;
            }
            if ($data->created_at->format('M') === 'Aug') {
                $aug += $data->paidamount;
            }
            if ($data->created_at->format('M') === 'Sep') {
                $sep += $data->paidamount;
            }
            if ($data->created_at->format('M') === 'Oct') {
                $oct += $data->paidamount;
            }
            if ($data->created_at->format('M') === 'Nov') {
                $nov += $data->paidamount;
            }
            if ($data->created_at->format('M') === 'Dec') {
                $dec += $data->paidamount;
            }
        }
        $filtered = [round($jan, 2), round($feb, 2), round($mar, 2), round($apr, 2), round($may, 2), round($jun, 2), round($jul, 2), round($aug, 2), round($sep, 2), round($oct, 2), round($nov, 2), round($dec, 2)];
        return $filtered;
    }

    public function bar_graph_data_received_amount_counters_system_reports()
    {

        $year = isset(request()->year) ? request()->year : \Carbon\Carbon::now()->format('Y');

        $given_payments = Invoice::whereYear('created_at', $year)->where('status', 1)->get();

        $response = [
            [
                'label' => 'Amounts',
                'data' => $this->get_months_payments($given_payments)
            ],
            [
                'categories' => [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            ]
        ];
        return $this->customSuccessResponseWithPayload($response);

    }

    public function pie_chart_graph_data_patient_gender_counters_system_reports()
    {

        $male_patients = count(Patient::where('gender', 'Male')->get());

        $female_patients = count(Patient::where('gender', 'Female')->get());

        $response = [
            [
                'label' => 'Patient Gender',
                'data' => [$male_patients, $female_patients]
            ],
            [
                'categories' => [
                    'Male',
                    'Female'
                ]
            ]
        ];
        return $this->customSuccessResponseWithPayload($response);

    }

    private function format_appex_chart_data($data_to_filter)
    {
        $all_data = [];
        foreach ($data_to_filter as $data) {
            $micro_date = strtotime($data) * 1000;
            $all_data[] = $micro_date;
        }
        $filtered = [];
        $get_repeat_values = array_count_values($all_data);
        foreach ($get_repeat_values as $key => $value) {
            $filtered[] = [$key, $value];
        }
        return $filtered;
    }

    public function appointment_appex_chart()
    {
        try {
            $appointments = Appointment::pluck('date')->all();
            $appex_data = $this->format_appex_chart_data($appointments);
            return $this->customSuccessResponseWithPayload($appex_data);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function employee_appex_chart()
    {
        try {
            $employees = Employee::pluck('created_at')->all();
            $dates = [];
            foreach ($employees as $employee) {
                $dates[] = $employee->format('d-m-Y');
            }
            $appex_data = $this->format_appex_chart_data($dates);
            return $this->customSuccessResponseWithPayload($appex_data);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }


    public function done_treatment_appex_chart()
    {
        try {
            $done_treatments = DoneTreatment::pluck('created_at')->all();
            $dates = [];
            foreach ($done_treatments as $treatment) {
                $dates[] = $treatment->format('d-m-Y');
            }
            $appex_data = $this->format_appex_chart_data($dates);
            return $this->customSuccessResponseWithPayload($appex_data);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function patient_appex_chart()
    {
        try {
            $patients = Patient::pluck('created_at')->all();
            $dates = [];
            foreach ($patients as $patient) {
                $dates[] = $patient->format('d-m-Y');
            }
            $appex_data = $this->format_appex_chart_data($dates);
            return $this->customSuccessResponseWithPayload($appex_data);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
}
