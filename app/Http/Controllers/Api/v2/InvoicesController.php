<?php

namespace App\Http\Controllers\Api\v2;

use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Employee;
use App\Models\Treatment;
use App\Helpers\LogActivity;
use Google\Service\Resource;
use Illuminate\Http\Request;
use App\Mail\InvoiceCreation;
use App\Exports\InvoicesExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\InvoiceResource;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ApiV2Controller;
use Illuminate\Support\Facades\Validator;

class InvoicesController extends ApiV2Controller
{

    public function index()
    {
        $permissions = $this->allInvoices();
        LogActivity::addToLog('Read Invoice List', 'Read');
        return $permissions;
    }

    public function show()
    {
        $validator = Validator::make(request()->all(), [
            'invoiceId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all(), 200);
        }

        $invoice = Invoice::withoutAppends()->with(['patient:id,first_name,last_name', 'doctor:id,first_name,last_name', 'treatments'])
            ->find(request()->invoiceId);
        if ($invoice) {
            LogActivity::addToLog('Read Invoice Details', 'Read', null, null, null, $invoice->id);
            return $this->customSuccessResponseWithPayload($invoice);
        }

        return $this->customFailResponseWithPayload("Invoice not found");
    }

    public function patient_invoices(Request $request)
    {

        $validator = Validator::make(request()->all(), [
            'patientId' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->errors()->all(), 200);
        }

        $patient = Patient::find(request()->patientId);

        if ($patient) {
            $patient_invoices = Invoice::with(['treatments', 'doctor:id,first_name,last_name'])
                ->where("patient_id", $patient->id)->orderBy("created_at", "desc")->get();
            LogActivity::addToLog('Read Patient Invoice List', 'Read');
            return $this->customSuccessResponseWithPayload($patient_invoices);
        }

        return $this->failure("Patient not found");
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make(request()->all(), [
                "patientId" => 'required|integer|exists:App\Models\Patient,id',
                "serviceType" => "required",
                "invoiceType" => "required",
                "services" => "required|array",
                "doctors" => "required|array",
                "services.*" => "integer",
                "prices" => "required|integer",
                "status" => "required",
                "totalWithVat" => "required|integer",
                "vat" => "required",
                "paymentMode" => "nullable",
                "paymentDescription" => "nullable",
                // "doctorId" => 'required|integer|exists:App\Models\Employee,id',
                "date" => "required",
            ]);

            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all(), 200);
            }

            $balance_due = 0.00;
            $paidamount = 0.00;
            if (request()->status == 1) {
                $paidamount = array_sum(explode(',', request()->prices));
                $balance_due = 0.00;
            } else {
                $balance_due = array_sum(explode(',', request()->prices));
                $paidamount = 0.00;
            }

            $newInvoice = Invoice::create([
                "patient_id" => request()->patientId,
                "service_type" => request()->serviceType,
                "total_with_vat" => request()->totalWithVat,
                "vat" => request()->vat,
                "services" => request()->services,
                "prices" => request()->prices,
                "status" => request()->status,
                "invoice_type" => request()->invoiceType,
                "facility_id" => 1,
                // "doctor_id" => request()->doctorId,
                "balance_due" => $balance_due,
                "paidamount" => $paidamount,
                "payment_mode" => request()->paymentMode,
                "payment_description" => request()->paymentDescription,
                "internal_notes" => request()->internalNotes,
                "due_date" => request()->date,
            ]);

