@component('mail::message')
# Introduction
<ul>
    @foreach($invoices as $key => $invoice)

        <li>{{$invoice->services}}</li>

    @endforeach
</ul>
{{-- {{ $invoice['services'] }}--}}
{{--{{ $invoice['prices'] }}--}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
