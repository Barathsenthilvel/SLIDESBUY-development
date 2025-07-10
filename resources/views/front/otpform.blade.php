{{-- @php die('OTP Form View Loaded'); @endphp --}}

@extends('front.includes.container')
@section('content')
    <div class="container">
        <h2>Enter OTP</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('verify.otp') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="otp">OTP</label>
                <input type="text" name="otp" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Verify</button>
        </form>
    </div>
@endsection
