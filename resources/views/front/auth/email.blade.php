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
    }

    .btn-custom {
      background-color: #007bff;
      color: white;
      transition: background-color 0.3s ease;
    }

    .btn-custom:hover {
      background-color: #0056b3;
    }

    .form-title {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
      color: #333;
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

      <button type="submit" id="resetBtn" class="btn btn-custom w-100">Send Reset Link</button>
    </form>

    <!-- Message Boxes -->
    <div id="resetStatusMessage" class="text-center mt-3"></div>
    <div id="countdownTimer" class="text-center text-primary"></div>
  </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let countdown;

$('#resetForm').on('submit', function(e) {
    e.preventDefault();

    $('#emailError').text('');
    $('#resetStatusMessage').text('').css('color', '');
    $('#countdownTimer').text('');

    $.ajax({
        url: '{{ route("password.email") }}',
        method: 'POST',
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function(response) {
    $('#resetStatusMessage')
        .text(response.message)
        .css('color', 'green');

    // Optional: Disable button to prevent resending
    $('#resetBtn').prop('disabled', true);

    // Optional: Start countdown (if you want visual delay)
    // startCountdown(300);

    // Wait 3 seconds, then go to login page
    setTimeout(function() {
        window.location.href = "{{ route('login.form') }}";
    }, 3000);
},
        // success: function(response) {
        //     $('#resetStatusMessage').text(response.message).css('color', 'green');
        //     $('#')



        //     // Start 5-minute countdown
        //     startCountdown(300);
        //     $('#resetBtn').prop('disabled', true);
        // },
        error: function(xhr) {
            if (xhr.status === 429) {
                // Laravel throttle response
                $('#resetStatusMessage').text("Please wait before retrying.").css('color', 'red');
            } else if (xhr.status === 404 && xhr.responseJSON?.message) {
                $('#resetStatusMessage').text(xhr.responseJSON.message).css('color', 'red');
            } else if (xhr.responseJSON?.errors?.email) {
                $('#emailError').text(xhr.responseJSON.errors.email[0]);
            } else {
                $('#resetStatusMessage').text('Something went wrong. Please try again.').css('color', 'red');
            }
        }
    });
});

function startCountdown(seconds) {
    clearInterval(countdown);
    countdown = setInterval(function () {
        let minutes = Math.floor(seconds / 60);
        let secs = seconds % 60;
        $('#countdownTimer').text(`You can request again in ${minutes}:${secs < 10 ? '0' : ''}${secs}`);
        seconds--;

        if (seconds < 0) {
            clearInterval(countdown);
            $('#countdownTimer').text('');
            $('#resetBtn').prop('disabled', false);
        }
    }, 1000);
}
</script>
</body>
</html>