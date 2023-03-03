@component('mail::message')
{{-- <h6>{{ $email['subject'] }}</h6><br> --}}
 
 
@component('mail::button', ['url' => $url], ['color' => 'orange'])
View message
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent