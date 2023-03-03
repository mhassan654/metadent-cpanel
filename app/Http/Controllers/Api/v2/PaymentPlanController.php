<?php

namespace App\Http\Controllers\Api\v2;

use App\Modules\Core\LogActivity;
use App\Http\Controllers\ApiBaseController;
use App\Mail\PaymentPlanReminder;
use App\Mail\SendPaymentPlan;
use App\Models\PaymentPlan;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PaymentPlanController extends BaseController
{
    public function getRefunds()
    {
        $validator = Validator::make(request()->all(), [
            "invoiceId" => 'required|integer|exists:App\Models\Invoice,id',
        ]);

        if ($validator->fails()) {
            return $this->customFailResponseWithPayload($validator->errors()->all(), 200);
        }

        $id = \request()->invoiceId;

        $res = PaymentPlan::where('invoice_id', $id)->get();
        return $this->customSuccessResponseWithPayload($res);
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make(request()->all(), [
                "installmentDueDates" => 'required',
                "invoiceId" => 'required|integer|exists:App\Models\Invoice,id',
                "noOfInstallments" => "nullable",
                "amtPerInstallment" => "nullable",
                "outstandingAmt" => "nullable"
            ]);

            if ($validator->fails()) {
                return $this->customFailResponseWithPayload($validator->errors()->all(), 200);
            }

            $payment_plan = PaymentPlan::create([
                "invoice_id" => request()->invoiceId,
                "installment_due_dates" => request()->installmentDueDates,
                "amt_per_installment" => request()->amtPerInstallment,
                "no_of_installments" => request()->noOfInstallments,
                "outstanding_amt" => request()->outstandingAmt,
            ]);

            if ($payment_plan) {
                $installments = [];
                for ($i = 0; $i < (int) request()->noOfInstallments; $i++) {
                    $installment = (object) [];
                    $installment->date = request()->installmentDueDates[$i]['date'];
                    $installment->amount = request()->amtPerInstallment[$i]['amount'];
                    $installments[] = $installment;
                }
                $invoice = Invoice::with('patient:id,first_name,last_name,email')->where('id', request()->invoiceId)->first();
                $details = [
                    'firstName' => $invoice->patient->first_name,
                    'lastName' => $invoice->patient->last_name,
                    'invoiceId' => $invoice->invoice_id,
                    'noOfInstallments' => request()->noOfInstallments,
                    'outstandingAmount' => request()->outstandingAmt,
                    'installments' => $installments
                ];
                Mail::to($invoice->patient->email)->send(new SendPaymentPlan($details));
                return response()
                    ->json(
                        [
                            "status" => "SUCCESS",
                            "payload" => 'Payment Plan created successfully',
                        ]
                    );
            }

            return $this->customFailResponseWithPayload("Payment plan was not created");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function payment_plan_reminder()
    {
        try {
            $date = \Carbon\Carbon::now()->format('Y-m-d');
            $all_plans = PaymentPlan::all();
            foreach ($all_plans as $plan) {
                for ($i = 0; $i < $plan->no_of_installments; $i++) {
                    if ($date == $plan->installment_due_dates[$i]['date']) {
                        $invoice = Invoice::with('patient:id,first_name,last_name,email')->where('id',$plan->invoice_id)->first();
                        $details = [
                            'firstName' => $invoice->patient->first_name,
                            'lastName' => $invoice->patient->last_name,
                            'invoiceId' => $invoice->invoice_id,
                            'amount' => $plan->amt_per_installment[$i]['amount'],
                        ];
                        Mail::to($invoice->patient->email)->send(new PaymentPlanReminder($details));
                    }
                }
            }
            return $this->customSuccessResponseWithPayload('Payment Plan Reminder Sent');
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }
}
