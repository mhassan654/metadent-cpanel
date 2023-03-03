<?php
/**
    **Created by MUWONGE HASSAN on 10/06/2022
    *Github: https://github.com/mhassan654
    *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
    *email: hassansaava@gmail.com
    *phone: +256704348792
    *website: https://muwongehassan.com
    */

namespace App\Services\PatientsPortal;

use App\Models\Invoice;
use App\Models\InvoiceTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class PatientInvoiceService
{
    // public Controller $controller;

    public static function invoice_list()
    {
        $patient_invoices = Invoice::where('patient_id',auth('patient')->user()->facility_id)->get();

        return $patient_invoices;
    }

    public static function invoice_transactions()
    {
        $validator = Validator::make(request()->all(), [
            'invoiceId' => 'required|integer',
        ]);


        $controller = new Controller();

        if ($validator->fails()) {
            return $controller->customPatientErrorResponse($validator->messages(), 200);
        }
        $invoices_transactions = InvoiceTransaction::where('invoice_id',request()->invoiceId)->get();

        return $invoices_transactions;
    }

    public static function transaction()
    {
        request()->validate([
            'transactionId' => 'required'
        ]);
        
        return InvoiceTransaction::find(request()->transactionId);
    }

}
