
@extends('front.includes.container')
@section('content')
<form method="POST" action="{{ route('login.submit') }}">
    @csrf

    <div class="col-12">
        <label for="email" class="form-label mb-2 font-18 font-heading fw-600">Email</label>
        <div class="position-relative">
            <input type="email" name="email" class="common-input common-input--bg common-input--withIcon" placeholder="you@example.com" required>
            <span class="input-icon"><img src="{{ asset('assets/images/icons/envelope-icon.svg') }}" alt=""></span>
        </div>
    </div>

    <div class="col-12">
        <label class="form-label mb-2 font-18 font-heading fw-600">Password</label>
        <div class="position-relative">
            <input type="password" name="password" class="common-input common-input--bg common-input--withIcon" placeholder="6+ characters, 1 Capital letter" required>
            <span class="input-icon"><img src="{{ asset('assets/images/icons/lock-icon.svg') }}" alt=""></span>
        </div>
    </div>

    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </div>
</form>



@endsection
