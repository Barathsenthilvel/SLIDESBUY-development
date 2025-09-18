<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 150px;
            height: auto;
            margin-bottom: 15px;
        }
        .title {
            color: #007bff;
            font-size: 24px;
            margin: 0;
        }
        .content {
            margin-bottom: 30px;
        }
        .greeting {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }
        .message {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #007bff;
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            border-top: 1px solid #ddd;
            padding-top: 20px;
            color: #666;
            font-size: 14px;
        }
        .highlight {
            color: #007bff;
            font-weight: bold;
        }
        .contact-info {
            background-color: #e7f3ff;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            @if(isset($StoreConfig) && $StoreConfig->invert_logo)
                <img src="{{ asset('assets/media/banner/' . $StoreConfig->invert_logo) }}" alt="Logo" class="logo">
            @endif
            <h1 class="title">Thank You for Contacting Us!</h1>
        </div>

        <div class="content">
            <p class="greeting">Dear <span class="highlight">{{ $customerName }}</span>,</p>

            <p>Thank you for reaching out to us! We have successfully received your message and appreciate you taking the time to contact us.</p>

            <div class="message">
                <strong>Your Message:</strong><br>
                "{{ $customerMessage }}"
            </div>

            <p>Our team has been notified and will review your inquiry. We typically respond within <span class="highlight">24-48 hours</span> during business days.</p>

            <div class="contact-info">
                <strong>Need immediate assistance?</strong><br>
                • Call us: <span class="highlight">+91-9994645424</span><br>
                • Email us: <span class="highlight">slidesbuy@gmail.com</span><br>
                • Visit our website: <a href="{{ route('front.index') }}" style="color: #007bff;">{{ config('app.url') }}</a>
            </div>

            {{-- <p>In the meantime, you might find answers to common questions in our <a href="{{ route('front.FAQ') }}" style="color: #007bff;">FAQ section</a> or <a href="{{ route('front.about') }}" style="color: #007bff;">About Us</a> page.</p> --}}
        </div>

        <div class="footer">
            <p><strong>Best regards,</strong><br>
            The {{ config('app.name', 'SLIDESBUY') }} Team</p>

            <p style="margin-top: 20px; font-size: 12px; color: #999;">
                This is an automated message. Please do not reply to this email.<br>
                If you have additional questions, please use our contact form or call us directly.
            </p>
        </div>
    </div>
</body>
</html>
