<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - SlidesBuy</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .reset-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 500px;
            width: 100%;
            margin: 20px;
        }

        .reset-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .logo-container {
            margin-bottom: 20px;
        }

        .logo-container img {
            height: 60px;
            width: auto;
            filter: brightness(0) invert(1);
        }

        .reset-title {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .reset-subtitle {
            font-size: 16px;
            opacity: 0.9;
            margin-top: 10px;
        }

        .reset-body {
            padding: 40px 30px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            padding: 15px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            background: white;
        }

        .form-control:read-only {
            background: #f8f9fa;
            color: #6c757d;
        }

        .password-field {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            padding: 5px;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #667eea;
        }

        .password-toggle:focus {
            outline: none;
        }

        .password-toggle i {
            font-size: 18px;
        }

        .btn-reset {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: 600;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-reset:active {
            transform: translateY(0);
        }

        .btn-reset:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        .success-message {
            color: #28a745;
            font-size: 14px;
            margin-top: 5px;
        }

        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #ffffff;
            animation: spin 1s ease-in-out infinite;
            margin-right: 10px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .back-to-login {
            text-align: center;
            margin-top: 20px;
        }

        .back-to-login a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .back-to-login a:hover {
            color: #764ba2;
        }

        .password-strength {
            margin-top: 5px;
            font-size: 12px;
        }

        .strength-weak { color: #dc3545; }
        .strength-medium { color: #ffc107; }
        .strength-strong { color: #28a745; }

        @media (max-width: 576px) {
            .reset-container {
                margin: 10px;
                border-radius: 15px;
            }
            
            .reset-header {
                padding: 30px 20px;
            }
            
            .reset-body {
                padding: 30px 20px;
            }
            
            .reset-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <div class="reset-header">
            <div class="logo-container">
                <img src="{{ asset('assets/images/logo/slidesbuy.png') }}" alt="SlidesBuy" class="logo">
            </div>
            <h1 class="reset-title">Reset Your Password</h1>
            <p class="reset-subtitle">Enter your new password below</p>
        </div>
        
        <div class="reset-body">
            <form id="resetPasswordForm" method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope me-2"></i>Email Address
                    </label>
                    <input type="email" name="email" class="form-control" id="email" 
                           value="{{ old('email', request('email')) }}" required readonly>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock me-2"></i>New Password
                    </label>
                    <div class="password-field">
                        <input type="password" name="password" id="password" class="form-control" 
                               placeholder="Enter your new password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword('password')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength" id="passwordStrength"></div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">
                        <i class="fas fa-lock me-2"></i>Confirm New Password
                    </label>
                    <div class="password-field">
                        <input type="password" name="password_confirmation" id="password_confirmation" 
                               class="form-control" placeholder="Confirm your new password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="error-message" id="passwordMatchError">Passwords do not match.</div>
                </div>

                <button type="submit" class="btn-reset" id="resetBtn">
                    <span id="btnText">
                        <i class="fas fa-key me-2"></i>Reset Password
                    </span>
                    <span id="btnSpinner" class="loading-spinner" style="display: none;"></span>
                </button>
            </form>

            <div class="back-to-login">
                <a href="{{ route('login.form') }}">
                    <i class="fas fa-arrow-left me-2"></i>Back to Login
                </a>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Include Toaster System -->
    @include('front.includes.toaster')

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const toggle = field.nextElementSibling.querySelector('i');
            
            if (field.type === 'password') {
                field.type = 'text';
                toggle.classList.remove('fa-eye');
                toggle.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                toggle.classList.remove('fa-eye-slash');
                toggle.classList.add('fa-eye');
            }
        }

        function checkPasswordStrength(password) {
            let strength = 0;
            let feedback = '';
            
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]+/)) strength++;
            if (password.match(/[A-Z]+/)) strength++;
            if (password.match(/[0-9]+/)) strength++;
            if (password.match(/[!@#$%^&*(),.?":{}|<>]+/)) strength++;
            
            const strengthElement = document.getElementById('passwordStrength');
            
            if (password.length === 0) {
                strengthElement.textContent = '';
                strengthElement.className = 'password-strength';
            } else if (strength <= 2) {
                feedback = 'Weak password';
                strengthElement.className = 'password-strength strength-weak';
            } else if (strength <= 3) {
                feedback = 'Medium strength password';
                strengthElement.className = 'password-strength strength-medium';
            } else {
                feedback = 'Strong password';
                strengthElement.className = 'password-strength strength-strong';
            }
            
            strengthElement.textContent = feedback;
        }

        $('#password').on('input', function() {
            checkPasswordStrength($(this).val());
        });

        $('#resetPasswordForm').on('submit', function(e) {
            e.preventDefault();

            const password = $('#password').val();
            const confirmPassword = $('#password_confirmation').val();

            // Clear previous errors
            $('#passwordMatchError').hide();

            if (password !== confirmPassword) {
                $('#passwordMatchError').show();
                if (window.toaster) {
                    window.toaster.error('Passwords do not match.');
                }
                return;
            }

            if (password.length < 8) {
                if (window.toaster) {
                    window.toaster.error('Password must be at least 8 characters long.');
                }
                return;
            }

            // Show loading state
            $('#btnText').text('Resetting Password...');
            $('#btnSpinner').show();
            $('#resetBtn').prop('disabled', true);

            // Show loading toaster
            let loadingToast = null;
            if (window.toaster) {
                loadingToast = window.toaster.loading('Resetting your password...');
            }

            const form = $(this);
            const url = form.attr('action');
            const formData = form.serialize();

            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                success: function(response) {
                    if (window.toaster && loadingToast) {
                        window.toaster.hide(loadingToast);
                    }
                    
                    if (window.toaster) {
                        window.toaster.success('Password reset successful! Redirecting to login...', 3000);
                    }

                    // Redirect after 3 seconds
                    setTimeout(() => {
                        window.location.href = "{{ route('login.form') }}";
                    }, 3000);
                },
                error: function(xhr) {
                    if (window.toaster && loadingToast) {
                        window.toaster.hide(loadingToast);
                    }
                    
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';
                        for (let field in errors) {
                            errorMessage += errors[field][0] + ' ';
                        }
                        if (window.toaster) {
                            window.toaster.error(errorMessage.trim());
                        }
                    } else if (xhr.responseJSON && xhr.responseJSON.message) {
                        if (window.toaster) {
                            window.toaster.error(xhr.responseJSON.message);
                        }
                    } else {
                        if (window.toaster) {
                            window.toaster.error('An error occurred while resetting your password. Please try again.');
                        }
                    }
                    
                    // Reset button state
                    $('#btnText').html('<i class="fas fa-key me-2"></i>Reset Password');
                    $('#btnSpinner').hide();
                    $('#resetBtn').prop('disabled', false);
                }
            });
        });
    </script>
</body>
</html>
