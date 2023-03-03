<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employees</title>
    <style>
        .text-danger strong {
            color: #FF782E;
        }

        .receipt-main {
            background: #ffffff none repeat scroll 0 0;
            /* border-bottom: 12px solid #333333; */
            /* border-top: 12px solid #9f181c; */
            margin-top: 50px;
            /* margin-bottom: 50px; */
            /* padding: 40px 30px !important; */
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
            text-align: left;
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
    <div>
        <div style=" float: left;"> <img class="img-responsive" alt="iamgurdeeposahan"
                src="{{ public_path('app-assets/images/logo/metadent-logo.png') }}"
                style="width: 71px; border-radius: 43px;"> </div>
        <div style="margin-left: 800px;">
            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                <div class="receipt-right">
                    <h5>{{ get_facility_setting('app_name') }}</h5>
                    <p>{{ get_facility_setting('facility_phone') }}<i class="fa fa-phone"></i></p>
                    <p>{{ get_facility_setting('facility_email') }}<i class="fa fa-envelope-o"></i></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div class="row">
                </div>

                <div style="margin-top: 5px">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Roles</th>
                                <th>Position</th>
                                <th>Department</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Reporting To</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td class="col-md-3">
                                        {{ !is_null($employee->first_name) ? $employee->first_name : '' }}
                                        {{ !is_null($employee->last_name) ? $employee?->last_name : '' }}</td>
                                    <td class="col-md-3">
                                        @foreach ($employee->roles as $role)
                                            <ul>
                                                <li>{{ $role->name }}</li>
                                            </ul>
                                        @endforeach
                                    </td>
                                    <td class="col-md-3">
                                        {{ !is_null($employee->position) ? $employee?->position->name : '' }}</td>
                                    <td class="col-md-3">
                                        {{ !is_null($employee->department) ? $employee?->department->department : '' }}
                                    </td>
                                    <td class="col-md-3">{{ !is_null($employee->city) ? $employee?->city->city : '' }}
                                    </td>
                                    <td class="col-md-3">{{ !is_null($employee->email) ? $employee?->email : '' }}</td>
                                    <td>{{ !is_null($employee->phone) ? $employee?->phone : '' }}</td>
                                    <td>{{ !is_null($employee->reportingTo) ? $employee?->reportingTo->name : '' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="receipt-header receipt-header-mid receipt-footer">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                                <p><b>Employees List</b> </p>
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
