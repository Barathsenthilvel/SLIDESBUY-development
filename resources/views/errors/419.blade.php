@extends('front.includes.container')
@section('content')
<div class="text-center mt-5">
    <h2>Session Expired</h2>
    <p>Your session has expired. Please log in or register again.</p>
    <a href="{{ route('login.form') }}" class="btn btn-main pill">Login</a> &nbsp;
    <a href="{{ route('front.loginBlade') }}" class="btn btn-main pill">Register</a>
</div>
@endsection
