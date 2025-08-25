@extends('front.includes.container')
@section('content')

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

<style>
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
  .password-toggle {
    position: absolute;
    right: 12px;
    top: 34%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: rgba(255, 255, 255, 0.7);
    cursor: pointer;
    font-size: 16px;
    transition: color 0.3s ease;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 20px;
    height: 20px;
    /* Responsive positioning for all screen sizes */
    @media (max-width: 1200px) {
      right: 12px;
      font-size: 16px;
    }
    @media (max-width: 992px) {
      right: 12px;
      font-size: 16px;
    }
    @media (max-width: 768px) {
      right: 10px;
      font-size: 14px;
    }
    @media (max-width: 576px) {
      right: 8px;
      font-size: 13px;
    }
    @media (max-width: 480px) {
      right: 8px;
      font-size: 12px;
    }
    @media (max-width: 375px) {
      right: 6px;
      font-size: 11px;
    }
  }
  .password-toggle:hover {
    color: white;
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
  }
  .logo {
    text-align: center;
    margin-bottom: 1rem;
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
          👁️
        </button>
        <div class="error-message" id="password-error"></div>
      </div>

      <div class="password-container">
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" placeholder="Confirm Password" required autocomplete="new-password">
        <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">
          👁️
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
      toggleBtn.textContent = '🙈';
    } else {
      passwordInput.type = 'password';
      toggleBtn.textContent = '👁️';
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

  // Form Handling
  document.addEventListener('DOMContentLoaded', function() {
    // Real-time validation
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');

    // Name validation on input
    nameInput.addEventListener('input', function() {
      const name = this.value.trim();
      const nameError = document.getElementById('name-error');

      if (name === '') {
        nameError.textContent = '';
      } else if (name.length < 2) {
        nameError.textContent = 'Name must be at least 2 characters';
      } else {
        nameError.textContent = '';
      }
    });

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

    // Confirm password validation on input
    confirmPasswordInput.addEventListener('input', function() {
      const confirmPassword = this.value;
      const password = passwordInput.value;
      const confirmPasswordError = document.getElementById('password_confirmation-error');

      if (confirmPassword === '') {
        confirmPasswordError.textContent = '';
      } else if (confirmPassword !== password) {
        confirmPasswordError.textContent = 'Passwords do not match';
      } else {
        confirmPasswordError.textContent = '';
      }
    });

    // Register Form Handler
    document.getElementById('registerFormElement').addEventListener('submit', function(e) {
      e.preventDefault();

      // Clear previous errors
      document.getElementById('name-error').textContent = '';
      document.getElementById('email-error').textContent = '';
      document.getElementById('password-error').textContent = '';
      document.getElementById('password_confirmation-error').textContent = '';
      document.getElementById('agree-error').textContent = '';

      // Client-side validation
      const name = nameInput.value.trim();
      const email = emailInput.value.trim();
      const password = passwordInput.value;
      const confirmPassword = confirmPasswordInput.value;
      const agree = document.getElementById('agree').checked;
      let hasErrors = false;

      // Name validation
      if (name === '') {
        document.getElementById('name-error').textContent = 'Full name is required';
        hasErrors = true;
      } else if (name.length < 2) {
        document.getElementById('name-error').textContent = 'Name must be at least 2 characters';
        hasErrors = true;
      }

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

      // Confirm password validation
      if (confirmPassword === '') {
        document.getElementById('password_confirmation-error').textContent = 'Please confirm your password';
        hasErrors = true;
      } else if (confirmPassword !== password) {
        document.getElementById('password_confirmation-error').textContent = 'Passwords do not match';
        hasErrors = true;
      }

      // Terms & conditions checkbox
      if (!agree) {
        document.getElementById('agree-error').textContent = 'You must agree to terms & conditions';
        hasErrors = true;
      }

      if (hasErrors) {
        return;
      }

      const submitBtn = document.getElementById('submitBtn');
      const originalText = submitBtn.textContent;

      submitBtn.disabled = true;
      submitBtn.textContent = 'Creating Account...';

      // Show loading toaster
      let loadingToast = null;
      if (window.toaster) {
        loadingToast = window.toaster.loading('Creating your account...');
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
          // Show success message
          if (window.toaster) {
            window.toaster.success('Account created successfully! OTP sent to your email. Redirecting...', 2000);
          }

          // Redirect to OTP form after a short delay
          setTimeout(function() {
            window.location.href = '/otp-form';
          }, 2000);
        } else {
          // Show error message
          if (window.toaster) {
            window.toaster.error(data.message || 'Something went wrong. Please try again.');
          }

          // Reset button
          submitBtn.disabled = false;
          submitBtn.textContent = originalText;
        }
      })
      .catch(error => {
        // Hide loading toaster
        if (window.toaster && loadingToast) {
          window.toaster.hide(loadingToast);
        }

        // Reset button
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;

        // Handle validation errors
        if (error.status === 422) {
          const errors = error.responseJSON.errors;
          if (errors.name) {
            document.getElementById('name-error').textContent = errors.name[0];
          }
          if (errors.email) {
            document.getElementById('email-error').textContent = errors.email[0];
          }
          if (errors.password) {
            document.getElementById('password-error').textContent = errors.password[0];
          }
          if (errors.password_confirmation) {
            document.getElementById('password_confirmation-error').textContent = errors.password_confirmation[0];
          }
          if (errors.agree) {
            document.getElementById('agree-error').textContent = errors.agree[0];
          }
        } else {
          document.getElementById('email-error').textContent = 'An error occurred. Please try again.';
        }
      });
    });
  });
</script>

@endsection
