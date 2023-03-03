<?php

namespace App\Http\Controllers\v2\Companies;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\InvoiceRefund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InvoiceRefundController extends Controller
{

    public function getRefunds(){
        $validator = Validator::make(request()->all(), [
            "invoiceId" => 'required|integer|exists:App\Models\Invoice,id',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all(), 200);
        }

        $id = \request()->invoiceId;

        $res = InvoiceRefund::where('invoice_id',$id)->get();
        return $this->customSuccessResponseWithPayload($res);
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make(request()->all(), [
                "patientId" => 'required|integer|exists:App\Models\Patient,id',
                "refundAmount" => "required",
                "invoiceId" => 'required|integer|exists:App\Models\Invoice,id',
                "refundReason"=>"nullable"
            ]);

            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all(), 200);
            }


            $refund_payment = InvoiceRefund::create([
                "patient_id" => request()->patientId,
                "invoice_id" =>request()->invoiceId,
                "refund_reason" => request()->refundReason,
                "refund_amount" =>request()->refundAmount,
                "officer" =>Auth::user()->id,
            ]);

            if ($refund_payment) {
                LogActivity::addToLog('Create invoice refund', 'Create', null, null, null, $refund_payment->id);
                return response()
                    ->json(
                        [
                            "status" => "SUCCESS",
                            "payload" => 'Invoice refund was done successfully',
                        ]
                    );
            }

            return $this->customFailResponseWithPayload("Invoice refund was not created");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }


}
