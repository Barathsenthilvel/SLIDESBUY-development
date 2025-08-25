<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to SLIDESBUY</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px 20px;
            text-align: center;
        }
        .logo {
            width: 120px;
            height: auto;
            margin-bottom: 15px;
        }
        .welcome-text {
            color: #ffffff;
            font-size: 28px;
            font-weight: bold;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 24px;
            color: #2d3748;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .message {
            font-size: 16px;
            color: #4a5568;
            margin-bottom: 25px;
            line-height: 1.7;
        }
        .features {
            background-color: #f7fafc;
            border-radius: 8px;
            padding: 25px;
            margin: 30px 0;
        }
        .features h3 {
            color: #2d3748;
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 20px;
        }
        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px 0;
        }
        .feature-icon {
            width: 24px;
            height: 24px;
            background-color: #667eea;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }
        .feature-text {
            color: #4a5568;
            font-size: 15px;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 16px;
            margin: 20px 0;
            text-align: center;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            transition: transform 0.3s ease;
        }
        .cta-button:hover {
            transform: translateY(-2px);
        }
        .footer {
            background-color: #2d3748;
            color: #a0aec0;
            text-align: center;
            padding: 25px 20px;
            font-size: 14px;
        }
        .social-links {
            margin: 20px 0;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #667eea;
            text-decoration: none;
        }
        .highlight {
            color: #667eea;
            font-weight: 600;
        }
        .divider {
            border-top: 1px solid #e2e8f0;
            margin: 25px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header with Logo -->
        <div class="header">
            <img src="{{ asset('assets/images/logo/slidesbuy.png') }}" alt="SLIDESBUY" class="logo">
            <h1 class="welcome-text">Welcome to SLIDESBUY!</h1>
        </div>

        <!-- Main Content -->
        <div class="content">
            <h2 class="greeting">Hello {{ $userData['name'] }}! 👋</h2>

            <p class="message">
                Welcome to <span class="highlight">SLIDESBUY</span>! We're thrilled to have you join our community of creative professionals, educators, and presentation enthusiasts.
            </p>

            <p class="message">
                Your account has been successfully created and you're now ready to explore our vast collection of premium presentation templates, graphics, and design resources.
            </p>

            <!-- Features Section -->
            <div class="features">
                <h3>🎉 What You Can Do Now:</h3>

                <div class="feature-item">
                    <div class="feature-icon">🎨</div>
                    <div class="feature-text">Browse thousands of professional presentation templates</div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">📱</div>
                    <div class="feature-text">Download high-quality graphics and icons</div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">💎</div>
                    <div class="feature-text">Access exclusive premium content</div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">🚀</div>
                    <div class="feature-text">Create stunning presentations in minutes</div>
                </div>
            </div>

            <p class="message">
                Ready to get started? Click the button below to explore our collection:
            </p>

            <div style="text-align: center;">
                <a href="{{ url('/') }}" class="cta-button">Start Exploring SLIDESBUY</a>
            </div>

            <div class="divider"></div>

            <p class="message">
                <strong>Need Help?</strong> Our support team is here to assist you. Feel free to reach out if you have any questions about using our platform or finding the perfect templates for your projects.
            </p>

            <p class="message">
                Thank you for choosing <span class="highlight">SLIDESBUY</span>! We're excited to see the amazing presentations you'll create.
            </p>

            <p class="message">
                Best regards,<br>
                The <span class="highlight">SLIDESBUY</span> Team
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} SLIDESBUY. All rights reserved.</p>
            <p>This email was sent to {{ $userData['email'] }}</p>

            <div class="social-links">
                <a href="#">Website</a> |
                <a href="#">Support</a> |
                <a href="#">Privacy Policy</a> |
                <a href="#">Terms of Service</a>
            </div>

            <p style="margin-top: 20px; font-size: 12px;">
                If you have any questions, please contact us at support@slidesbuy.com
            </p>
        </div>
    </div>
</body>
</html>
