<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Slidesbuy! 🎉</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .welcome-title {
            font-size: 28px;
            color: #2c3e50;
            margin: 20px 0;
            font-weight: bold;
        }
        .content {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .greeting {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .message {
            font-size: 16px;
            color: #4a5568;
            margin-bottom: 20px;
            line-height: 1.7;
        }
        .next-step {
            background-color: #e8f4fd;
            border-left: 4px solid #3498db;
            padding: 20px;
            margin: 25px 0;
            border-radius: 0 8px 8px 0;
        }
        .next-step p {
            margin: 0;
            font-size: 16px;
            color: #2c3e50;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            color: #666;
        }
        .highlight {
            color: #3498db;
            font-weight: bold;
        }
        .cta-button {
            display: inline-block;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: bold;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Slidesbuy</div>
            <h1 class="welcome-title">Welcome to Slidesbuy! 🎉</h1>
        </div>
        
        <div class="content">
            <p class="greeting">Dear <strong>{{ $userData['name'] ?? 'Valued Customer' }}</strong>,</p>
            
            <p class="message">Thank you for signing up with Slidesbuy! Your account is now active.</p>
            
            <p class="message">You're all set to explore our premium PowerPoint & Google Slides templates.</p>
            
            <div class="next-step">
                <p>👉 <strong>Next step:</strong> Choose a subscription plan that fits your needs and start downloading today.</p>
            </div>
            
            <div style="text-align: center;">
                <a href="{{ url('/pricing-plan') }}" class="cta-button">View Subscription Plans</a>
            </div>
            
            <p class="message">We look forward to supporting your creative journey.</p>
            
            <p class="message">
                <strong>Best regards,</strong><br>
                <strong>The Slidesbuy Team</strong><br>
                <a href="https://slidesbuy.com" style="color: #3498db;">Slidesbuy.com</a>
            </p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} Slidesbuy. All rights reserved.</p>
            <p>This email was sent to {{ $userData['email'] ?? 'your email address' }}</p>
        </div>
    </div>
</body>
</html>
