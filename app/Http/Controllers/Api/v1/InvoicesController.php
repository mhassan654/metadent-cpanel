<?php

namespace App\Http\Controllers\Api\v1;

use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\Patient;
use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\InvoiceResource;
use Illuminate\Support\Facades\Session;

class InvoicesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware("auth:api");
    // }

    public function index()
    {
        return $this->allInvoices();
    }

    public function show()
    {
        request()->validate(["invoiceId" => "required"]);

        $invoice = Invoice::with(['patient', 'doctor'])->find(request()->invoiceId);

        if ($invoice) {
            return $this->invoice($invoice);
        }

        return $this->customFailResponseWithPayload("Invoice not found");
    }

    public function patient_invoices()
    {
        request()->validate(["patientId" => "required"]);

        $patient = Patient::find(request()->patientId);

        if ($patient) {
            return $this->customSuccessResponseWithPayload(Invoice::where("patient_id", $patient->id)->orderBy("created_at", "desc")->get());
        }

        return $this->failure("Patient not found");
    }

    public function store()
    {
        request()->validate([
            "patient_id" => "required",
            "service_type" => "required",
            "invoice_type" => "required",
            "services" => "required",
            "prices" => "required",
            "status" => "required",
            "totalWithVat" => "required",
            "vat" => "required",
            "payment_mode" => "required",
            "doctor_id" => "required"
        ]);

        $newInvoice = Invoice::create([
            "patient_id" => request()->patientId,
            "doctor_id" => request()->doctorId,
            "service_type" => request()->serviceType,
            "patient_id" => request()->patient_id,
            "service_type" => request()->service_type,
            "total_with_vat" => request()->totalWithVat,
            "vat" => request()->vat,
            "payment_mode" => request()->payment_mode,
            "services" => request()->services,
            "prices" => request()->prices,
            "status" => request()->status,
            "invoice_type" => request()->invoice_type,
            "invoice_id" => Invoice::generateUniqueInvoiceId(),
            "facility_id" => Auth::user()->facility_id,
            "doctor_id" => request()->doctor_id,
            "internal_notes" => request()->internal_notes
        ]);

        if ($newInvoice) {

            LogActivity::addToLog('New Invoice with id:' . $newInvoice->id . 'was created');
            return $this->invoice($newInvoice);
        }

        return $this->failure("Invoice was not created");
    }

    public function update()
    {
        request()->validate(["invoiceId" => "required"]);

        $invoice = Invoice::with('patient')->find(request()->invoiceId);

        $latest = Invoice::latest('id')->first();
        $rec = $latest->receipt_number;
        $rec++;
        $invoice_number = sprintf('%07d', $rec);
        $number = "DS" . $invoice_number;

        if ($invoice) {
            $invoice->update([
                "service_type" => request()->serviceType,
                "services" => request()->services,
                "prices" => request()->prices,
                "invoice_type" => request()->invoiceType,
                "paidamount" => request()->paidAmount,
                "balance_due" => request()->balanceDue,
                "due_date" => request()->dateDue,
                "receipt_number" => $number,
                "status" => request()->status,
            ]);

            LogActivity::addToLog('Invoice with id:' . $invoice->id . 'was changed');
            return $this->invoice(Invoice::with('patient')->find(request()->invoiceId));
        }

        return $this->customFailResponseWithPayload("Invoice not found");
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
        $allInvoices = Invoice::with(["patient", "doctor"])->orderBy("created_at", "desc")->get();
        // $allInvoices = Invoice::with(["patient", "doctor"])->orderBy("created_at", "desc")->paginate(request()->all());

        // $patientsWithInvoices = [];

        // foreach($allInvoices as $invoice)
        // {
        //     if(!in_array($invoice->id, $patientsWithInvoices))
        //     {
        //         array_push($patientsWithInvoices, $invoice->id);
        //     }
        // }
        $allInvoices = Invoice::with(["treatments", "patient:id,first_name,last_name,photo", "doctor:id,first_name,last_name"])
        ->where('facility_id', Auth::user()->facility_id)->orderBy("created_at", "desc")->get();
    return $this->customSuccessResponseWithPayload(InvoiceResource::collection($allInvoices));
        // return $this->customSuccessResponseWithPayload($allInvoices);
    }

    // delete specific invoice
    public function delete()
    {
        request()->validate(["invoiceId" => "required"]);

        $invoice = Invoice::find(request()->invoiceId);
        $invoice->delete();

        // if ($invoice)
        // {
        //     $invoice->delete();
        LogActivity::addToLog('Invoice with id:' . $invoice->id . 'was deleted');
        return $this->customSuccessResponseWithMessage("Invoice deleted successfully");

        // }else{
        //     return $this->failure("Sorry Request failed");
        // }
    }

    private function invoice($invoice)
    {
        return $this->customSuccessResponseWithPayload($invoice);
    }

    private function failure($message)
    {
        return $this->customFailResponseWithPayload($message);
    }

    // send invoice payment reminder to patient
    public function sendInvoice()
    {
        request()->validate(["patientId" => "required"]);
        $patientDetail = Patient::find(request()->patientId);

        $invoice = \App\Models\Invoice::where('patient_id', $patientDetail->id)->where('status', 0)->get();

        $patient = \App\Models\Patient::where('id', $patientDetail->id)->first();

        $total = 0;

        foreach($invoice as $key => $invoiceDetails){
            $total += array_sum(explode(',', $invoiceDetails->prices)) ;
        }

        Session::put('InvoiceSubtotal', $total);

        $tax = 18;
        $grandTotal = 0;

        $subtotal  = Session::get('InvoiceSubtotal', $total);
        $taxableCost = (18 / 100) * $subtotal;

        $grandTotal = $subtotal + $taxableCost;
        Session::put('grandTotal', $grandTotal );

        if($invoice && $patient)
        {
            Mail::to($patient->email)->send(new \App\Mail\InvoiceMail($invoice, $patient));

            return $this->customSuccessResponseWithPayload("Email reminder Sent.");

        }elseif ($patientDetail->id) {

            \App\Models\Invoice::where('patient_id', $patientDetail->id)->where('status','!=', 0)->get();

            return $this->customFSuccessResponseWithPayload("Paid");
        }
        else{

            return $this->customFailResponseWithPayload("Email was not sent, please check your details.");
        }


    }

    public function sendSingleInvoice()
    {

        request()->validate(["invoiceId" => "required"]);

        $invoiceDetails = Invoice::with('patient')->find(request()->invoiceId);

        $subtotal = 0;

        $subtotal += array_sum(explode(',', $invoiceDetails->prices));

        Session::put('InvoiceSubtotal', $subtotal);

        try {
            if ($invoiceDetails) {
                \Mail::to($invoiceDetails->patient->email)->send(new \App\Mail\SingleInvoiceMail($invoiceDetails));
                $patient_name = $invoiceDetails->patient->first_name;
                return $this->customSuccessResponseWithPayload("Payment Reminder Sent to .'<strong>' $patient_name  '</strong>' ");
            } else {
                return $this->customFailResponseWithPayload("Email was not sent, please check your details.");
            }
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }

    }

    public function invoice_num($input, $pad_len = 7, $prefix = null)
    {
        if ($pad_len <= strlen($input)) {
            trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong>
             to generate invoice number', E_USER_ERROR);
        }

        if (is_string($prefix)) {
            return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
        }

        return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
    }

    private function receiptNumber($input, $pad_len = 7, $prefix = null)
    {
        // $latest = Invoice::latest()->find();
        if ($pad_len <= strlen($input)) {
            trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong>
              to generate invoice number', E_USER_ERROR);
        }

        if (is_string($prefix)) {
            return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
        }

        return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
    }
}