            if ($newInvoice) {
                Artisan::call('treatment:invoice-pivot');
                $newInvoice->doctors()->attach(request()->doctors);
                $invoice = Invoice::with('patient:id,last_name,first_name,email,unique_identifier,home_address,home_phone')->where('id', $newInvoice->id)->first();
                if ($invoice) {
                    $treatment_prices = [];
                    $services = [];
                    foreach ($invoice->services as $service) {
                        $services[] = Treatment::where('id', $service)->first('treatment')->treatment;
                    }
                    $prices = explode(',', $invoice->prices);
                    for ($i = 0; $i < count($services); $i++) {
                        $treatment_price = (object) [];
                        $treatment_price->treatment = $services[$i];
                        $treatment_price->price = $prices[$i];
                        $treatment_prices[] = $treatment_price;
                    }
                    $invoice->treatment_prices = $treatment_prices;
                    $converted_invoice = [];
                    $converted_invoice[] = $invoice;
                    Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
                    $pdf = Pdf::loadView('pdfs.invoice_details', compact('converted_invoice'));
                    $details = [
                        'firstName' => $invoice->patient->first_name,
                        'lastName' => $invoice->patient->last_name
                    ];

                    Mail::to($invoice->patient->email)->send(new InvoiceCreation($details, $pdf->output()));
                }
                LogActivity::addToLog('Create Invoice', 'Create', null, null, null, $newInvoice->id);
                return response()
                    ->json(
                        [
                            "status" => "SUCCESS",
                            "payload" => 'Invoice created successfully',
                        ]
                    );
            }

            return $this->customFailResponseWithPayload("Invoice was not created");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function update()
    {
        try {

            $validator = Validator::make(request()->all(), [
                "patientId" => "required",
                "serviceType" => "required",
                "invoiceType" => "required",
                "services" => "required|array",
                "services.*" => "integer",
                "prices" => "required",
                "status" => "required",
                "totalWithVat" => "required",
                "vat" => "required",
                "doctorId" => "required",
                "date" => "required",
                "balanceDue" => "required",
                "paidAmount" => "required",
                "internalNotes" => "required",
                "invoiceId" => "required",
                "payment_mode" => 'required',
                "paymentDescription" => "nullable",
            ]);

            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all(), 200);
            }

            $invoice = Invoice::find(request()->invoiceId);

            if ($invoice) {

                $invoice->update([
                    "patient_id" => request()->patientId,
                    "service_type" => request()->serviceType,
                    "total_with_vat" => request()->totalWithVat,
                    "vat" => request()->vat,
                    "services" => request()->services,
                    "prices" => request()->prices,
                    "status" => request()->status,
                    "invoice_type" => request()->invoiceType,
                    "facility_id" => 1,
                    // "doctor_id" => request()->doctorId,
                    "balance_due" => request()->balanceDue,
                    "internal_notes" => request()->internalNotes,
                    "due_date" => request()->date,
                    "paidamount" => request()->paidAmount,
                    "payment_mode" => request()->paymentMode,
                    "payment_description" => request()->paymentDescription,
                ]);

                $invoice->treatments()->detach();

                $invoice->doctors()->detach();

                $invoice->treatments()->attach(request()->services);

                $invoice->doctors()->attach(request()->doctors);

                LogActivity::addToLog('Update Invoice Details', 'Update', null, null, null, $invoice->id);

                return $this->customSuccessResponseWithPayload(Invoice::
                    with(['patient:id,first_name,last_name', 'doctor:id,last_name,first_name', 'treatments'])->find(request()->invoiceId));
            }

