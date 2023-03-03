<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
    <style media="all">
        /* @font-face {
            font-family: 'Roboto';
            src: url("{{ asset('fonts/Roboto-Regular.ttf') }}") format("truetype");
            font-weight: normal;
            font-style: normal;
        } */
        *{
            margin: 0;
            padding: 0;
            line-height: 1.3;
            font-family: 'Roboto';
            color: #ffffff;
        }
        body{
            font-size: .875rem;
            background-color: white;
            border:1px solid #eceff4;
        }
        .gry-color *,
        .gry-color{
            color:#878f9c;
        }
        .gry2-color{
            color:#1a202c;
        }
        .brand-color{
            color:#ffffff;
            font-weight: 700;
            text-transform: uppercase;
        }
        .text-dark{
            color:#000000;
            font-weight: bold;
            /*text-transform: uppercase;*/
        }
        table{
            width: 100%;
        }
        table th{
            font-weight: normal;
        }
        table.padding th{
            padding: .5rem .7rem;
        }
        table.padding td{
            padding: .7rem;
        }
        table.sm-padding td{
            padding: .2rem .7rem;
        }
        li{
            list-style: none;
        }
        .border-bottom td,
        .border-bottom th{
            border-bottom:1px solid #eceff4;
        }
        .text-left{
            text-align:left;
        }
        .text-right{
            text-align:right;
        }
        .small{
            font-size: .85rem;
        }
        .currency{

        }
    </style>
</head>
<body>
<div>
    <div style="background: rgb(255, 255, 255);padding: 1.5rem; border-bottom:1px solid #e0ebeb">
        <table>
            <tr>
                <td>
                        {{-- <img loading="lazy"  src="{{get_facility_setting('app_logo')}}" height="40" style="display:inline-block;"> --}}
{{--                    <h3>DENTAL SOFT</h3>--}}
{{-- @php
print_r($data);
@endphp --}}
                </td>
            </tr>
        </table>

    </div>

    <div style="padding: 1.5rem;padding-bottom: 0">
        <table>
            {{-- <tr><td class="strong small gry2-color">{{ __('Bill to') }}:</td></tr>
            <tr><td class="gry-color strong">{{ __('Name') }}:&nbsp;&nbsp;&nbsp; {{ $patient->first_name }} {{ $invoiceDetails->last_name }}</td></tr>
            <tr><td class="gry-color small">{{ __('Address') }}:&nbsp;&nbsp;&nbsp; {{ $patient->address }}, {{ $patient->city }}, {{ $patient->country }}</td></tr>
            <tr><td class="gry-color small">{{ __('Email') }}:&nbsp;&nbsp;&nbsp; {{ $patient->email }}</td></tr>
            <tr><td class="gry-color small">{{ __('Phone') }}: &nbsp;&nbsp;&nbsp;{{ $patient->home_phone }}</td></tr> --}}
        </table>
    </div>
    <div class="col-sm-6">
        <div class="card  card-box">
            <div class="card-head">
                <header>BASIC TABLE</header>
                <div class="tools">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body ">
                <div class="table-scrollable">
                    <table class="table">
                        <thead>
                            <tr>
                                <th># No.</th>
                                {{-- <th>Code</th> --}}
                                <th>Treatment</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['treatments'] as $treatment)
                            <tr>
                                <td>{{$treatment->id}}</td>
                                {{-- <td>{{$treatment->code}}</td> --}}
                                <td>{{$treatment->treatment}}</td>
                                <td>{{$treatment->price}}</td>
                                <td>@mdo</td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- <div style="padding: 1.5rem;">
        <table class="padding text-left small border-bottom">
            <thead>
            <tr class="brand-color" style="background: rgb(255,120,46);">
                <th width="20%">{{ __('TREATMENT') }}</th>
                <th width="20%">{{ __('INVOICE NUMBER') }}</th>
                <th width="auto">{{ __('INSURANCE') }}</th>
                <th width="15%">{{ __('QUANTITY') }}</th>
                <th width="15%">{{ __('COST') }}</th>
                <th width="auto" class="text-right">{{ __('TOTAL') }}</th>
            </tr>
            </thead>
            <tbody class="strong">
                    <tr class="">
                        <td>
                            @php
                                $treatments =$invoiceDetails->treatments;
                                 $totalServices = count($treatments);
                                // echo print$services;
                            @endphp
                            <ul>
                                @foreach($treatments as $service)
                                <li class="gry-color">
                                    {{ $service->treatment}}
                                </li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="gry-color currency" >{{$invoiceDetails->invoice_id}}</td>
                        <td class="gry-color">
                            {{ $invoiceDetails->invoice_type  == 2 ? 'Private' : 'Public' }}
                        </td>
                        <td class="gry-color">{{ $totalServices }}</td>
                        <td class="gry-color currency">
                            @php
                              $total = $invoiceDetails->balance_due;
                               $subTotal2 = number_format($total);
                            @endphp
                            $ {{ $subTotal2 }}
                        </td>
                        <td class="gry-color text-right currency">{{ number_format(($total) * ($totalServices))}}</td>
                    </tr>
            </tbody>
        </table>
    </div> --}}


</div>
</body>
</html>
