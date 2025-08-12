<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password - SlidesBuy</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .email-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }
        
        .logo {
            height: 60px;
            width: auto;
            filter: brightness(0) invert(1);
            margin-bottom: 20px;
        }
        
        .header-title {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .header-subtitle {
            font-size: 16px;
            opacity: 0.9;
            margin-top: 10px;
        }
        
        .email-body {
            padding: 40px 30px;
        }
        
        .greeting {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }
        
        .message {
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .reset-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            padding: 16px 32px;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            text-align: center;
            margin: 20px 0;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
        }
        
        .reset-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        }
        
        .security-note {
            background-color: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin: 30px 0;
            border-radius: 8px;
        }
        
        .security-note h4 {
            color: #667eea;
            margin: 0 0 10px 0;
            font-size: 16px;
        }
        
        .security-note p {
            margin: 0;
            color: #666;
            font-size: 14px;
        }
        
        .link-fallback {
            background-color: #f8f9fa;
            border: 1px solid #e1e5e9;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
            word-break: break-all;
        }
        
        .link-fallback a {
            color: #667eea;
            text-decoration: none;
        }
        
        .email-footer {
            background-color: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e1e5e9;
        }
        
        .footer-logo {
            height: 40px;
            width: auto;
            margin-bottom: 15px;
        }
        
        .footer-text {
            color: #666;
            font-size: 14px;
            margin: 0;
        }
        
        .footer-links {
            margin-top: 15px;
        }
        
        .footer-links a {
            color: #667eea;
            text-decoration: none;
            margin: 0 10px;
            font-size: 14px;
        }
        
        .footer-links a:hover {
            text-decoration: underline;
        }
        
        @media only screen and (max-width: 600px) {
            .email-container {
                margin: 0;
                box-shadow: none;
            }
            
            .email-header {
                padding: 30px 20px;
            }
            
            .email-body {
                padding: 30px 20px;
            }
            
            .header-title {
                font-size: 24px;
            }
            
            .reset-button {
                display: block;
                width: 100%;
                box-sizing: border-box;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Email Header -->
        <div class="email-header">
            <img src="{{ asset('assets/images/logo/slidesbuy.png') }}" alt="SlidesBuy" class="logo">
            <h1 class="header-title">Reset Your Password</h1>
            <p class="header-subtitle">Secure your account with a new password</p>
        </div>
        
        <!-- Email Body -->
        <div class="email-body">
            <div class="greeting">
                Hello {{ $user->name ?? 'there' }},
            </div>
            
            <div class="message">
                We received a request to reset your password for your SlidesBuy account. If you made this request, please click the button below to create a new password.
            </div>
            
            <!-- Reset Button -->
            <div style="text-align: center;">
                <a href="{{ $resetUrl }}" class="reset-button">
                    🔐 Reset My Password
                </a>
            </div>
            
            <!-- Security Note -->
            <div class="security-note">
                <h4>🔒 Security Notice</h4>
                <p>
                    If you didn't request a password reset, please ignore this email. Your account security is important to us, and no changes will be made unless you click the reset button above.
                </p>
            </div>
            
            <!-- Link Fallback -->
            <div class="message">
                <strong>Having trouble clicking the button?</strong><br>
                Copy and paste the URL below into your web browser:
            </div>
            
            <div class="link-fallback">
                <a href="{{ $resetUrl }}">{{ $resetUrl }}</a>
            </div>
            
            <div class="message">
                <strong>Important:</strong>
                <ul>
                    <li>This link will expire in 60 minutes</li>
                    <li>For security reasons, it can only be used once</li>
                    <li>If you didn't request this, your account is secure</li>
                </ul>
            </div>
        </div>
        
        <!-- Email Footer -->
        <div class="email-footer">
            <img src="{{ asset('assets/images/logo/slidesbuy.png') }}" alt="SlidesBuy" class="footer-logo">
            <p class="footer-text">
                This email was sent to {{ $user->email ?? 'you' }} from SlidesBuy.<br>
                If you have any questions, please contact our support team.
            </p>
            
            <div class="footer-links">
                <a href="{{ url('/') }}">Visit Website</a>
                <a href="{{ url('/contact') }}">Contact Support</a>
                <a href="{{ url('/privacy') }}">Privacy Policy</a>
            </div>
            
            <p class="footer-text" style="margin-top: 20px; font-size: 12px; color: #999;">
                © {{ date('Y') }} SlidesBuy. All rights reserved.<br>
                This email was sent from a notification-only address that cannot accept incoming email. Please do not reply to this message.
            </p>
        </div>
    </div>
</body>
</html>
