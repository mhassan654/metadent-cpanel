<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\InvoiceTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mollie\Laravel\Facades\Mollie;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionsController extends Controller
{
    /**
     * Method preparePayment
     *
     * @param Request $request [explicite description]
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function preparePayment(Request $request,$data=null)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'invoiceId' => 'required',
             'patientId' => 'nullable',
            'paidAmount' => 'required',
            'paymentMode' => 'nullable',
            'paymentOption' => 'nullable',
             'paymentDescription' => 'nullable',
        ]);

        if ($validator->fails()) {
            $response = array();
            $response['status'] = 0;
            $response['msg'] = "The request could not be understood by the server due to malformed syntax";
            $response['statuscode'] = 400;
            $response['data'] = $validator->errors();
        }

        $amount = $request->paidAmount;
        $paidamount = number_format($amount, 2, '.', '');
        $InvoiceId = Invoice::where('id', $request->invoiceId)->first();

//        try {
            if ($paidamount) {
                // check if paid amount does not exceed the invoice due balance.
                if ($paidamount <= $InvoiceId->balance_due) {

                    if (request()->paymentOption === 'mollie' && request()->paymentMethod === 'creditcard') {

                        $payment = Mollie::api()->payments->create([
                            "amount" => [
                                "currency" => "EUR",
                                "value" => strval($paidamount),
                            ],
                            "method" => 'creditcard',
                            "locale" => "en_US",
                            "description" => "Patient Bill Invoice ID {$InvoiceId->invoice_id}, {$InvoiceId->patient->first_name} {$InvoiceId->patient->last_name}  ",

                            // online
                            "redirectUrl" => env('MOLLIE_REDIRECT_URI'),

                            // use this in production
                            "webhookUrl" => env('MOLLIE_WEBHOOK_URL'),
                            "metadata" => [
                                "invoice_id" => " {$InvoiceId->invoice_id} ",
                                "Patient_id" => " {$InvoiceId->patient->id} ",
                            ],
                        ]);

                        $transactions_data = Mollie::api()->payments()->get($payment->id);

                        $Invoice = Invoice::where('id', $request->invoiceId)->first();

                        $new_transactions = new InvoiceTransaction;
                        $new_transactions->transaction_id = $transactions_data->id;
                        $new_transactions->invoice_id = $Invoice->id;
                        $new_transactions->patient_id = $InvoiceId->patient->id;
                        $new_transactions->invoice_number = $Invoice->invoice_id;
                        $new_transactions->resource = $transactions_data->resource;
                        $new_transactions->amount = $transactions_data->amount->value;
                        $new_transactions->currency = $transactions_data->amount->currency;
                        $new_transactions->method = $transactions_data->method;
                        $new_transactions->status = $transactions_data->status;
                        $new_transactions->paid_at = $transactions_data->paidAt;
                        $new_transactions->failed_at = $transactions_data->failedAt;
                        $new_transactions->due_date = $transactions_data->dueDate;
                        $new_transactions->profile_id = $transactions_data->profileId;
                        $new_transactions->locale = $transactions_data->locale;
                        $new_transactions->sequence_type = $transactions_data->sequenceType;
                        $new_transactions->payment_date = $transactions_data->createdAt;
                        $new_transactions->expires_at = $transactions_data->expiresAt;
                        $new_transactions->mode = $transactions_data->mode;
                        $new_transactions->description = $transactions_data->description;
                        $new_transactions->canceled_at = $transactions_data->canceledAt;
                        $new_transactions->failed_at = $transactions_data->failedAt;
                        $new_transactions->save();

                        if ($new_transactions):
                            $Invoice->update([
                                "payment_mode" => request()->paymentMode
                            ]);
                        endif;

                        $response = array();
                        $response['status'] = 1;
                        $response['msg'] = "success";
                        $response['statusCode'] = 200;
                        $response['url'] = $payment->getCheckoutUrl();
                        return response()->json($response);
                    }elseif (request()->paymentMethod === 'cash'){
                        $Invoice = Invoice::where('id', $request->invoiceId)->first();
//                        dd($InvoiceId->patient->id);

                        $new_transactions = new InvoiceTransaction;
                        $new_transactions->transaction_id = 'tr_'.Str::random(10);
                        $new_transactions->invoice_id = $Invoice->id;
                        $new_transactions->patient_id = $InvoiceId->patient->id;
                        $new_transactions->invoice_number = $Invoice->invoice_id;
                        $new_transactions->resource = 'cash';
                        $new_transactions->amount = request()->paidAmount;
                        $new_transactions->currency = request()->currency;
                        $new_transactions->method = request()->paymentMethod;
                        $new_transactions->status = 'paid';
                        $new_transactions->paid_at = Carbon::now()->format('d-m-Y-H-i-s');
//                        $new_transactions->due_date = $transactions_data->dueDate;
//                        $new_transactions->profile_id = $transactions_data->profileId;
//                        $new_transactions->locale = $transactions_data->locale;
//                        $new_transactions->sequence_type = $transactions_data->sequenceType;
                        $new_transactions->payment_date = Carbon::now()->format('d-m-Y-H-i-s');
                        $new_transactions->mode = 'test';
                        $new_transactions->description = request()->description;
                        $new_transactions->save();

                        // update invoice
                        $Invoice->description = $request->description;
                        $Invoice->due_date = $request->due_date;
                        $Invoice->save();

                        return $this->customSuccessResponseWithPayload('Payment successfully done');
                    }

                } else {
                    return $this->customFailResponseWithPayload('Total amount exceeds the total balance due');
                }

            } else {

                $response = array();
                $response['status'] = 0;
                $response['msg'] = "Sorry, Failed";
                $response['statusCode'] = 400;
                return response()->json($response);
            }


//        } catch (\Mollie\Api\Exceptions\ApiException$e) {
//
//            if ($e->getField() == 'webhookUrl' && $e->getCode() == '422') {
//                return $this->customFailResponseWithPayload(
//                    'Mollie Webhook will work on live server or you can try ngrok.
//                    It will not work on localhost', $e->getMessage());
//            }
//
//            return $this->customFailResponseWithPayload($e->getMessage());
//
//        } catch (\Exception$e) {
//
//            return $this->customFailResponseWithPayload($e->getMessage());
//
//        }
    }

    /*
     * After the customer has completed the transaction;
     * you can fetch, check and process the payment.
     * This logic typically goes into the controller handling the inbound webhook request.
     * See the webhook docs in /docs and on mollie.com for more information.
     */
    public function handleWebhookNotification(Request $request)
    {
        $payment = Mollie::api()->payments->get($request->id);
        $update_transaction = InvoiceTransaction::where('transaction_id', $payment->id)->first();
        if ($payment->status == 'paid') {



            $update_transaction->paid_at = $payment->paidAt;
            $update_transaction->tr_cardNumber = $payment->details->cardNumber;
            $update_transaction->tr_cardHolder = $payment->details->cardHolder;
            $update_transaction->tr_cardAudience = $payment->details->cardAudience;
            $update_transaction->tr_cardLabel = $payment->details->cardLabel;
            $update_transaction->tr_cardCountryCode = $payment->details->cardCountryCode;
            $update_transaction->tr_cardSecurity = $payment->details->cardSecurity;
            $update_transaction->tr_feeRegion = $payment->details->feeRegion;
            $update_transaction->status = $payment->status;
            $update_transaction->update();

            $this->balanceDueCalculator($update_transaction->invoice_id);
        } elseif ($payment->status == 'failed') {

            $update_transaction->failed_at = $payment->failedAt;
            $update_transaction->status = 'failed';
            $update_transaction->update();

        } elseif ($payment->status == 'canceled') {
            /*
             * The payment is cancelled.
             */
            $update_transaction->canceled_at = $payment->canceledAt;
            $update_transaction->status = 'canceled';
            $update_transaction->update();

        } elseif ($payment->status == 'expired') {

            echo $payment->id;
            $expired_transaction = InvoiceTransaction::where('transaction_id', $payment->id)->first();
            /*
             * The payment has expired
             */
            $expired_transaction->expired_at = $payment->expiredAt;
            $expired_transaction->status = 'expired';
            $expired_transaction->update();
        }

        return;

    }

    public function balanceDueCalculator($id)
    {

        $invoice = Invoice::where('id', $id)->first();

        $total_prices = array_sum(explode(',', $invoice->prices));

        $transactions = InvoiceTransaction::where('invoice_id', $invoice->id)->sum('amount');

        $balance_due = $total_prices - $transactions;

        if ($transactions < $total_prices) {
            $invoice->paidamount = $transactions;
            $invoice->balance_due = $balance_due;
            $invoice->update();
        }

        if ($transactions === $total_prices) {
            $invoice->paidamount = $transactions;
            $invoice->balance_due = $balance_due;
            $invoice->status = 1;
            $invoice->update();
        }

        return;
    }

    public function invoice_transactions()
    {
        try {
            return $this->customSuccessResponseWithPayload(
                InvoiceTransaction::where('invoice_id', request()->invoiceId)->get()
            );
        } catch (\Throwable$th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

    public function download_transaction_info($id)
    {
        try {
            $transaction = InvoiceTransaction::find($id);
            $transaction->patient = Patient::find($transaction->patient_id);
            $transaction->invoice = Invoice::find($transaction->invoice_id);
            $converted_transaction = [];
            $converted_transaction[] = $transaction;
            Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = Pdf::loadView('pdfs.transaction', compact('converted_transaction'));
            $transactionId = $transaction->transaction_id;
            return $pdf->stream("transaction_$transactionId.pdf");
        } catch (\Throwable $th) {
            return $this->customFailResponseWithPayload($th->getMessage());
        }
    }

}
