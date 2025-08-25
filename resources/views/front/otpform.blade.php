@extends('front.includes.container')
@section('content')

<script src="https://cdn.tailwindcss.com?v=2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js?v=2"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js?v=2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js?v=2"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css?v=2">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
  .sale-offer { display: none; }

  body {
    margin: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #6b7280, #3b82f6);
    overflow: hidden;
    font-family: 'Arial', sans-serif;
  }

  .auth-container {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 450px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    overflow: hidden;
  }

  .auth-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);
    opacity: 0.5;
    z-index: 0;
  }

  .auth-container > * {
    position: relative;
    z-index: 1;
  }

  .form-input {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    outline: none;
    padding: 0.75rem;
    padding-right: 2.5rem;
    border-radius: 0.5rem;
    color: white;
    width: 100%;
    margin-bottom: 0.5rem;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-sizing: border-box;
  }

  .form-input:focus {
    transform: scale(1.02);
    box-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
  }

  .form-input::placeholder {
    color: rgba(255, 255, 255, 0.7);
  }

  .otp-container {
    position: relative;
    margin-bottom: 1rem;
  }

  .otp-input-group {
    display: flex;
    gap: 12px;
    justify-content: center;
    margin-bottom: 1rem;
  }

  .otp-digit {
    width: 50px;
    height: 60px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    color: white;
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  }

  .otp-digit:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 20px rgba(59, 130, 246, 0.4);
    transform: scale(1.05);
    background: rgba(255, 255, 255, 0.2);
  }

  .otp-digit.input-error {
    border-color: #fca5a5;
    box-shadow: 0 0 20px rgba(252, 165, 165, 0.4);
    background: rgba(252, 165, 165, 0.1);
  }

  .otp-digit.input-success {
    border-color: #86efac;
    box-shadow: 0 0 20px rgba(134, 239, 172, 0.4);
    background: rgba(134, 239, 172, 0.1);
  }

  .otp-digit::placeholder {
    color: rgba(255, 255, 255, 0.5);
    font-size: 16px;
  }

  .otp-digit:focus::placeholder {
    opacity: 0;
  }

  .otp-container .input-icon {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: rgba(255, 255, 255, 0.7);
    z-index: 2;
  }

  .form-input.input-error {
    border: 2px solid #fca5a5;
    box-shadow: 0 0 10px rgba(252, 165, 165, 0.5);
  }

  .form-input.input-success {
    border: 2px solid #86efac;
    box-shadow: 0 0 10px rgba(134, 239, 172, 0.5);
  }

  .auth-btn {
    background: linear-gradient(90deg, #3b82f6, #8b5cf6);
    color: white;
    padding: 0.75rem;
    border: none;
    border-radius: 0.5rem;
    width: 100%;
    cursor: pointer;
    font-weight: bold;
    transition: transform 0.3s ease;
    margin-bottom: 1rem;
  }

  .auth-btn:hover {
    transform: scale(1.05);
  }

  .auth-btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
  }

  .resend-btn {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    padding: 0.75rem;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 0.5rem;
    width: 100%;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s ease;
    margin-bottom: 1rem;
  }

  .resend-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: scale(1.02);
  }

  .resend-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none;
  }

  .canvas {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
  }

  .title {
    font-size: 2rem;
    font-weight: bold;
    color: white;
    text-align: center;
    margin-bottom: 1.5rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
  }

  .error-message {
    color: #fca5a5;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    margin-bottom: 0.5rem;
    text-align: left;
    min-height: 1.25rem;
    font-weight: 500;
    line-height: 1.4;
  }

  .success-message {
    color: #86efac;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    margin-bottom: 0.5rem;
    text-align: left;
    min-height: 1.25rem;
    font-weight: 500;
    line-height: 1.4;
  }

  .logo {
    text-align: center;
    margin-bottom: 1rem;
  }

  .logo img {
    height: 40px;
    filter: brightness(0) invert(1);
  }

  .timer {
    color: #fbbf24;
    font-size: 1rem;
    font-weight: bold;
    text-align: center;
    margin-bottom: 1rem;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
  }

  .back-link {
    text-align: center;
    margin-top: 1rem;
  }

  .back-link a {
    color: #93c5fd;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
  }

  .back-link a:hover {
    color: #60a5fa;
    text-decoration: underline;
  }

  /* Hide header and footer */
  header, footer, .header, .footer {
    display: none !important;
  }

  /* Hide mobile menu/sidebar completely */
  .sidebar, .mobile-menu, .side-menu, .offcanvas, .offcanvas-menu,
  .mobile-nav, .nav-sidebar, .side-overlay, .side-panel,
  [class*="sidebar"], [class*="mobile"], [class*="side-"] {
    display: none !important;
    visibility: hidden !important;
    opacity: 0 !important;
    transform: translateX(-100%) !important;
  }

  /* Hide any toggle buttons for mobile menu */
  .menu-toggle, .sidebar-toggle, .mobile-toggle, .hamburger,
  [class*="toggle"], [class*="menu"] {
    display: none !important;
  }
