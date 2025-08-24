
@extends('front.includes.container')
@section('content')

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .sale-offer {
    display: none;
}
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
    max-width: 400px;
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

  .password-toggle {
    position: absolute !important;
    right: 12px !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    /* background: rgba(0, 0, 0, 0.3) !important; */
    border: none !important;
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
    border-radius: 4px !important;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3) !important;
  }

  .password-toggle:hover {
    background: rgba(0, 0, 0, 0.5) !important;
    color: #60a5fa !important;
    transform: translateY(-50%) scale(1.1) !important;
  }

  .password-toggle i {
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
  .forgot-password {
    text-align: center;
    margin: 1rem 0;
  }
  .forgot-password a {
    color: #93c5fd;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
  }
  .forgot-password a:hover {
    color: #60a5fa;
    text-decoration: underline;
  }
  .error-message {
    color: #fca5a5;
    font-size: 0.875rem;
    margin-top: 0.25rem;
    margin-bottom: 0.5rem;
    text-align: left;
    min-height: 1.25rem;
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
  .signup-link {
    text-align: center;
    margin-top: 1rem;
  }
  .signup-link a {
    color: #93c5fd;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
  }
  .signup-link a:hover {
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

  /* Ensure password icons are always visible */
  .password-container {
    position: relative !important;
    margin-bottom: 0.5rem !important;
    overflow: visible !important;
  }

  /* Override any conflicting styles */
  .password-container * {
    overflow: visible !important;
  }
    </style>

<div class="auth-container">
  <!-- Logo -->
  <div class="logo">
    <img src="{{ asset('assets/images/logo/slidesbuy.png') }}" alt="SLIDESBUY Logo">
</div>

  <!-- Login Form -->
  <div id="loginForm">
    <h2 class="title">Welcome Back</h2>

    <form id="loginFormElement" action="{{ route('login.submit') }}" method="POST">
    @csrf

      <div class="password-container">
        <input type="email" name="email" id="email" class="form-input" placeholder="Email Address" required>
        <div class="error-message" id="email-error"></div>
    </div>

      <div class="password-container">
        <input type="password" name="password" id="password" class="form-input" placeholder="Password" required autocomplete="current-password">
        <button type="button" class="password-toggle" onclick="togglePassword()">
          <i class="fas fa-eye"></i>
        </button>
        <div class="error-message" id="password-error"></div>
    </div>

      <div class="forgot-password">
        <a href="{{ route('password.request') }}">Forgot Password?</a>
    </div>

      <button type="submit" class="auth-btn" id="loginBtn">Login to Your Journey</button>
    </form>

    <div class="signup-link">
      <p class="text-white">Don't have an account? <a href="{{ route('front.loginBlade') }}">Sign Up</a></p>
    </div>
            </div>
        </div>

<canvas class="canvas"></canvas>

<script>
  // GSAP Animations
  gsap.from(".auth-container", { opacity: 0, y: 50, duration: 1, ease: "power3.out" });
  gsap.from(".form-input", { opacity: 0, x: 0, duration: 0.8, stagger: 0.2, delay: 0.5 });
  gsap.from(".auth-btn", { opacity: 0, scale: 0.8, duration: 0.8, delay: 0.9 });
  gsap.from(".title", { opacity: 0, y: -20, duration: 0.8, delay: 0.2 });

  // Password Toggle Function
  function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleBtn = document.querySelector('.password-toggle');

    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      toggleBtn.innerHTML = '<i class="fas fa-eye-slash"></i>'; // Change to eye-slash
    } else {
      passwordInput.type = 'password';
      toggleBtn.innerHTML = '<i class="fas fa-eye"></i>'; // Change back to eye
    }
  }

  // Email validation function
  function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  // Real-time validation
  document.addEventListener('DOMContentLoaded', function() {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    // Email validation on input
    emailInput.addEventListener('input', function() {
      const email = this.value.trim();
      const emailError = document.getElementById('email-error');

      if (email === '') {
        emailError.textContent = '';
      } else if (!validateEmail(email)) {
        emailError.textContent = 'Please enter a valid email format';
      } else {
        emailError.textContent = '';
      }
    });

    // Password validation on input
    passwordInput.addEventListener('input', function() {
      const password = this.value;
      const passwordError = document.getElementById('password-error');

      if (password === '') {
        passwordError.textContent = '';
      } else if (password.length < 6) {
        passwordError.textContent = 'Password must be at least 6 characters';
      } else {
        passwordError.textContent = '';
      }
    });
  });

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

  // Form Handling
  document.addEventListener('DOMContentLoaded', function() {
    // Real-time validation
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    // Email validation on input
    emailInput.addEventListener('input', function() {
      const email = this.value.trim();
      const emailError = document.getElementById('email-error');

      if (email === '') {
        emailError.textContent = '';
      } else if (!validateEmail(email)) {
        emailError.textContent = 'Please enter a valid email format';
      } else {
        emailError.textContent = '';
      }
    });

    // Password validation on input
    passwordInput.addEventListener('input', function() {
      const password = this.value;
      const passwordError = document.getElementById('password-error');

      if (password === '') {
        passwordError.textContent = '';
      } else if (password.length < 6) {
        passwordError.textContent = 'Password must be at least 6 characters';
      } else {
        passwordError.textContent = '';
      }
    });

    // Login Form Handler
    document.getElementById('loginFormElement').addEventListener('submit', function(e) {
            e.preventDefault();

            // Clear previous errors
      document.getElementById('email-error').textContent = '';
      document.getElementById('password-error').textContent = '';

      // Client-side validation
      const email = document.getElementById('email').value.trim();
      const password = document.getElementById('password').value;
      let hasErrors = false;

      // Email validation
      if (email === '') {
        document.getElementById('email-error').textContent = 'Email is required';
        hasErrors = true;
      } else if (!validateEmail(email)) {
        document.getElementById('email-error').textContent = 'Please enter a valid email format';
        hasErrors = true;
      }

      // Password validation
      if (password === '') {
        document.getElementById('password-error').textContent = 'Password is required';
        hasErrors = true;
      } else if (password.length < 6) {
        document.getElementById('password-error').textContent = 'Password must be at least 6 characters';
        hasErrors = true;
      }

      if (hasErrors) {
        return;
      }

      const loginBtn = document.getElementById('loginBtn');
      const originalText = loginBtn.textContent;

      loginBtn.disabled = true;
      loginBtn.textContent = 'Logging in...';

      // Show loading toaster
            let loadingToast = null;
            if (window.toaster) {
                loadingToast = window.toaster.loading('Logging in...');
            }

      const formData = new FormData(this);

      fetch(this.action, {
                method: 'POST',
        body: formData,
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      })
      .then(response => response.json())
      .then(data => {
                    // Hide loading toaster
                    if (window.toaster && loadingToast) {
                        window.toaster.hide(loadingToast);
                    }

        if (data.success) {
          // Show success toaster
                        if (window.toaster) {
                            window.toaster.success('Login successful! Redirecting...', 2000);
          }

          // Redirect or show success message
          if (data.redirect) {
            setTimeout(() => {
              window.location.href = data.redirect;
            }, 2000);
                        } else {
            // Default redirect to home
                        setTimeout(() => {
                            window.location.href = '/home';
                        }, 2000);
          }
                    } else {
          // Show error message
          if (data.message) {
            if (data.field === 'email') {
              document.getElementById('email-error').textContent = data.message;
            } else if (data.field === 'password') {
              document.getElementById('password-error').textContent = data.message;
                        } else {
              document.getElementById('email-error').textContent = data.message;
            }
                        }
                    }
      })
      .catch(error => {
                    // Hide loading toaster
                    if (window.toaster && loadingToast) {
                        window.toaster.hide(loadingToast);
        }

        // Handle validation errors
        if (error.status === 422) {
          const errors = error.responseJSON.errors;
                        if (errors.email) {
            document.getElementById('email-error').textContent = errors.email[0];
                        }
                        if (errors.password) {
            document.getElementById('password-error').textContent = errors.password[0];
                        }
                    } else {
          document.getElementById('email-error').textContent = 'An error occurred. Please try again.';
        }
      })
      .finally(() => {
        loginBtn.disabled = false;
        loginBtn.textContent = originalText;
            });
        });
    });
</script>

<!-- Load jQuery first -->
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

<!-- Include Toaster System -->
@include('front.includes.toaster')

@endsection


