

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OTP Verification - Slidesbuy</title>
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
        .otp-box {
            background-color: #fff;
            border: 2px solid #3498db;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin: 20px 0;
        }
        .otp-code {
            font-size: 32px;
            font-weight: bold;
            color: #2c3e50;
            letter-spacing: 5px;
            margin: 10px 0;
        }
        .warning {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
            color: #856404;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            color: #666;
        }
        .highlight {
            color: #e74c3c;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Slidesbuy</div>
        </div>
        
        <p>Hi <strong>{{ $userName ?? 'Valued Customer' }}</strong>,</p>
        
        <p>Thank you for choosing Slidesbuy!</p>
        
        <p>To complete your verification, please use the One-Time Password (OTP) below:</p>
        
        <div class="otp-box">
            <p>👉 Your OTP is:</p>
            <div class="otp-code">{{ $otp }}</div>
        </div>
        
        <p>This code is valid for <span class="highlight">2 minutes</span>.</p>
        
        <div class="warning">
            <p><strong>⚠️ Security Notice:</strong></p>
            <p>Please do not share it with anyone for your account's security.</p>
            <p>If you didn't request this, you can safely ignore this email.</p>
        </div>
        
        <div class="footer">
            <p><strong>Best regards,</strong><br>
            <strong>Slidesbuy Team</strong><br>
            <a href="https://slidesbuy.com" style="color: #3498db;">Slidesbuy.com</a></p>
        </div>
    </div>
</body>
</html>

