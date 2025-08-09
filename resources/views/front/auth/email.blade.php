<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Forget Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #89f7fe, #66a6ff);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family: 'Segoe UI', sans-serif;
    }

    .card {
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
      animation: slideIn 1s ease forwards;
      opacity: 0;
      transform: translateY(30px);
    }

    @keyframes slideIn {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    #emailError {
      font-size: 14px;
    }

    #resetStatusMessage {
      font-size: 16px;
    }

    #countdownTimer {
      font-size: 15px;
      font-weight: bold;
      color: #dc3545;
    }

    .btn-custom {
      background-color: #007bff;
      color: white;
      transition: background-color 0.3s ease;
    }

    .btn-custom:hover {
      background-color: #0056b3;
    }

    .btn-custom:disabled {
      background-color: #6c757d;
      cursor: not-allowed;
    }

    .form-title {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .loading-spinner {
      display: inline-block;
      width: 16px;
      height: 16px;
      border: 2px solid #ffffff;
      border-radius: 50%;
      border-top-color: transparent;
      animation: spin 1s ease-in-out infinite;
      margin-right: 8px;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }
  </style>
</head>
<body>

  <div class="card w-100" style="max-width: 400px;">
    <div class="form-title">🔐 Forgot Password</div>

    <form id="resetForm">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
        <span id="emailError" class="text-danger mt-1 d-block"></span>
      </div>

      <button type="submit" id="resetBtn" class="btn btn-custom w-100">
        <span id="btnText">Send Reset Link</span>
        <span id="btnSpinner" class="loading-spinner" style="display: none;"></span>
      </button>
    </form>

    <!-- Message Boxes -->
    <div id="resetStatusMessage" class="text-center mt-3"></div>
    <div id="countdownTimer" class="text-center mt-2"></div>
  </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Toaster System -->
@include('front.includes.toaster')

<script>
let countdown;
let isSubmitting = false;

$('#resetForm').on('submit', function(e) {
    e.preventDefault();

    // Prevent multiple submissions
    if (isSubmitting) {
        return false;
    }

    $('#emailError').text('');
    $('#resetStatusMessage').text('').css('color', '');
    $('#countdownTimer').text('');

    // Show loading state
    isSubmitting = true;
    $('#btnText').text('Sending...');
    $('#btnSpinner').show();
    $('#resetBtn').prop('disabled', true);

    // Show loading toaster
    let loadingToast = null;
    if (window.toaster) {
        loadingToast = window.toaster.loading('Sending reset link...');
    } else {
        $('#resetStatusMessage').text('Sending reset link...').css('color', '#007bff');
    }

    $.ajax({
        url: '{{ route("password.email") }}',
        method: 'POST',
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        timeout: 10000, // 10 second timeout
        success: function(response) {
            // Hide loading toaster
            if (window.toaster && loadingToast) {
                window.toaster.hide(loadingToast);
            }
            
            if (response.status) {
                // Success case - reset link sent
                if (window.toaster) {
                    window.toaster.success(response.message || 'Reset link sent successfully! Redirecting to login page...', 3000);
                } else {
                    $('#resetStatusMessage').text(response.message || 'Reset link sent successfully! Redirecting to login page...').css('color', '#28a745');
                }
                
                // Clear any existing countdown
                clearInterval(countdown);
                $('#countdownTimer').text('');
                
                // Redirect to login page after 3 seconds
                setTimeout(function() {
                    window.location.href = "{{ route('login.form') }}";
                }, 3000);
                
            } else {
                // Failed case - reset link not sent
                if (window.toaster) {
                    window.toaster.error(response.message || 'Failed to send reset link.');
                } else {
                    $('#resetStatusMessage').text(response.message || 'Failed to send reset link.').css('color', '#dc3545');
                }
                resetButton();
            }
        },
        error: function(xhr) {
            // Hide loading toaster
            if (window.toaster && loadingToast) {
                window.toaster.hide(loadingToast);
            }
            
            if (xhr.status === 429) {
                // Laravel throttle response - too many requests
                let retryAfter = xhr.responseJSON?.retry_after || 300;
                if (window.toaster) {
                    window.toaster.error('Please wait before requesting again. You can try again in ' + Math.ceil(retryAfter / 60) + ' minutes.');
                } else {
                    $('#resetStatusMessage').text('Please wait before requesting again. You can try again in ' + Math.ceil(retryAfter / 60) + ' minutes.').css('color', '#dc3545');
                }
                startCountdown(retryAfter);
            } else if (xhr.status === 404) {
                const errorMsg = xhr.responseJSON?.message || 'Email not found. Please check your email address.';
                if (window.toaster) {
                    window.toaster.error(errorMsg);
                } else {
                    $('#resetStatusMessage').text(errorMsg).css('color', '#dc3545');
                }
                resetButton();
            } else if (xhr.responseJSON?.errors?.email) {
                const errorMsg = xhr.responseJSON.errors.email[0];
                $('#emailError').text(errorMsg);
                if (window.toaster) {
                    window.toaster.error(errorMsg);
                } else {
                    $('#resetStatusMessage').text(errorMsg).css('color', '#dc3545');
                }
                resetButton();
            } else if (xhr.status === 0 || xhr.statusText === 'timeout') {
                const errorMsg = 'Request timeout. Please check your internet connection and try again.';
                if (window.toaster) {
                    window.toaster.error(errorMsg);
                } else {
                    $('#resetStatusMessage').text(errorMsg).css('color', '#dc3545');
                }
                resetButton();
            } else {
                const errorMsg = 'Something went wrong. Please try again.';
                if (window.toaster) {
                    window.toaster.error(errorMsg);
                } else {
                    $('#resetStatusMessage').text(errorMsg).css('color', '#dc3545');
                }
                resetButton();
            }
        }
    });
});

function resetButton() {
    isSubmitting = false;
    $('#btnText').text('Send Reset Link');
    $('#btnSpinner').hide();
    $('#resetBtn').prop('disabled', false);
}

function startCountdown(seconds) {
    clearInterval(countdown);
    let remainingSeconds = seconds;
    
    countdown = setInterval(function () {
        const minutes = Math.floor(remainingSeconds / 60);
        const seconds = remainingSeconds % 60;
        
        if (remainingSeconds > 0) {
            $('#countdownTimer').text(`Please wait ${minutes}:${seconds.toString().padStart(2, '0')} before requesting again`);
            remainingSeconds--;
        } else {
            clearInterval(countdown);
            $('#countdownTimer').text('');
            resetButton();
        }
    }, 1000);
}

// Clear countdown when user leaves page
$(window).on('beforeunload', function() {
    clearInterval(countdown);
});
</script>
</body>
</html>