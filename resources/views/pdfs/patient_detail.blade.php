<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Details</title>
    <style>
        .text-danger strong {
            color: #FF782E;
        }

        .receipt-main {
            background: #ffffff none repeat scroll 0 0;
            /* border-bottom: 12px solid #333333; */
            /* border-top: 12px solid #9f181c; */
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 30px !important;
            position: relative;
            box-shadow: 0 1px 21px #acacac;
            color: #333333;
            font-family: open sans;
        }

        .receipt-main p {
            color: #333333;
            font-family: open sans;
            line-height: 1.42857;
        }

        .receipt-footer h1 {
            font-size: 15px;
            font-weight: 400 !important;
            margin: 0 !important;
        }

        /* .receipt-main::after {
    background: #414143 none repeat scroll 0 0;
    content: "";
    height: 5px;
    left: 0;
    position: absolute;
    right: 0;
    top: -13px;
} */
        .receipt-main thead {
            background: #FF782E none repeat scroll 0 0;
        }

        .receipt-main thead th {
            color: #fff;
        }

        .receipt-right h5 {
            font-size: 16px;
            font-weight: bold;
            margin: 0 0 7px 0;
        }

        .receipt-right p {
            font-size: 12px;
            margin: 0px;
        }

        .receipt-right p i {
            text-align: center;
            width: 18px;
        }

        .receipt-main td {
            padding: 9px 20px !important;
        }

        .receipt-main th {
            padding: 13px 20px !important;
        }

        .receipt-main td {
            font-size: 13px;
            font-weight: initial !important;
        }

        .receipt-main td p:last-child {
            margin: 0;
            padding: 0;
        }

        .receipt-main td h2 {
            font-size: 20px;
            font-weight: 900;
            margin: 0;
            text-transform: uppercase;
        }

        .receipt-header-mid .receipt-left h1 {
            font-weight: 100;
            margin: 34px 0 0;
            text-align: right;
            text-transform: uppercase;
        }

        .receipt-header-mid {
            margin: 24px 0;
            overflow: hidden;
        }

        .receipt-header {
            display: flex;
        }

        table {
            width: 100%;
        }

        table th {
            font-weight: normal;
        }

        table.padding th {
            padding: .5rem .7rem;
        }

        table.padding td {
            padding: .7rem;
        }

        table.sm-padding td {
            padding: .2rem .7rem;
        }

        li {
            list-style: none;
        }

        .border-bottom td,
        .border-bottom th {
            border-bottom: 1px solid #eceff4;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .small {
            font-size: .85rem;
        }

        #container {
            background-color: #dcdcdc;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">

            <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <table>
                    <tr>
                        <td>
                            <img class="img-responsive" alt="iamgurdeeposahan"
                                src="{{ public_path('app-assets/images/logo/metadent-logo.png') }}"
                                style="width: 71px; border-radius: 43px;">
                        </td>
                        <td></td>
                        <td></td>
                        <td><img style="width: 71px; border-radius: 43px;"
                                src="{{ public_path('app-assets/images/logo/placeholder.png') }}" alt=""></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="receipt-right">
                                <h5>{{ get_facility_setting('app_name') }}</h5>
                                <p>{{ get_facility_setting('facility_phone') }}<i class="fa fa-phone"></i></p>
                                <p>{{ get_facility_setting('facility_email') }}<i class="fa fa-envelope-o"></i></p>
                                <br>
                                <p>Patinet Number:<i class="fa fa-location-arrow"></i>
                                    {{ $patient[0]?->unique_identifier }}</p>
                            </div>
                        </td>
                    </tr>
                </table>
                <div>
                    <table>
                        <tr>
                            <td>
                                <p><b>Full Name :</b> {{ $patient[0]?->first_name }} {{ $patient[0]?->middle_name }}
                                    {{ $patient[0]?->last_name }} </p>
                                <p><b>Patient Phone : </b> {{ $patient[0]?->patient_phone }}</p>
                                <p><b>Date of Birth :</b> {{ $patient[0]?->birth_date }}</p>
                                <p><b>Home Phone : </b> {{ $patient[0]?->home_phone }}</p>
                                <p><b>BSN : </b> {{ $patient[0]?->BSN }}</p>
                                <p><b>Home Address : </b> {{ $patient[0]?->home_address }}</p>
                                <p><b>Region : </b> {{ $patient[0]?->region }}</p>
                                <p><b>City : </b> {{ $patient[0]?->city }}</p>
                                <p><b>Nationality : </b> {{ $patient[0]?->nationality }}</p>
                                <p><b>Guardian Phone : </b> {{ $patient[0]?->guardian_phone }}</p>
                                <p><b>Guardian Address : </b> {{ $patient[0]?->guardian_address }}</p>
                                <p><b>Next of Kin Email : </b> {{ $patient[0]?->nok_email }}</p>
                                <p><b>Referee Name : </b> {{ $patient[0]?->referred_by }}</p>
                                <p><b>Refree Phone : </b> {{ $patient[0]?->referree_phone }}</p>
                                <p><b>First Treatment Date : </b> {{ $patient[0]?->date_of_first_treatment }}</p>
                                <p><b>Modified At : </b>
                                    {{ \Carbon\Carbon::parse($patient[0]?->updated_at)->format('d-m-Y') }}</p>
                            </td>

                            <td>
                                <p><b>Email :</b>
                                    {{ $patient[0]?->email }}</p>
                                <p><b>Gender :</b> {{ $patient[0]?->gender }}</p>
                                <p><b>Age :</b>
                                    {{ \Carbon\Carbon::parse($patient[0]?->birth_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days') }}
                                </p>
                                <p><b>Martial Status : </b> {{ $patient[0]?->marital_status }}</p>
                                <p><b>Citizen Service Number : </b> {{ $patient[0]?->citizen_service_number }}</p>
                                <p><b>Language: </b> {{ $patient[0]?->language }}</p>
                                <p><b>State : </b> {{ $patient[0]?->state }}</p>
                                <p><b>Province : </b> {{ $patient[0]?->province }}</p>
                                <p><b>Country :</b> {{ $patient[0]?->country }}</p>
                                <p><b>Guardian Name : </b> {{ $patient[0]?->guardian_name }}</p>
                                <p><b>Guardian Email : </b> {{ $patient[0]?->guardian_email }}</p>
                                <p><b>Next of Kin name : </b> {{ $patient[0]?->nok_name }}</p>
                                <p><b>Next of Kin Phone : </b> {{ $patient[0]?->nok_phone_number }}</p>
                                <p><b>Referee Email : </b> {{ $patient[0]?->referree_email }}</p>
                                <p><b>Last Treatment Date : </b> {{ $patient[0]?->date_of_last_treatment }}</p>
                                <p><b>Registration Date : </b>
                                    {{ \Carbon\Carbon::parse($patient[0]?->created_at)->format('d-m-Y') }}</p>

                            </td>
                        </tr>
                    </table>

                </div>

                <div class="row">
                    <div class="receipt-header receipt-header-mid receipt-footer">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                                <h5 style="color: rgb(140, 140, 140);">Thank you very much!!!</h5>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h1>Signature</h1>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
