<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #007bff; border-bottom: 2px solid #007bff; padding-bottom: 10px;">
            New Contact Form Submission
        </h2>

        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;">
            <p><strong>Name:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>User Status:</strong> {{ isset($isLoggedIn) && $isLoggedIn ? 'Logged In User' : 'Guest User' }}</p>

            @if(isset($userDisplayName) && $userDisplayName != 'Customer')
                <p><strong>Username:</strong> {{ $userDisplayName }}</p>
            @endif

            <p><strong>Message:</strong></p>
            <div style="background-color: white; padding: 15px; border-left: 4px solid #007bff; margin-top: 10px;">
                {{ $form_message }}
            </div>
        </div>

        <p style="font-size: 14px; color: #666;">
            <strong>Note:</strong> This is a new contact form submission that requires your attention.
        </p>

        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; text-align: center;">
            <p style="color: #999; font-size: 12px;">
                This email was sent from {{ config('app.name', 'SLIDESBUY') }} contact form.
            </p>
        </div>
    </div>
</body>
</html>
