<?php

namespace App\Http\Controllers\v2\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InvoiceMailController extends Controller
{
    public function sendInvoice()
    {
        $invoice = \App\Models\Invoice::with('patient')->where('patient_id', 122)->get();
        $patient = \App\Models\Patient::where('id', 122)->first();

        $subtotal = 0;

        foreach($invoice as $key => $invoiceDetails){
            $subtotal += array_sum(explode(',', $invoiceDetails->prices));
            Session::put('InvoiceSubtotal', $subtotal);
        }

        \Mail::to('hassansaava@gmail.com')->send(new \App\Mail\InvoiceMail($invoice, $patient));

    }

    public function singleInvoice()
    {
        $invoice = \App\Models\Invoice::where('id', 22)->where('status', 0)->first();
        $patient = \App\Models\Patient::where('id', 22)->first();
        \Mail::to('hassansaava@gmail.com')->send(new \App\Mail\InvoiceMail($invoice));

    }
}