</style>

<div class="auth-container">
  <!-- Logo -->
  <div class="logo">
    <img src="{{ asset('assets/images/logo/slidesbuy.png') }}" alt="SLIDESBUY Logo">
  </div>

  <!-- OTP Form -->
  <div id="otpForm">
    <h2 class="title">Enter Your OTP</h2>

    @if(session('error'))
        <div class="error-message">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form id="verifyOtpForm">
        @csrf
        <div class="otp-container">
            <div class="otp-input-group">
                <input type="text" class="otp-digit" maxlength="1" data-index="0" inputmode="numeric" pattern="[0-9]*">
                <input type="text" class="otp-digit" maxlength="1" data-index="1" inputmode="numeric" pattern="[0-9]*">
                <input type="text" class="otp-digit" maxlength="1" data-index="2" inputmode="numeric" pattern="[0-9]*">
                <input type="text" class="otp-digit" maxlength="1" data-index="3" inputmode="numeric" pattern="[0-9]*">
                <input type="text" class="otp-digit" maxlength="1" data-index="4" inputmode="numeric" pattern="[0-9]*">
                <input type="text" class="otp-digit" maxlength="1" data-index="5" inputmode="numeric" pattern="[0-9]*">
            </div>
            <input type="hidden" name="otp" id="otp" required>
            <div class="error-message" id="otp-error"></div>
        </div>
        <div class="error-message" id="otp-error"></div>

        <div class="timer" id="timer">Time left: 120s</div>

        <button type="button" id="resendOtpBtn" class="resend-btn" style="display: none;">
            <i class="fas fa-redo"></i> Resend OTP
        </button>

        <button type="submit" id="verifyOtpBtn" class="auth-btn">
            <i class="fas fa-check"></i> Verify OTP
        </button>
    </form>

    <div class="back-link">
        <p class="text-white">Back to <a href="{{ route('login.form') }}">Login</a></p>
    </div>
  </div>
</div>

<canvas class="canvas"></canvas>

