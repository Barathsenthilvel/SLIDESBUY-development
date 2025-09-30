<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Confirmed - SLIDESBUY</title>
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
        .success-text {
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
        .subscription-details {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
            border-left: 5px solid #667eea;
        }
        .subscription-details h3 {
            color: #2d3748;
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 22px;
            text-align: center;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .detail-label {
            color: #4a5568;
            font-weight: 600;
            font-size: 15px;
        }
        .detail-value {
            color: #2d3748;
            font-weight: bold;
            font-size: 15px;
        }
        .plan-name {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 16px;
            text-align: center;
            margin: 0 auto;
            display: inline-block;
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
        .expiry-warning {
            background-color: #fff5f5;
            border: 1px solid #fed7d7;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            text-align: center;
        }
        .expiry-warning h4 {
            color: #c53030;
            margin-top: 0;
            margin-bottom: 10px;
        }
        .expiry-warning p {
            color: #742a2a;
            margin: 0;
            font-size: 14px;
        }
        .features {
            background-color: #f0fff4;
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
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header with Logo -->
        <div class="header">
            <img src="{{ asset('assets/images/logo/slidesbuy.png') }}" alt="SLIDESBUY" class="logo">
            <h1 class="success-text">Subscription Confirmed! 🎉</h1>
        </div>

        <!-- Main Content -->
        <div class="content">
            <h2 class="greeting">Hello {{ $userData['name'] }}! 👋</h2>

            <p class="message">
                Congratulations! Your <span class="highlight">SLIDESBUY</span> subscription has been successfully activated. You now have access to our premium collection of presentation templates and design resources.
            </p>

            <!-- Subscription Details -->
            <div class="subscription-details">
                <h3>📋 Subscription Details</h3>

                <div class="detail-row">
                    <span class="detail-label">Plan Name:</span>
                    <span class="detail-value">{{ $planData['name'] }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Subscription ID:</span>
                    <span class="detail-value">#{{ $subscriptionData['id'] }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Amount Paid:</span>
                    <span class="detail-value">${{ number_format($subscriptionData['discount_price'], 2) }}</span>
                </div>

                @if($subscriptionData['discount_price'] != $subscriptionData['price'])
                <div class="detail-row">
                    <span class="detail-label">Original Price:</span>
                    <span class="detail-value" style="text-decoration: line-through; color: #a0aec0;">₹{{ number_format($subscriptionData['price'], 2) }}</span>
                </div>
                @endif

                <div class="detail-row">
                    <span class="detail-label">Payment Method:</span>
                    <span class="detail-value">{{ ucfirst($subscriptionData['payment_method'] ?? 'Online Payment') }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Transaction ID:</span>
                    <span class="detail-value">{{ $subscriptionData['transaction_id'] }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Start Date:</span>
                    <span class="detail-value">{{ \Carbon\Carbon::parse($subscriptionData['started_at'])->format('M d, Y') }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Expiry Date:</span>
                    <span class="detail-value" style="color: #e53e3e; font-weight: bold;">{{ \Carbon\Carbon::parse($subscriptionData['expired_at'])->format('M d, Y') }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Validity:</span>
                    <span class="detail-value">{{ $subscriptionData['validity'] }} days</span>
                </div>
            </div>

            <!-- Expiry Warning -->
            <div class="expiry-warning">
                <h4>⏰ Important Reminder</h4>
                <p>Your subscription will expire on <strong>{{ \Carbon\Carbon::parse($subscriptionData['expired_at'])->format('M d, Y') }}</strong>. Make sure to renew before expiry to continue enjoying premium access!</p>
            </div>

            <!-- Features Section -->
            {{-- <div class="features">
                <h3>🚀 What You Can Do Now:</h3>

                <div class="feature-item">
                    <div class="feature-icon">🎨</div>
                    <div class="feature-text">Access unlimited premium presentation templates</div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">📱</div>
                    <div class="feature-text">Download high-quality graphics and icons</div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">💎</div>
                    <div class="feature-text">Exclusive access to premium content</div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">🎯</div>
                    <div class="feature-text">Priority customer support</div>
                </div>
            </div> --}}

            <p class="message">
                Ready to start creating amazing presentations? Click the button below to explore our premium collection:
            </p>

            <div style="text-align: center;">
                <a href="{{ url('/') }}" class="cta-button">Start Exploring Premium Content</a>
            </div>

            <div class="divider"></div>

            <p class="message">
                <strong>Need Help?</strong> Our premium support team is here to assist you. Feel free to reach out if you have any questions about using our platform or finding the perfect templates for your projects.
            </p>

            <p class="message">
                Thank you for choosing <span class="highlight">SLIDESBUY</span>! We're excited to see the amazing presentations you'll create with our premium resources.
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
