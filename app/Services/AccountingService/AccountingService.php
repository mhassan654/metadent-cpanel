<?php
/**
 **Created by MUWONGE HASSAN on 06/06/2022
 *Github: https://github.com/mhassan654
 *LinkedIn: https://www.linkedin.com/in/hassan-muwonge-4a4592144
 *email: hassansaava@gmail.com
 *phone: +256704348792
 *website: https://muwongehassan.com
 */

namespace App\Services\AccountingService;

use App\Models\Invoice;
use App\Models\Treatment;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AccountingService
{
    /**
     * Method getUserSessionId // get session id from boekhouden
     *
     * @return void
     */
    public static function getUserSessionId()
    {
        $SoapBaseUrl = "https://soap.e-boekhouden.nl/soap.asmx?WSDL";
        $Username = "Muwonge"; //boekhouden account username
        $SecurityCode1 = "ac6a652f219ee07546cdc3454fd084dd"; //boekhouden account security code one
        $SecurityCode2 = "9EDFFF08-BF96-4D1D-8C56-95EED601DA39"; // boekhouden account security code 2

        try {
            $client = new \SoapClient($SoapBaseUrl);

            // open session and get sessionID
            $params = [
                "Username" => $Username,
                "SecurityCode1" => $SecurityCode1,
                "SecurityCode2" => $SecurityCode2,
            ];

            $response = $client->__soapCall("OpenSession", [$params]);

            self::checkforerror($response, "OpenSessionResult");

            return $response->OpenSessionResult->SessionID;

        } catch (SoapFault $soapFault) {
            return $soapFault;
        }
    }

    /**
     * Method addMutatie
     * This function adds/posts transactions data to the accounting api.
     * @return void
     */
    public static function addMutatie($invoiceId)
    {
        $SoapBaseUrl = "https://soap.e-boekhouden.nl/soap.asmx?WSDL";
        $SecurityCode2 = "9EDFFF08-BF96-4D1D-8C56-95EED601DA39";
        $session_id = trim(json_encode(self::getUserSessionId(), true), '"');
        $datum = Carbon::createFromTimestamp('1601735792.198956', 'Europe/Amsterdam')->format('Y-m-d\TH:i:s.uP');

        $invoice = Invoice::with('patient')->find($invoiceId);

        $services = [];
        foreach ($invoice->services as $service) {
            $services[] = Treatment::find($service);
        }
        $invoice->services = $services;

        $amountIncl = $invoice->balance_due; // initial invoice amount
        $amountExcVat = $invoice->balance_due; // invoice amount excluding vat tax.
        $invoice_number = $invoice->invoice_id; // invoice number from invoice details
        $invoice_id = $invoice->id; // invoice id from invoice details
        $vat_perc = 21.0; // vat tax percentage

        $amount_with_vat = $amountExcVat * $vat_perc / 100; // amount including vat

        $amount_inc_vat = $amount_with_vat + $amountIncl; // new amount including vat

        try {
            $client = new \SoapClient($SoapBaseUrl);

            // open session and get sessionID 0709862763

            // $treatment_params['MutatieRegels'] = array(
            //         // 'cMutatieRegel' => array(),
            // );
            $treatment_params =[];

            foreach ($invoice->services as $service) {

                $treatment_params[]['cMutatieRegel'] = array(
                    "BedragInvoer" => 1000.0,
                    "BedragExclBTW" => 1000.0,
                    "BedragBTW" => 210,
                    "BedragInclBTW" => 1210.0,
                    "BTWCode" => 'HOOG_VERK_21',
                    "BTWPercentage" => $vat_perc,
                    "TegenrekeningCode" => 8000,
                    "KostenplaatsID" => 12,
                );
            }


            // print_r($treatment_params);

            $params = [
                "SessionID" => $session_id,
                "SecurityCode2" => $SecurityCode2,
                "oMut" => [
                    "MutatieNr" => $invoice_id,
                    "Soort" => 'FactuurVerstuurd',
                    "Datum" => $datum,
                    "Rekening" => 1300,
                    "RelatieCode" => 4321,
                    "Factuurnummer" => Str::random(7),
                    "Boekstuk" => 'foedere certo',
                    "Omschrijving" => $invoice->internal_notes,
                    "Betalingstermijn" => 'et carcere',
                    "Betalingskenmerk" => 'iovis rapidum iaculata',
                    "InExBTW" => 'EX',
                    "MutatieRegels"=>  $treatment_params,


                    // "MutatieRegels" =>[

                    //     "cMutatieRegel" =>[
                    //         "BedragInvoer" => 1000.0 ,
                    //         "BedragExclBTW" =>  1000.0,
                    //         "BedragBTW" =>  210,
                    //         "BedragInclBTW" =>1210.0,
                    //         "BTWCode" => 'HOOG_VERK_21',
                    //         "BTWPercentage" => $vat_perc,
                    //         "TegenrekeningCode" => 8000,
                    //         "KostenplaatsID" => 12,
                    //     ],
                    // ]
                ],

            ];

            $response = $client->__soapCall("AddMutatie", [$params]);

            // print_r($params);

            self::checkforerror($response, "AddMutatieResult");

            // print_r($response);

            return $response->AddMutatieResult->Mutatienummer;

        } catch (SoapFault $soapFault) {
            return $soapFault;
        }
    }

    // standard error handling
    public static function checkforerror($rawresponse, $sub)
    {
        $errorMsg = $rawresponse->$sub->ErrorMsg;
        $LastErrorCode = isset($errorMsg->LastErrorCode) ? $errorMsg->LastErrorCode : '';
        $LastErrorDescription = isset($errorMsg->LastErrorDescription) ?
        $errorMsg->LastErrorDescription : '';
        if ($LastErrorCode != '') {
            echo '<strong>Er is een fout opgetreden:</strong><br>';
            echo $LastErrorCode . ': ' . $LastErrorDescription;
            exit;
        }
    }

}
