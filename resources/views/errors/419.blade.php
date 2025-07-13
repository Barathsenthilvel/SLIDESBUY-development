@extends('front.includes.container')
@section('content')
<div class="text-center mt-5">
    <h2>Session Expired</h2>
    <p>Your session has expired. Please log in or register again.</p>
    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
</div>
@endsection
