
@extends('front.includes.container')
@section('content')
<div class="container mt-5">
    <h4>Enter OTP</h4>
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
{{-- @dd('sdsdsd'); --}}
    <form action="{{ route('otp.verify') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="otp">Enter the OTP sent to your email</label>
            <input type="text" name="otp" class="form-control" maxlength="6" required>
        </div>
        <button type="submit" class="btn btn-primary">Verify OTP</button>
    </form>
</div>
@endsection
