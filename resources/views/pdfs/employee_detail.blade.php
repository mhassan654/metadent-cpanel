<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Details</title>
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
                            </div>
                        </td>
                    </tr>
                </table>
                <div>
                    <table>
                        <tr>
                            <td>
                                <p><b>Full Name :</b> {{ $employee[0]?->first_name }} {{ $employee[0]?->maiden_name }}
                                    {{ $employee[0]?->last_name }} </p>
                                <p><b>Email :</b> {{ $employee[0]?->email }} </p>
                                <p><b>Phonenumber : </b> {{ $employee[0]?->phone }}</p>
                                <p><b>City : </b> {{ $employee[0]?->city?->city }}</p>
                                <p><b>Date of Birth :</b> {{ $employee[0]?->date_of_birth }}</p>
                                <p><b>Hire Date : </b> {{ $employee[0]?->hire_date }}</p>
                                <p><b>Duty Type :</b> {{ $employee[0]?->dutyType?->name }}</p>
                                <p><b>Basic Salary :</b> {{ $employee[0]?->basic_salary }}</p>
                                <p><b>Employee Type :</b> {{ $employee[0]?->employeeType?->type }}</p>
                                <p><b>Bank Ban Number :</b> {{ $employee[0]?->bank_ban_number }}</p>
                                <p><b>Bank Account Number :</b> {{ $employee[0]?->account_number }}</p>
                                <p><b>Medical Allowance :</b> {{ $employee[0]?->medical }}</p>
                                <p><b>Education Institution :</b> {{ $employee[0]?->edu_awarding_institution }}</p>
                                <p><b>Class of Degree : </b> {{ $employee[0]?->edu_class_of_award }}</p>
                                <p><b>Emergency Person Relation :</b> {{ $employee[0]?->emergency_relationship }}</p>
                                <p><b>Emergency Person Address :</b> {{ $employee[0]?->emergency_address }}</p>
                            </td>

                            <td>
                                <p><b>Department :</b>
                                    {{ $employee[0]?->department?->department }}</p>
                                <p><b>Position :</b> {{ $employee[0]?->position?->name }}</p>
                                <p><b>Country :</b> {{ $employee[0]?->country?->country }}</p>
                                <p><b>Reporting To: </b> {{ $employee[0]?->reportingTo?->name }}</p>
                                <p><b>Gender :</b> {{ $employee[0]?->gender }}</p>
                                <p><b>Martial Status : </b> {{ $employee[0]?->marital_status }}</p>
                                <p><b>Gross Salaray :</b> {{ $employee[0]?->gross_salary }}</p>
                                <p><b>Bank name :</b> {{ $employee[0]?->bank_name }}</p>
                                <p><b>Tin Number :</b> {{ $employee[0]?->tin_number }}</p>
                                <p><b>Transport Allowance :</b> {{ $employee[0]?->transport_allowance }}</p>
                                <p><b>Monthly Working Hours :</b> {{ $employee[0]?->monthly_working_hours }}</p>
                                <p><b>Education Award : </b> {{ $employee[0]?->edu_award }}</p>
                                <p><b>Graduation Date :</b> {{ $employee[0]?->edu_awarding_date }}</p>
                                <p><b>Emergency Person Name :</b> {{ $employee[0]?->emergency_person_name }}</p>
                                <p><b>Emergency Person Phone :</b> {{ $employee[0]?->emergency_phone }}</p>
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
