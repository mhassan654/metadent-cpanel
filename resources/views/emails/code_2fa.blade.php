@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
{{ $code}}
@endcomponent
<div>
    <img src="{{ $qr_code }}">

    <!-- <img src="{{ $message->embedData($qr_code,'qrcode.png') }}"> -->
    <!-- <img src='{{ $message->embedData("data:image/svg+xml;base64,".base64_encode($qr_code), "qrcode.png") }}'> -->

    <!-- <img src="{!!$message->embedData(QrCode::format('png')->generate($qr_code), 'QrCode.png', 'image/png')!!}"> -->
</div>
Thanks,<br>
{{ config('app.name') }}
@endcomponent