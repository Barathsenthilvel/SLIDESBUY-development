@component('mail::message')

{{-- Logo --}}
<div style="text-align: center;">
    <img src="{{ asset('images/logo.png') }}" alt="Your Logo" width="150" style="margin-bottom: 20px;">
</div>

# Hello {{ $user->name }},

We received a request to reset your password.

@component('mail::button', ['url' => $resetUrl])
Reset Password
@endcomponent

If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('app.name') }}

@endcomponent
