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
            <h4 class="account-content__title mb-48 text-capitalize">Enter Your OTP</h4>




        @if(session('error'))
    <div class="alert alert-danger" id="errorMessage">{{ session('error') }}</div>
@endif
<div id="ajaxSuccessMessage" class="alert alert-success d-none"></div>
<div id="ajaxErrorMessage" class="alert alert-danger d-none"></div>
        {{-- <form action="{{ route('verify.otp') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="otp">OTP</label>
                <input type="text" name="otp" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Verify</button>
        </form> --}}




    <form id="verifyOtpForm">

    @csrf
    <div class="row gy-4">
<div id="ajaxMessage" class="mt-2 alert d-none"></div>

        <div class="col-12">
            <label for="otp" class="form-label mb-2 font-18 font-heading fw-600">OTP</label>
            <div class="position-relative">
                <input type="otp" name="otp" class="common-input common-input--bg common-input--withIcon" placeholder="Enter Your OTP" required>
                <span class="input-icon"><img src="assets/images/icons/envelope-icon.svg" alt=""></span>
            </div>
        </div>


        <div class="col-12 text-center mb-3">
            <div id="timer" style="color: red; font-weight: bold;"></div>
            <button type="button" id="resendOtpBtn" class="btn btn-main btn-lg w-100 pill" style="display: none;">Resend OTP</button>
        </div>


        <div class="col-12">
            <button type="submit" id="verifyOtpBtn" class="btn btn-main btn-lg w-100 pill">Verify</button>
        </div>







        </div>
    </div>
</form>

            </div>
    </div>
</section>
@endsection
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

<!-- Include Toaster System -->
@include('front.includes.toaster')

<script>

  jQuery(document).ready(function ($) {
let timerInterval;

// Get expiry time from server
const otpExpiresAt = "{{ session('otp_expires') ? \Carbon\Carbon::parse(session('otp_expires'))->format('Y-m-d H:i:s') : '' }}";
const now = new Date().getTime();
let duration = 120; // Default 2 minutes

if (otpExpiresAt) {
    const expiry = new Date(otpExpiresAt).getTime();
    duration = Math.floor((expiry - now) / 1000);
}

function startTimer(seconds) {
    let time = seconds;

    timerInterval = setInterval(() => {
        if (time <= 0) {
            clearInterval(timerInterval);
            $('#timer').text("OTP expired.");
            $('#resendOtpBtn').show();
            $('#verifyOtpBtn').hide();
        } else {
            $('#timer').text(`Time left: ${time}s`);
            time--;
        }
    }, 1000);
}

// Initial run
startTimer(Math.max(0, duration)); // Use max to ensure non-negative duration

$('#resendOtpBtn').click(function () {
    // Show loading toaster
    let loadingToast = null;
    if (window.toaster) {
        loadingToast = window.toaster.loading('Resending OTP...');
    } else {
        $('#ajaxMessage').removeClass('d-none alert-danger').addClass('alert-info').text('Resending OTP...');
    }
    
    $.ajax({
        url: "{{ route('resend.otp') }}",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
            if (window.toaster && loadingToast) {
                window.toaster.hide(loadingToast);
            } else {
                $('#ajaxMessage').removeClass('alert-info');
            }
            
            if (response.success) {
                if (window.toaster) {
                    window.toaster.success(response.message || 'OTP resent successfully!');
                } else {
                    $('#ajaxMessage').removeClass('d-none alert-danger').addClass('alert-success').text(response.message || 'OTP resent successfully!');
                }
                
                // Reset buttons and timer
                $('#resendOtpBtn').hide();
                $('#verifyOtpBtn').show();
                clearInterval(timerInterval);
                startTimer(120); // restart timer to 2 minutes
            } else {
                if (window.toaster) {
                    window.toaster.error(response.message || 'Failed to resend OTP.');
                } else {
                    $('#ajaxMessage').removeClass('d-none alert-success').addClass('alert-danger').text(response.message || 'Failed to resend OTP.');
                }
            }
        },
        error: function (xhr) {
            if (window.toaster && loadingToast) {
                window.toaster.hide(loadingToast);
            } else {
                $('#ajaxMessage').removeClass('alert-info');
            }
            
            let errorMessage = 'Failed to resend OTP. Please try again.';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            if (window.toaster) {
                window.toaster.error(errorMessage);
            } else {
                $('#ajaxMessage').removeClass('d-none alert-success').addClass('alert-danger').text(errorMessage);
            }
        }
    });
});

$('#verifyOtpBtn').click(function (e) {
    e.preventDefault();

    // Show loading toaster
    let loadingToast = null;
    if (window.toaster) {
        loadingToast = window.toaster.loading('Verifying OTP...');
    } else {
        $('#ajaxMessage').removeClass('d-none alert-danger').addClass('alert-info').text('Verifying OTP...');
    }

    var formData = $('#verifyOtpForm').serialize();

    $.ajax({
        url: "{{ route('verify.otp') }}",
        type: "POST",
        data: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function (response) {
            if (window.toaster && loadingToast) {
                window.toaster.hide(loadingToast);
            } else {
                $('#ajaxMessage').removeClass('alert-info');
            }
            
            if (response.success) {
                if (window.toaster) {
                    window.toaster.success(response.message || 'Account created successfully! Redirecting to login...', 3000);
                } else {
                    $('#ajaxMessage').removeClass('d-none alert-danger').addClass('alert-success').text(response.message || 'Account created successfully! Redirecting to login...');
                }
                setTimeout(() => {
                    window.location.href = response.redirect || "/login";
                }, 3000);
            } else {
                if (window.toaster) {
                    window.toaster.error(response.message || 'Invalid OTP. Please try again.');
                } else {
                    $('#ajaxMessage').removeClass('d-none alert-success').addClass('alert-danger').text(response.message || 'Invalid OTP. Please try again.');
                }
            }
        },
        error: function (xhr) {
            if (window.toaster && loadingToast) {
                window.toaster.hide(loadingToast);
            } else {
                $('#ajaxMessage').removeClass('alert-info');
            }
            
            let errorMessage = 'An error occurred while verifying OTP.';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            if (window.toaster) {
                window.toaster.error(errorMessage);
            } else {
                $('#ajaxMessage').removeClass('d-none alert-success').addClass('alert-danger').text(errorMessage);
            }
        }
    });
});

});
</script>

