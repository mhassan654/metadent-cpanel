@component('mail::message')
# Hello! You are receiving this email because we received a password reset request for your account.

This password reset link will expire in "10" minutes

If you did not request a password reset, no further action is required.

@component('mail::button', ['url' => $path.'?token='.$token.'&'.'email='.$email])
Click to Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
