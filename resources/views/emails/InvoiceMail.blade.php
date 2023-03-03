@php
    use Illuminate\Support\Facades\Session;
    $grandTotal = Session::get('grandTotal');
    $subTotal = Session::get('invoiceSubtotal');
@endphp

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
    <style media="all">
        @font-face {
            font-family: 'Roboto';
            src: url("{{ asset('fonts/Roboto-Regular.ttf') }}") format("truetype");
            font-weight: normal;
            font-style: normal;
        }
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
            font-weight: 700;
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
{{--    <img loading="lazy"  src="https://via.placeholder.com/468x60?text=Project+Dental+Soft" height="40" style="display:inline-block;">--}}
    <div style="background: rgb(255, 255, 255);padding: 1.5rem; border-bottom:1px solid #d1e0e0;">
        <table>
            <tr>
                <td>
                        <img loading="lazy"  src="https://via.placeholder.com/468x60?text=Project+Dental+Soft" height="40" style="display:inline-block;">
{{--                    <h3>DENTAL SOFT</h3>--}}
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="strong"><h3 style="font-size: 1.2rem; color:#FF782E;">DENTAL SOFT - Payment Reminder</h3></td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td class="text-dark small">{{ __('UGANDA') }}</td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td class=" small">
                    <span class="text-dark">{{  __('Email') }}:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ __('dentalsoft@projectcode.ug') }}</td>
{{--                <td class="text-dark text-right small">--}}
{{--                    <span class="text-dark small">{{ __('INVOICE ID  ') }}:</span>&nbsp;&nbsp;--}}
{{--                    <span class="gry-color strong">2379563457</span></td>--}}
            </tr>
            <tr>
                <td class="text-dark small">{{  __('Phone') }}:&nbsp;&nbsp;&nbsp; +(256) - 7239 7853</td>
                <td class=" text-right small">
                    <span class="text-dark small">{{ __('INVOICE DATE') }}:</span>
                    <span class="gry-color strong">{{ date('d-m-Y') }}</span>
                </td>
            </tr>
        </table>

    </div>

    <div style="padding: 1.5rem;padding-bottom: 0">
        <table>
            <tr><td class="strong small gry2-color">{{ __('Bill to') }}:</td></tr>

            <tr><td class="gry-color strong">{{ __('Name') }}: {{ $patient->first_name }} {{ $patient->last_name }}</td></tr>
            <tr><td class="gry-color small">{{ __('Address') }}: {{ $patient->address }}, {{ $patient->city }}, {{ $patient->country }}</td></tr>
            <tr><td class="gry-color small">{{ __('Email') }}: &nbsp;&nbsp;&nbsp; {{ $patient->email }}</td></tr>
            <tr><td class="gry-color small">{{ __('Phone') }}: &nbsp;&nbsp;{{ $patient->home_phone }}</td></tr>
        </table>
    </div>

    <div style="padding: 1.5rem;">
        <table class="padding text-left small border-bottom">
            <thead>
            <tr class="brand-color" style="background: rgb(255,120,46);">
                <th width="20%">{{ __('TREATMENT(s)') }}</th>
                <th width="20%">{{ __('PRICE(s)') }}</th>
                <th width="auto">{{ __('INVOICE NO.') }}</th>
                <th width="15%">{{ __('INSURANCE') }}</th>
                {{-- <th width="15%">{{ __('COST') }}</th> --}}
                <th width="auto" class="text-right">{{ __('TOTAL') }}</th>
            </tr>
            </thead>
            <tbody class="strong">
            @foreach ($invoice as $key => $invoiceDetail)
                @if ($invoiceDetail != null)
                    <tr class="">
                        <td>
                            @php
                                $treatments =$invoiceDetails->treatments;
                                 $totalServices = count($treatments);
                            @endphp
                            <ul>
                                @foreach($treatments as $service)
                                <li class="gry-color">
                                    {{ $service->treatment}}
                                </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            @php
                                $prices = explode(',', $invoiceDetail->prices);
                                //  $totalServices = count($services);
                            @endphp
                            <ul>
                                @foreach($prices as $key => $price)
                                <li class="gry-color">
                                    {{ number_format($price)}}
                                </li>
                                @endforeach
                            </ul>
                        </td>

                        <td class="gry-color currency" >{{$invoiceDetail->invoice_id}}</td>
                        </td>
                        {{-- <td class="gry-color">{{ $totalServices }}</td> --}}
                        <td class="gry-color currency">
                            @php
                              $total = $invoiceDetails->balance_due;
                               $InvoiceSubtoal = number_format($total);
                            @endphp
                           $ {{$InvoiceSubtoal}}
                        </td>

                        {{-- <td class="gry-color text-right currency">$ {{ number_format($totalServices)}}</td> --}}

                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

    <div style="padding:0 1.5rem;">
        <table style="width: 40%;margin-left:auto;" class="text-right sm-padding small strong">
            <tbody>
            <tr>
                <th class="gry2-color text-left">{{ __('Sub Total') }}</th>
                <td class="gry-color currency">

                   $ {{number_format($subTotal)}}
                </td>
            </tr>
            <tr class="border-bottom">
                <th class="gry2-color text-left">{{ __('Total Tax') }}</th>
                <td class="gry-color currency">18</td>
            </tr>
            <tr>
                <th class="text-left strong gry2-color">{{ __('Grand Total') }}</th>
                <td class="gry-color currency">
                    $ {{number_format($grandTotal)}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
