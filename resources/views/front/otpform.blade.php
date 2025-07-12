{{-- @php die('OTP Form View Loaded'); @endphp --}}

@extends('front.includes.container')
@section('content')



<!-- ================================== Account Page Start =========================== -->
<section class="account d-flex">
    <img src="assets/images/thumbs/account-img.png" alt="" class="account__img">
    <div class="account__left d-md-flex d-none flx-align section-bg position-relative z-index-1 overflow-hidden">
        <img src="assets/images/shapes/pattern-curve-seven.png" alt="" class="position-absolute end-0 top-0 z-index--1 h-100">
        <div class="account-thumb">
            <img src="assets/images/thumbs/banner-img.png" alt="">
            <div class="statistics animation bg-main text-center">
                <h5 class="statistics__amount text-white">50k</h5>
                <span class="statistics__text text-white font-14">Customers</span>
            </div>
        </div>
    </div>
    <div class="account__right padding-t-120 flx-align">

        <div class="dark-light-mode">
             <!-- Light Dark Mode -->
 <div class="theme-switch-wrapper position-relative">
    <label class="theme-switch" for="checkbox">
        <input type="checkbox" class="d-none" id="checkbox">
        <span class="slider text-black header-right__button white-version">
            <img src="assets/images/icons/sun.svg" alt="">
        </span>
        <span class="slider text-black header-right__button dark-version">
            <img src="assets/images/icons/moon.svg" alt="">
        </span>
    </label>
</div>
        </div>

        <div class="account-content">
            <a href="index.html" class="logo mb-64">
                <img src="assets/images/logo/slidesbuy.png" alt="Logo" class="white-version">
                <img src="assets/images/logo/slidesbuy.png" alt="" class="dark-version">
            </a>
            <h4 class="account-content__title mb-48 text-capitalize">Create A Free Account</h4>



   
        <h2>Enter OTP</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- <form action="{{ route('verify.otp') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="otp">OTP</label>
                <input type="text" name="otp" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Verify</button>
        </form> --}}




    <form method="POST" action="{{ route('verify.otp') }}">

    @csrf
    <div class="row gy-4">
        

        <div class="col-12">
            <label for="otp" class="form-label mb-2 font-18 font-heading fw-600">OTP</label>
            <div class="position-relative">
                <input type="otp" name="otp" class="common-input common-input--bg common-input--withIcon" placeholder="Enter Your OTP" required>
                <span class="input-icon"><img src="assets/images/icons/envelope-icon.svg" alt=""></span>
            </div>
        </div>
        <div class="col-12 text-center mb-3">
            <div id="timer" style="color: red; font-weight: bold;"></div>
            <button type="button" id="resendOtpBtn" class="btn btn-link" style="display: none;">Resend OTP</button>
        </div>


        <div class="col-12">
            <button type="submit" class="btn btn-main btn-lg w-100 pill">Verify</button>
        </div>




       
        
        </div>
    </div>
</form>

            </div>
    </div>
</section>
@endsection
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script>
  jQuery(document).ready(function ($) {
        let duration = 60;
        let timerInterval;

        function startTimer(seconds) {
            let time = seconds;

            timerInterval = setInterval(function () {
                if (time <= 0) {
                    clearInterval(timerInterval);
                    $('#timer').text("OTP expired.");
                    $('#resendOtpBtn').show();
                } else {
                    $('#timer').text(`Time left: ${time}s`);
                    time--;
                }
            }, 1000);
        }

        startTimer(duration);

        $('#resendOtpBtn').click(function () {
            $(this).text("Resending...").prop("disabled", true);

            $.ajax({
                url: "{{ route('resend.otp') }}",
                method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}' 
                    },
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        $('#resendOtpBtn').hide().text("Resend OTP").prop("disabled", false);
                        startTimer(duration);
                    } else {
                        alert(response.message);
                        $('#resendOtpBtn').text("Resend OTP").prop("disabled", false);
                    }
                },
                error: function () {
                    alert("Something went wrong. Try again.");
                    $('#resendOtpBtn').text("Resend OTP").prop("disabled", false);
                }
            });
        });
    });
    </script>