            return $this->customFailResponseWithPayload("Invoice not found");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

    }

    // fetch all paid invoices
    public function allPaidInvoices()
    {
        // for paid invoices
        $paidInvoices = Invoice::select('id', 'created_at')->where('status', 1)
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('m');
            });

        // for unpaid invoices
        $unpaidInvoices = Invoice::select('id', 'created_at')->where('status', 0)
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('m');
            });

        // paid invoice count
        $paidInvoiceCount = [];

        // unpaid invoice count
        $unpaidInvoiceCount = [];

        $paidInvoiceArr['paid'] = [];
        $unpaidInvoiceArr['unpaid'] = [];

        // loop through paid invoices
        foreach ($paidInvoices as $key => $value) {
            $paidInvoiceCount[(int) $key] = count($value);
        }

        // loop through unpaid invoices
        foreach ($unpaidInvoices as $key => $value) {
            $unpaidInvoiceCount[(int) $key] = count($value);
        }

        $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        for ($i = 1; $i <= 12; $i++) {
            if (!empty($paidInvoiceCount[$i])) {
                $paidInvoiceArr['paid'][$i]['count'] = $paidInvoiceCount[$i];
            } else {
                $paidInvoiceArr['paid'][$i]['count'] = 0;
            }
            $paidInvoiceArr['paid'][$i]['month'] = $month[$i - 1];
        }

        for ($j = 1; $j <= 12; $j++) {
            if (!empty($unpaidInvoiceCount[$j])) {
                $unpaidInvoiceArr['unpaid'][$j]['count'] = $unpaidInvoiceCount[$j];
            } else {
                $unpaidInvoiceArr['unpaid'][$j]['count'] = 0;
            }
            $unpaidInvoiceArr['unpaid'][$j]['month'] = $month[$j - 1];
        }

        // if ($invoiceArr) {
        //     return $this->customSuccessResponseWithPayload(array_values($invoiceArr));
        // }

        if ($paidInvoiceArr && $unpaidInvoiceArr) {
            return $this->customSuccessResponseWithPayload(array_merge($unpaidInvoiceArr, $paidInvoiceArr));
        }

        return $this->failure("Data not found");
    }

    private function allInvoices()
    {
        $allInvoices = Invoice::with(["treatments", "patient:id,first_name,last_name,photo", "doctor:id,first_name,last_name"])->orderBy("created_at", "desc")->get();
        return $this->customSuccessResponseWithPayload(InvoiceResource::collection($allInvoices));
    }

    public function daily_invoices()
    {
        $date = \Carbon\Carbon::now()->format('Y-m-d');
        $dailyInvoices = Invoice::with(["treatments", "patient:id,first_name,last_name", "doctor:id,first_name,last_name"])
            ->whereDate('created_at', $date)->get();
        return $this->customSuccessResponseWithPayload($dailyInvoices);
    }

    public function paginated_invoices()
    {
        try {
            $query_invoices = Invoice::withoutAppends()->with(["treatments", "patient:id,first_name,last_name", "doctor:id,first_name,last_name", "doctors:id,first_name,last_name"]);

            $query_invoices->when(request("search_word"), function ($query) {
                $search_word = request("search_word");
                return $query->whereHas(
                    'patient',
                    function ($query_patient) use ($search_word) {
                        $query_patient->where('first_name', 'LIKE', '%' . $search_word . '%')
                            ->orWhere('last_name', 'LIKE', '%' . $search_word . '%');
                    }
                )
                    ->orWhereHas(
                        'doctor',
                        function ($query_doctor) use ($search_word) {
                            $query_doctor->where('first_name', 'LIKE', '%' . $search_word . '%')
                                ->orWhere('last_name', 'LIKE', '%' . $search_word . '%');
                        }
                    )->orWhereHas(
                        'treatments',
                        function ($query_treatments) use ($search_word) {
                            $query_treatments->where('treatment', 'LIKE', '%' . $search_word . '%');
                        }
                    );
            });
            $query_invoices->when(request("year"), function ($query) {
                return $query->whereYear('created_at', request("year"));
            });
            $query_invoices->when(request("date_range"), function ($query) {
                $date_range = request("date_range");
                return $query->whereDate('created_at', '>=', $date_range[0])
                    ->whereDate('created_at', '<=', $date_range[1]);
            });
            $query_invoices->when(request("month_range"), function ($query) {
                $month_range = request("month_range");
                return $query->whereMonth('created_at', $month_range[0])
                    ->whereYear('created_at', $month_range[1]);
            });
            $query_invoices->when(request("doctors"), function ($query) {
                $doctors = request("doctors");
                return $query->whereIn('doctor_id', $doctors);
            });
            $query_invoices->when(request("treatments"), function ($query) {
                $treatments = request("treatments");
                return $query->where(
                    function ($q) use ($treatments) {
                        foreach ($treatments as $treatment) {
                            $q->orWhereJsonContains('services', $treatment);
                        }
                    }
                );
            });
            $query_invoices->when(!is_null(request("status")), function ($query) {
                return $query->where('status', request("status"));
            });
            $query_invoices->when(!is_null(request("type")), function ($query) {
                return $query->where('invoice_type', request("type"));
            });



            $paginated_invoices = $query_invoices->latest()->paginate(20);
            LogActivity::addToLog('Read Invoice List', 'Read');
            return $this->customSuccessResponseWithPayload($paginated_invoices);
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    // delete specific invoice
    public function delete()
    {


        $validator = Validator::make(request()->all(), [
            "invoiceId" => "required",
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseMessage($validator->errors()->all(), 200);
        }

        $invoice = Invoice::find(request()->invoiceId);
        if ($invoice) {
            DB::transaction(function () use ($invoice) {
                DB::table('invoices')->where('id', $invoice->id)->delete();
                // delete invoice refunds data as well
                DB::table('invoice_refunds')->where('invoice_id', $invoice->id)->delete();
            });
            // LogActivity::addToLog('Delete Invoice', 'Delete', null, null, null, $invoice->id);
            $invoice->delete();
            return $this->customSuccessResponseWithPayload("Invoice deleted successfully");
        }

        return $this->failResponse("Sorry Request failed");

    }

    private function invoice($invoice)
    {
        return $this->customSuccessResponseWithPayload($invoice);
    }

    private function failResponse($message)
    {
        return $this->customFailResponseWithPayload($message);
    }

    public function latest_invoices()
    {
        $latest = Invoice::with(["treatments", "patient:id,first_name,last_name,photo", "doctor:id,first_name,last_name"])
            ->latest()->take(15)->orderBy("created_at", "desc")->get();
        return $this->customSuccessResponseWithPayload($latest);
    }

    // send invoice payment reminder to patient
    public function sendInvoice()
    {
        request()->validate(["patientId" => "required"]);
        $patientDetail = Patient::find(request()->patientId);

        $invoice = Invoice::where('patient_id', $patientDetail->id)->where('status', 0)->get();
        $patient = Patient::where('id', $patientDetail->id)->first();

        $total = 0;

        foreach ($invoice as $key => $invoiceDetails) {
            $total += array_sum(explode(',', $invoiceDetails->prices));
        }

        Session::put('InvoiceSubtotal', $total);

        $tax = 18;
        $grandTotal = 0;

        $subtotal = Session::get('InvoiceSubtotal', $total);
        $taxableCost = (18 / 100) * $subtotal;

        $grandTotal = $subtotal + $taxableCost;
        Session::put('grandTotal', $grandTotal);

        if ($invoice && $patient) {
            Mail::to($patient->email)->send(new \App\Mail\InvoiceMail($invoice, $patient));

            return $this->customSuccessResponseWithPayload("Email reminder Sent.");

        } elseif ($patientDetail->id) {

            \App\Models\Invoice::where('patient_id', $patientDetail->id)->where('status', '!=', 0)->get();

            return $this->customFSuccessResponseWithPayload("Paid");
        } else {

            return $this->customFailResponseWithPayload("Email was not sent, please check your details.");
        }
    }

    public function sendSingleInvoice()
    {

        request()->validate(["invoiceId" => "required"]);
        $invoiceDetails = Invoice::with(['treatments', 'patient', 'doctor'])->find(request()->invoiceId);

        if ($invoiceDetails) {
            Mail::to('hassansaava@gmail.com')->send(new \App\Mail\SingleInvoiceMail($invoiceDetails));
            $patient_name = $invoiceDetails->patient->first_name;
            return $this->customSuccessResponseWithPayload("Payment Reminder Sent to .'<strong>' $patient_name  '</strong>' ");
        } else {
            return $this->customFailResponseWithPayload("Email was not sent, please check your details.");
        }
    }

    public function overdue_invoices()
    {
        $overdue_invoices = Invoice::where('due_date', '<', Carbon::now()->format('d-m-Y'))
            ->get();
        return $this->customSuccessResponseWithPayload(count($overdue_invoices));
    }

    public function recent_invoices()
    {
        $recent_invoices = Invoice::with(['patient:id,first_name,last_name', 'doctor:id,first_name,last_name'])->orderBy('created_at', 'desc')->get();
        return $this->customSuccessResponseWithPayload($recent_invoices);
    }

    public function patient_paid_unpaid_invoices()
    {
        try {
            // for paid invoices
            $paidInvoices = Invoice::select('id', 'created_at')->where('status', 1)
                ->where('patient_id', request()->patientId)
                ->get()
                ->groupBy(function ($date) {
                    return Carbon::parse($date->created_at)->format('m');
                });

            // for unpaid invoices
            $unpaidInvoices = Invoice::select('id', 'created_at')->where('status', 0)
                ->where('patient_id', request()->patientId)
                ->get()
                ->groupBy(function ($date) {
                    return Carbon::parse($date->created_at)->format('m');
                });

            // paid invoice count
            $paidInvoiceCount = [];

            // unpaid invoice count
            $unpaidInvoiceCount = [];

            $paidInvoiceArr['paid'] = [];
            $unpaidInvoiceArr['unpaid'] = [];

            // loop through paid invoices
            foreach ($paidInvoices as $key => $value) {
                $paidInvoiceCount[(int) $key] = count($value);
            }

            // loop through unpaid invoices
            foreach ($unpaidInvoices as $key => $value) {
                $unpaidInvoiceCount[(int) $key] = count($value);
            }

            $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            for ($i = 1; $i <= 12; $i++) {
                if (!empty($paidInvoiceCount[$i])) {
                    $paidInvoiceArr['paid'][$i]['count'] = $paidInvoiceCount[$i];
                } else {
                    $paidInvoiceArr['paid'][$i]['count'] = 0;
                }
                $paidInvoiceArr['paid'][$i]['month'] = $month[$i - 1];
            }

            for ($j = 1; $j <= 12; $j++) {
                if (!empty($unpaidInvoiceCount[$j])) {
                    $unpaidInvoiceArr['unpaid'][$j]['count'] = $unpaidInvoiceCount[$j];
                } else {
                    $unpaidInvoiceArr['unpaid'][$j]['count'] = 0;
                }
                $unpaidInvoiceArr['unpaid'][$j]['month'] = $month[$j - 1];
            }

            // if ($invoiceArr) {
            //     return $this->customSuccessResponseWithPayload(array_values($invoiceArr));
            // }

            if ($paidInvoiceArr && $unpaidInvoiceArr) {
                return $this->customSuccessResponseWithPayload(array_merge($unpaidInvoiceArr, $paidInvoiceArr));
            }

            return $this->failure("Data not found");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_invoice_details_pdf($id)
    {

        try {
            $invoice = Invoice::with('patient:id,last_name,first_name,unique_identifier,home_address,home_phone')->where('id', $id)->first();
            if ($invoice) {
                $treatment_prices = [];
                $services = [];
                foreach ($invoice->services as $service) {
                    $services[] = Treatment::where('id', $service)->first('treatment')->treatment;
                }
                $prices = explode(',', $invoice->prices);
                for ($i = 0; $i < count($services); $i++) {
                    $treatment_price = (object) [];
                    $treatment_price->treatment = $services[$i];
                    $treatment_price->price = $prices[$i];
                    $treatment_prices[] = $treatment_price;
                }
                $invoice->treatment_prices = $treatment_prices;
                $converted_invoice = [];
                $converted_invoice[] = $invoice;
                Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
                $pdf = Pdf::loadView('pdfs.invoice_details', compact('converted_invoice'));
                $invoice_number = $invoice->invoice_id;
                LogActivity::addToLog('Print Invoice Details', 'Execute');
                return $pdf->stream("Invoice_$invoice_number.pdf");
            }
            return $this->customPatientSuccessResponse('Invoice doesnot exist on the database');


        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_pdf()
    {
        try {
            $request_invoices = json_decode(request("invoices"));
            $invoices = Invoice::with(['treatments', 'patient:id,first_name,last_name,unique_identifier', 'doctor:id,first_name,last_name'])
                ->whereIn('id', $request_invoices)->latest()->get();

            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.invoices_list', compact('invoices'));
            $pdf->setPaper('a3', 'landscape');
            LogActivity::addToLog('Print Invoice PDF List', 'Execute');
            return $pdf->stream("Invoices PDF");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_excel()
    {
        try {
            $invoices = json_decode(request("invoices"));
            LogActivity::addToLog('Print Invoice Excel List', 'Execute');
            return Excel::download(new InvoicesExport($invoices), 'Invoices.xlsx');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_csv()
    {
        try {
            $invoices = json_decode(request("invoices"));
            LogActivity::addToLog('Print Invoice CSV List', 'Execute');
            return Excel::download(new InvoicesExport($invoices), 'Invoices.csv');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

}
