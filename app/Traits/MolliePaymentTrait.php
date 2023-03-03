<?php

namespace App\Traits;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\InvoiceTransaction;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Validator;

trait MolliePaymentTrait
{
    /**
     * Method preparePayment
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function preparePayment($data)
    {
        // dd($data);


        $amount = $data->paidAmount;
        $paidamount = number_format($amount, 2, '.', '');
        $InvoiceId = Invoice::where('id', $data->invoiceId)->first();

        try {
            if ($paidamount) {

                $payment = Mollie::api()->payments->create([
                    "amount" => [
                        "currency" => "EUR",
                        "value" => strval($paidamount),
                    ],
                    "method" => 'creditcard',
                    "locale" => "en_US",
                    "description" => "Patient Bill Invoice ID {$InvoiceId->invoice_id}, {$InvoiceId->patient->first_name} {$InvoiceId->patient->last_name}  ",

                    // online
                    "redirectUrl" => 'ttps://projectdental.nl/staging-backend/billing/payment/success',

                    // use this in production
                    // "webhookUrl" => 'ttps://projectdental.nl/staging-backend/api/v2/transactions/webhooks/mollie',
                    "webhookUrl" => 'https://7fff-102-222-234-97.eu.ngrok.io/api/v2/transactions/webhooks/mollie',
                    "metadata" => [
                        "invoice_id" => " {$InvoiceId->invoice_id} ",
                        "Patient_id" => " {$InvoiceId->patient->id} ",
                    ],
                ]);

                $transactions_data = Mollie::api()->payments()->get($payment->id);

                $Invoice = Invoice::where('id', $data->invoiceId)->first();

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



            } else {

                $response = array();
                $response['status'] = 0;
                $response['msg'] = "Sorry, Failed";
                $response['statusCode'] = 400;
            }
            return $payment->getCheckoutUrl();

        } catch (\Mollie\Api\Exceptions\ApiException $e) {

            if ($e->getField() == 'webhookUrl' && $e->getCode() == '422') {
                return $e->getMessage();
            }

            return $e->getMessage();

        } catch (\Exception $e) {

            return $e->getMessage();

        }
    }
}