<script>
  console.log('=== OTP FORM SCRIPT LOADED SUCCESSFULLY ===');

  // Initialize Toaster
  if (typeof toastr !== 'undefined') {
    window.toaster = {
      success: function(message, duration = 3000) {
        toastr.success(message, '', { timeOut: duration });
      },
      error: function(message, duration = 5000) {
        toastr.error(message, '', { timeOut: duration });
      },
      loading: function(message) {
        toastr.info(message, '', { timeOut: 0, closeButton: true });
      },
      hide: function() {
        toastr.clear();
      }
    };
  } else {
    window.toaster = {
      success: function(message) { console.log('SUCCESS:', message); },
      error: function(message) { console.log('ERROR:', message); },
      loading: function(message) { console.log('LOADING:', message); },
      hide: function() { console.log('HIDE TOASTER'); }
    };
  }

  // GSAP Animations
  gsap.from(".auth-container", { opacity: 0, y: 50, duration: 1, ease: "power3.out" });
  gsap.from(".form-input", { opacity: 0, x: 0, duration: 0.8, stagger: 0.2, delay: 0.5 });
  gsap.from(".auth-btn", { opacity: 0, scale: 0.8, duration: 0.8, delay: 0.9 });
  gsap.from(".title", { opacity: 0, y: -20, duration: 0.8, delay: 0.2 });

  // Particle Animation
  const canvas = document.querySelector(".canvas");
  const ctx = canvas.getContext("2d");
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;

  let particles = [];
  class Particle {
    constructor() {
      this.x = Math.random() * canvas.width;
      this.y = Math.random() * canvas.height;
      this.size = Math.random() * 5 + 1;
      this.speedX = Math.random() * 1 - 0.5;
      this.speedY = Math.random() * 1 - 0.5;
    }
    update() {
      this.x += this.speedX;
      this.y += this.speedY;
      if (this.size > 0.2) this.size -= 0.1;
    }
    draw() {
      ctx.fillStyle = "rgba(255, 255, 255, 0.8)";
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
      ctx.fill();
    }
  }

  function init() {
    for (let i = 0; i < 50; i++) {
      particles.push(new Particle());
    }
  }

  function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    particles.forEach((particle, index) => {
      particle.update();
      particle.draw();
      if (particle.size <= 0.2) {
        particles.splice(index, 1);
        particles.push(new Particle());
      }
    });
    requestAnimationFrame(animate);
  }

  init();
  animate();

  window.addEventListener("resize", () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  });

  // jQuery Document Ready
  jQuery(document).ready(function ($) {
    let timerInterval;
    let timeLeft = 120; // 2 minutes

    // Get expiry time from server if available
    const otpExpiresAt = "{{ session('otp_expires') ? \Carbon\Carbon::parse(session('otp_expires'))->format('Y-m-d H:i:s') : '' }}";

    if (otpExpiresAt) {
        const expiry = new Date(otpExpiresAt).getTime();
        const now = new Date().getTime();
        timeLeft = Math.max(0, Math.floor((expiry - now) / 1000));
    }

    function startTimer(seconds) {
        timeLeft = seconds;

        timerInterval = setInterval(() => {
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                $('#timer').text("OTP expired").css('color', '#fca5a5');
                $('#resendOtpBtn').show();
                $('#verifyOtpBtn').hide();
            } else {
                $('#timer').text(`Time left: ${timeLeft}s`);
                timeLeft--;
            }
        }, 1000);
    }

    // Start timer initially
    startTimer(timeLeft);

    // Resend OTP functionality
    $('#resendOtpBtn').click(function () {
        const btn = $(this);
        const originalText = btn.html();

        // Show loading state
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Resending...');

        // Show loading toaster
        let loadingToast = null;
        if (window.toaster) {
            loadingToast = window.toaster.loading('Resending OTP...');
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
                }

                if (response.success) {
                    if (window.toaster) {
                        window.toaster.success(response.message || 'OTP resent successfully!');
                    }

                    // Reset timer and buttons
                    $('#resendOtpBtn').hide();
                    $('#verifyOtpBtn').show();
                    clearInterval(timerInterval);
                    startTimer(120);
                    $('#timer').css('color', '#fbbf24');
                } else {
                    if (window.toaster) {
                        window.toaster.error(response.message || 'Failed to resend OTP.');
                    }
                    btn.prop('disabled', false).html(originalText);
                }
            },
            error: function (xhr) {
                if (window.toaster && loadingToast) {
                    window.toaster.hide(loadingToast);
                }

                let errorMessage = 'Failed to resend OTP. Please try again.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                if (window.toaster) {
                    window.toaster.error(errorMessage);
                }
                btn.prop('disabled', false).html(originalText);
            }
        });
    });

    // Form validation function
    function validateOtpForm() {
        let isValid = true;
        const otpValue = $('#otp').val().trim();

        // Clear previous errors
        $('#otp-error').text('');
        $('#otp').removeClass('input-error input-success');

        // Check if OTP is empty
        if (otpValue === '') {
            $('#otp-error').text('OTP is required');
            $('#otp').addClass('input-error');
            isValid = false;
        }
        // Check if OTP is numeric only
        else if (!/^[0-9]+$/.test(otpValue)) {
            $('#otp-error').text('OTP must contain only numbers');
            $('#otp').addClass('input-error');
            isValid = false;
        }
        // Check OTP length (assuming 6 digits)
        else if (otpValue.length < 6) {
            $('#otp-error').text('OTP must be 6 digits');
            $('#otp').addClass('input-error');
            isValid = false;
        }
        // If valid, show success state
        else {
            $('#otp').addClass('input-success');
        }

        return isValid;
    }

    // Verify OTP functionality
    $('#verifyOtpForm').on('submit', function (e) {
        e.preventDefault();

        // Validate form first
        if (!validateOtpForm()) {
            return false;
        }

        const submitBtn = $('#verifyOtpBtn');
        const originalText = submitBtn.html();

        // Show loading state
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Verifying...');

        // Show loading toaster
        let loadingToast = null;
        if (window.toaster) {
            loadingToast = window.toaster.loading('Verifying OTP...');
        }

        const formData = $(this).serialize();

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
                }

                if (response.success) {
                    if (window.toaster) {
                        window.toaster.success('🎉 Account created successfully! Welcome email sent to your inbox. Redirecting to login...', 3000);
                    }

                    setTimeout(() => {
                        window.location.href = response.redirect || "{{ route('login.form') }}";
                    }, 3000);
                } else {
                    if (window.toaster) {
                        window.toaster.error(response.message || 'Invalid OTP. Please try again.');
                    }
                    submitBtn.prop('disabled', false).html(originalText);
                }
            },
            error: function (xhr) {
                if (window.toaster && loadingToast) {
                    window.toaster.hide(loadingToast);
                }

                let errorMessage = 'An error occurred while verifying OTP.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                if (window.toaster) {
                    window.toaster.error(errorMessage);
                }
                submitBtn.prop('disabled', false).html(originalText);
            }
        });
    });

    // Real-time validation
    $('.otp-digit').on('input', function() {
        const value = $(this).val().trim();
        const index = $(this).data('index');
        const otpInput = $('#otp');

        // Remove any non-numeric characters
        const numericValue = value.replace(/[^0-9]/g, '');
        if (value !== numericValue) {
            $(this).val(numericValue);
        }

        // Update the hidden input field
        const digits = $('.otp-digit').map(function() {
            return $(this).val();
        }).get();
        otpInput.val(digits.join(''));

        if (numericValue !== '') {
            $(this).removeClass('input-error').addClass('input-success');

            // Auto-focus to next input if available
            if (index < 5) {
                $(`.otp-digit[data-index="${index + 1}"]`).focus();
            }
        } else {
            $(this).removeClass('input-error input-success');
        }
    });

    // Handle backspace to go to previous input
    $('.otp-digit').on('keydown', function(e) {
        const index = $(this).data('index');

        if (e.key === 'Backspace' && $(this).val() === '' && index > 0) {
            e.preventDefault();
            $(`.otp-digit[data-index="${index - 1}"]`).focus();
        }
    });

    // Handle paste functionality for all digits
    $('.otp-digit').on('paste', function(e) {
        e.preventDefault();
        const pastedText = (e.originalEvent || e).clipboardData.getData('text/plain');
        const numericText = pastedText.replace(/[^0-9]/g, '').substring(0, 6);

        // Fill all input fields with pasted text
        $('.otp-digit').each(function(index) {
            if (index < numericText.length) {
                $(this).val(numericText[index]).addClass('input-success');
            } else {
                $(this).val('').removeClass('input-success input-error');
            }
        });

        // Update hidden input
        $('#otp').val(numericText);

        // Focus on the last filled input or first empty one
        if (numericText.length < 6) {
            $(`.otp-digit[data-index="${numericText.length}"]`).focus();
        }
    });

    // Auto-focus first input on page load
    $('.otp-digit[data-index="0"]').focus();

    // Prevent non-numeric input
    $('.otp-digit').on('keypress', function(e) {
        const charCode = (e.which) ? e.which : e.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            e.preventDefault();
            return false;
        }
    });
  });
</script>

@endsection

