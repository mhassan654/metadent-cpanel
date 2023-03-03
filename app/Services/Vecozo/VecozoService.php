<?php

namespace App\Services\Vecozo;

use Carbon\Carbon;

class VecozoService
{
    public function checkData($agb, $bsn, $date_of_birth, $post_code, $house_no)
    {
        $first_two_agb_num =  substr($agb, 0, 2);
        $last_six_agb_num =  substr($agb, -6);
        $reference_date = Carbon::now();

        // Start of vecozo soap execution
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://tst-api.vecozo.nl/acc/cov/vz801802/v1/soap11',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_POSTFIELDS => '
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://schemas.vecozo.nl/VZ801802/v1" 
                xmlns:mes="http://schemas.vecozo.nl/VZ801802/v1/messages" xmlns:typ="http://schemas.vecozo.nl/VZ801802/v1/types">
                    <soapenv:Header/>
                        <soapenv:Body>
                            <v1:Controleer>
                                <v1:request>
                                    <!--Optional:-->
                                    <mes:Zorgaanbieder>
                                    <typ:AGB-zorgverlenersoort>'.$first_two_agb_num.'</typ:AGB-zorgverlenersoort>
                                    <typ:AGB-nummer>'.$last_six_agb_num.'</typ:AGB-nummer>
                                    </mes:Zorgaanbieder>
                                    <mes:Zoekopdrachten>
                                    <!--1 to 20 repetitions:-->
                                    <typ:Zoekopdracht>
                                        <typ:Volgnummer></typ:Volgnummer>
                                        <typ:Geboortedatum>'.$date_of_birth.'</typ:Geboortedatum>
                                        <typ:Peildatum>'.$reference_date.'</typ:Peildatum>
                                        <!--Optional:-->
                                        <typ:Bsn>'.$bsn.'</typ:Bsn>
                                        <!--Optional:-->
                                        <typ:Verzekerdenummer></typ:Verzekerdenummer>
                                        <!--Optional:-->
                                        <typ:Postcode>'.$post_code.'</typ:Postcode>
                                        <!--Optional:-->
                                        <typ:ReferentieZorgaanbieder></typ:ReferentieZorgaanbieder>
                                        <!--Optional:-->
                                        <typ:Huisnummer>'.$house_no.'</typ:Huisnummer>
                                        <!--Optional:-->
                                        <typ:Huisnummertoevoeging></typ:Huisnummertoevoeging>
                                    </typ:Zoekopdracht>
                                    </mes:Zoekopdrachten>
                                </v1:request>
                            </v1:Controleer>
                        </soapenv:Body>
            </soapenv:Envelope>',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: text/xml; charset=utf-8',
                'SOAPAction: http://schemas.vecozo.nl/VZ801802/v1/Controleer'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        if (curl_error($curl)) {
            return curl_error($curl);
        }

        return $response;
        
    }
}
