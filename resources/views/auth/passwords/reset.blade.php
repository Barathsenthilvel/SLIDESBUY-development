
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Reset Your Password</h4>
                </div>
                <div class="card-body">
                    <form id="resetPasswordForm" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', request('email')) }}" required readonly>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            <div id="passwordMatchError" class="text-danger mt-1" style="display:none;">Passwords do not match.</div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Toast Notification -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
  <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        Password reset successful! Redirecting to login...
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>

<!-- Bootstrap & jQuery -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $('#resetPasswordForm').on('submit', function(e) {
        e.preventDefault();

        const password = $('#password').val();
        const confirmPassword = $('#password_confirmation').val();

        if (password !== confirmPassword) {
            $('#passwordMatchError').show();
            return;
        } else {
            $('#passwordMatchError').hide();
        }

        const form = $(this);
        const url = form.attr('action');
        const formData = form.serialize();

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            success: function(response) {
                // Show Bootstrap Toast
                const toastEl = document.getElementById('successToast');
                const toast = new bootstrap.Toast(toastEl);
                toast.show();

                // Redirect after 3 seconds
                setTimeout(() => {
                    window.location.href = "{{ route('login.form') }}";
                }, 3000);
            },
           error: function(xhr) {
    if (xhr.status === 422) {
        let errors = xhr.responseJSON.errors;

        // Clear old errors
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').remove();

        // Show new validation  #0091f7 errors
        $.each(errors, function(key, messages) {
            const input = $('[name="' + key + '"]');
            input.addClass('is-invalid');
            input.after('<div class="invalid-feedback">' + messages[0] + '</div>');
        });
    }
}

        });
    });
</script>
