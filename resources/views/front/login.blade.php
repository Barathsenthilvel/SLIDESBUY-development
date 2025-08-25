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

  .password-container {
    position: relative;
    margin-bottom: 0.5rem;
  }

  button.password-toggle {
    position: absolute !important;
    right: 12px !important;
    top: 36% !important;
    transform: translateY(-50%) !important;
    color: white !important;
    cursor: pointer !important;
    font-size: 16px !important;
    transition: all 0.3s ease !important;
    z-index: 999 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    width: 30px !important;
    height: 30px !important;
    padding: 0 !important;
    line-height: 1 !important;
    /* background: rgba(0, 0, 0, 0.3) !important; */
    border: none !important;
    border-radius: 4px !important;
  }


  button.password-toggle i {
    font-size: 14px !important;
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

  .logo {
    text-align: center;
    margin-bottom: 1rem;
    display: flex;
    justify-content: center;
  }

  .logo img {
    height: 40px;
    filter: brightness(0) invert(1);
  }

  .login-link {
    text-align: center;
    margin-top: 1rem;
  }

  .login-link a {
    color: #93c5fd;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
  }

  .login-link a:hover {
    color: #60a5fa;
    text-decoration: underline;
  }

  .checkbox-container {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    color: white;
  }

  .checkbox-container input[type="checkbox"] {
    margin-right: 0.5rem;
    transform: scale(1.2);
  }

  .checkbox-container label {
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.9rem;
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

  <!-- Register Form -->
  <div id="registerForm">
    <h2 class="title">Create Account</h2>

    <form id="registerFormElement" action="{{ route('user.register') }}" method="POST">
    @csrf

      <div class="password-container">
        <input type="text" name="name" id="name" class="form-input" placeholder="Full Name" required>
               <div class="error-message" id="name-error"></div>
        </div>

      <div class="password-container">
        <input type="email" name="email" id="email" class="form-input" placeholder="Email Address" required>
             <div class="error-message" id="email-error"></div>
        </div>

      <div class="password-container">
        <input type="password" name="password" id="password" class="form-input" placeholder="Password" required autocomplete="new-password">
        <button type="button" class="password-toggle" onclick="togglePassword('password')">
          <i class="fas fa-eye"></i>
        </button>
            <div class="error-message" id="password-error"></div>
        </div>

      <div class="password-container">
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" placeholder="Confirm Password" required autocomplete="new-password">
        <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">
          <i class="fas fa-eye"></i>
        </button>
            <div class="error-message" id="password_confirmation-error"></div>
        </div>

      <div class="checkbox-container">
        <input type="checkbox" name="agree" id="agree" required>
        <label for="agree">I agree to the terms & conditions</label>
            <div class="error-message" id="agree-error"></div>
        </div>

      <button type="submit" class="auth-btn" id="submitBtn">Create Account</button>
    </form>
    <div class="login-link">
      <p class="text-white">Already have an account? <a href="{{ route('login.form') }}">Login</a></p>
    </div>
        </div>
    </div>

<canvas class="canvas"></canvas>

<script>
  console.log('=== SCRIPT LOADED SUCCESSFULLY ===');

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

  // Test function for debugging
  function testFormSubmission() {
    console.log('=== TESTING FORM SUBMISSION ===');

    if (typeof $ === 'undefined') {
      console.error('jQuery is not loaded!');
      return;
    }

    const form = $('#registerFormElement');
    if (form.length === 0) {
      console.error('Form not found!');
      return;
    }

    console.log('Form found:', form);
    console.log('Form action:', form.attr('action'));

    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    console.log('CSRF token:', csrfToken);

    const formData = new FormData(form[0]);
    for (let [key, value] of formData.entries()) {
      console.log(key + ': ' + value);
    }

    console.log('Testing AJAX call...');
    $.ajax({
      url: form.attr('action'),
      method: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      headers: {
        'X-CSRF-TOKEN': csrfToken
      },
      success: function(response) {
        console.log('SUCCESS:', response);
      },
      error: function(xhr, status, error) {
        console.log('ERROR:', xhr);
        console.log('Status:', status);
        console.log('Error:', error);
        console.log('Response Text:', xhr.responseText);
      }
    });
  }

  // GSAP Animations
  gsap.from(".auth-container", { opacity: 0, y: 50, duration: 1, ease: "power3.out" });
  gsap.from(".form-input", { opacity: 0, x: 0, duration: 0.8, stagger: 0.2, delay: 0.5 });
  gsap.from(".auth-btn", { opacity: 0, scale: 0.8, duration: 0.8, delay: 0.9 });
  gsap.from(".title", { opacity: 0, y: -20, duration: 0.8, delay: 0.2 });

  // Password Toggle Function
  function togglePassword(fieldId) {
    const passwordInput = document.getElementById(fieldId);
    const toggleBtn = passwordInput.nextElementSibling;

    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      toggleBtn.innerHTML = '<i class="fas fa-eye-slash"></i>'; // Change to eye-slash
    } else {
      passwordInput.type = 'password';
      toggleBtn.innerHTML = '<i class="fas fa-eye"></i>'; // Change to eye
    }
  }

  // Email validation function
  function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

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
    // Clear all error messages
    function clearErrors() {
        $('.error-message').removeClass('show').text('');
        $('.common-input').removeClass('input-error input-success');
    }

    // Show error message for a specific field
    function showError(fieldName, message) {
        $(`#${fieldName}-error`).text(message).addClass('show');
        $(`input[name="${fieldName}"]`).addClass('input-error').removeClass('input-success');
    }

    // Show success state for a field
    function showSuccess(fieldName) {
        $(`#${fieldName}-error`).removeClass('show').text('');
        $(`input[name="${fieldName}"]`).addClass('input-success').removeClass('input-error');
    }

    // Client-side validation
    function validateForm() {
        clearErrors();
        let isValid = true;

        let name = $('input[name="name"]').val().trim();
        let email = $('input[name="email"]').val().trim();
        let password = $('input[name="password"]').val();
        let confirmPassword = $('input[name="password_confirmation"]').val();
        let agree = $('#agree').is(':checked');

        // Name validation
        if (name === '') {
            showError('name', 'Full name is required.');
            isValid = false;
        } else {
            showSuccess('name');
        }

        // Email validation
        if (email === '') {
            showError('email', 'Email is required.');
            isValid = false;
        } else if (!validateEmail(email)) {
            showError('email', 'Enter a valid email.');
            isValid = false;
        } else {
            showSuccess('email');
        }

        // Password validation
        if (password.length < 6) {
            showError('password', 'Password must be at least 6 characters.');
            isValid = false;
        } else {
            showSuccess('password');
        }

        // Confirm password validation
        if (confirmPassword !== password) {
            showError('password_confirmation', 'Passwords do not match.');
            isValid = false;
        } else if (confirmPassword !== '') {
            showSuccess('password_confirmation');
        }

        // Terms & conditions checkbox
        if (!agree) {
            showError('agree', 'You must agree to terms.');
            isValid = false;
        } else {
            showSuccess('agree');
        }

        return isValid;
    }

    // Handle form submission
    $('#registerFormElement').on('submit', function(e) {
            e.preventDefault();

      console.log('Form submitted!');
      console.log('Form action:', $(this).attr('action'));
      console.log('CSRF token:', $('meta[name="csrf-token"]').attr('content'));

        if (!validateForm()) {
        console.log('Form validation failed');
            return false;
        }

      console.log('Form validation passed, proceeding with submission');

        const submitBtn = $('#submitBtn');
        const originalText = submitBtn.text();

        // Show loading state
        submitBtn.prop('disabled', true).text('Creating Account...');

        // Show loading toaster
                        if (window.toaster) {
            window.toaster.loading('Creating your account and sending OTP...');
        }

        // Prepare form data
        const formData = new FormData(this);

      // Log form data for debugging
      for (let [key, value] of formData.entries()) {
        console.log(key + ': ' + value);
      }

        // Make AJAX request
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
          console.log('Success response:', response);

                // Hide loading toaster
                if (window.toaster) {
                    window.toaster.hide();
                }

                if (response.success) {
                    // Show success message
                    if (window.toaster) {
                        window.toaster.success(response.message || 'Account created successfully! Welcome email sent to your inbox.');
                    }

                    // Redirect to OTP form after a short delay
                    setTimeout(function() {
                        window.location.href = '/otp-form';
                    }, 2000);
                } else {
                    // Show error message
                    if (window.toaster) {
                        window.toaster.error(response.message || 'Something went wrong. Please try again.');
                    }

                    // Reset button
                    submitBtn.prop('disabled', false).text(originalText);
                }
            },
        error: function(xhr, status, error) {
          console.log('Error response:', xhr);
          console.log('Error status:', status);
          console.log('Error message:', error);

                // Hide loading toaster
                if (window.toaster) {
                    window.toaster.hide();
                }

                // Reset button
                submitBtn.prop('disabled', false).text(originalText);

                if (xhr.status === 422) {
                    // Validation errors
                    const errors = xhr.responseJSON.errors;
                    clearErrors();

                    $.each(errors, function(field, messages) {
                        showError(field, messages[0]);
                    });

                    if (window.toaster) {
                        window.toaster.error('Please fix the validation errors.');
                    }
                } else if (xhr.status === 500) {
                    // Server error
                    if (window.toaster) {
                        window.toaster.error('Server error. Please try again later.');
                    }
          } else if (xhr.status === 419) {
            // CSRF token mismatch
            if (window.toaster) {
              window.toaster.error('Session expired. Please refresh the page and try again.');
                    }
                } else {
                    // Other errors
                    const response = xhr.responseJSON;
                    if (response && response.message) {
                        if (window.toaster) {
                            window.toaster.error(response.message);
                        }
                    } else {
                        if (window.toaster) {
                            window.toaster.error('Something went wrong. Please try again.');
                        }
                    }
                }
            }
    });
    });

    // Real-time validation on input change
    $('input[name="name"], input[name="email"], input[name="password"], input[name="password_confirmation"]').on('input', function() {
        const fieldName = $(this).attr('name');
        const value = $(this).val().trim();

        // Clear error when user starts typing
        if (value !== '') {
            $(`#${fieldName}-error`).removeClass('show').text('');
            $(this).removeClass('input-error');
        }
    });

    // Real-time validation for checkbox
    $('#agree').on('change', function() {
        if ($(this).is(':checked')) {
            $('#agree-error').removeClass('show').text('');
        }
    });
});
</script>

@endsection
