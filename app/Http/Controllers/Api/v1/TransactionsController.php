<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mollie\Laravel\Facades\Mollie;
use App\Models\Invoice;

class TransactionsController extends Controller
{

    public function __construct()
    {
        // $this->middleware("auth:api");
    }

    public function preparePayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'invoiceId' => ['required'],
            'patientId' => ['required'],
            'serviceType' => ['required'],
        ]);

        if($validator->fails()) {
            $response=array();
            $response['status']=0;
            $response['msg']="The request could not be understood by the server due to malformed syntax";
            $response['statuscode']=400;
            $response['data']=$validator->errors();
        }

        $amount = $request->paidAmount;
        $paidamount = number_format($amount, 2, '.', '');

        if($paidamount)
        {
            $InvoiceId = Invoice::where('id',$request->invoiceId)->first();

            $InvoicePayment = Mollie::api()->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => (string)$paidamount, // You must send the correct number of decimals, thus we enforce the use of strings
                ],
                "method" => 'creditcard',
                "locale" => "en_US",
                "description" => "Patient Bill Invoice ID {$InvoiceId->invoice_id}, {$InvoiceId->patient->first_name}  ",

                // local
                // "redirectUrl" => 'http://localhost:8080/billing/payment/success/',

                // online
                "redirectUrl" => 'https://testing.projectdental.nl/billing/payment/success',

                // use this on localhost server
                // "webhookUrl" =>  'https://eafd-102-222-235-79.ngrok.io/api/v1/transactions/webhooks/mollie',

                // use this in production
                "webhookUrl" =>  'https://projectdental.nl/staging-backend/api/v1/transactions/webhooks/mollie',
                "metadata" => [
                    "invoice_id" => " {$InvoiceId->invoice_id} ",
                    "Patient_name" => " {$InvoiceId->patient->first_name} ",
                ],
            ]);

            $InvoiceTransaction = Invoice::where('id',$request->invoiceId)->first();
            $InvoiceTransaction->service_type = request()->serviceType;
            $InvoiceTransaction->services = request()->services;
            $InvoiceTransaction->prices = request()->prices;
            $InvoiceTransaction->invoice_type = request()->invoiceType;
            $InvoiceTransaction->paidamount = request()->paidAmount;
            $InvoiceTransaction->payment_method = 'Mollie';
            $InvoiceTransaction->balance_due = request()->balanceDue;
            $InvoiceTransaction->due_date = request()->dateDue;
            $InvoiceTransaction->payment_status = '';
            $InvoiceTransaction->payment_id = $InvoicePayment->id;
            $InvoiceTransaction->payment_date = date('Y-m-d H:i:s');;
            $InvoiceTransaction->status = 0;
            $InvoiceTransaction->save();

            $InvoicePayment = Mollie::api()->payments()->get($InvoicePayment->id);

            $response=array();
            $response['status']=1;
            $response['msg']="success";
            $response['statusCode']=200;
            $response['url']=$InvoicePayment->getCheckoutUrl();
            $response['details']=$InvoicePayment;
        }else{

            $response=array();
            $response['status']=0;
            $response['msg']="Sorry, Failed";
            $response['statusCode']=400;

        }
           return response()->json($response);
    }

    /**
     * After the customer has completed the transaction;
     * you can fetch, check and process the payment.
     * This logic typically goes into the controller handling the inbound webhook request.
     * See the webhook docs in /docs and on mollie.com for more information.
     */
    public function handleWebhookNotification(Request $request)
    {
        if (! $request->has('id')) {
            return;
        }

        $payment = Mollie::api()->payments->get($request->id);
        $statusOfPayment='';

        if ($payment->isPaid()) {
            /*
             * The payment is paid and isn't refunded or charged back.
             * At this point you'd probably want to start the process of delivering the product to the customer.
             */
               $statusOfPayment='paid';

        } elseif ($payment->isOpen()) {
            /*
             * The payment is open.
             */
             $statusOfPayment='open';
        } elseif ($payment->isPending()) {
            /*
             * The payment is pending.
             */
             $statusOfPayment='pending';

        } elseif ($payment->isFailed()) {
            /*
             * The payment has failed.
             */
            $statusOfPayment='failed';

        } elseif ($payment->isCanceled()) {
            /*
             * The payment has been canceled.
             */

              $statusOfPayment='expired';

        };

        $InvoiceTransaction = Invoice::where('payment_id',$request->id)->first();
        // $InvoiceTransaction->payment_status = $statusOfPayment;
        // $InvoiceTransaction->status = 1;
        // $InvoiceTransaction->save();

        $InvoiceTransaction->update([
            "payment_status" => $statusOfPayment,
            "status" => 1,
        ]);

        return response()->json( 'Payment received.');

    }

    /**
     * After the customer has completed the transaction;
     * you can fetch, check and process the payment.
     * This logic typically goes into the controller handling the inbound webhook request.
     * See the webhook docs in /docs and on mollie.com for more information.
     */
    // public function handleWebhookNotification(Request $request) {
    //     // $paymentId = $request->input('id');
    //     // $payment = Mollie::api()->payments->get($paymentId);

    //     // if ($payment->isPaid())
    //     // {
    //         // echo 'Payment received.';
    //         // Do your thing ...
    //     // }
    //     return 'Payment received.';
    // }
}
