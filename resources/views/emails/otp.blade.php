<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .logo {
            margin-bottom: 30px;
        }

        .logo img {
            max-height: 40px;
        }

        .content {
            color: #555555;
            line-height: 1.6;
            font-size: 16px;
        }

        .otp-code {
            font-size: 48px;
            font-weight: bold;
            color: #83bb40;
            /* EduCircle Green */
            margin: 20px 0;
            letter-spacing: 2px;
        }

        .footer {
            margin-top: 40px;
            border-top: 1px solid #eeeeee;
            padding-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #999999;
        }

        .footer-icons {
            margin-bottom: 15px;
        }

        .footer-icons img {
            height: 24px;
            margin: 0 5px;
            opacity: 0.6;
        }

        .footer-address {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="{{ $message->embed(public_path('home_new/images/logo.png')) }}" alt="Educircle Logo">
        </div>

        <div class="content">
            <h2 style="color: #333; margin-top: 0;">Hey!</h2>
            <p>Use the following one-time password (OTP) to sign in to your Educircle Student account.<br>
                This OTP will be valid for 30 minutes.</p>

            <div class="otp-code">
                {{ $otpCode }}
            </div>

            <p><strong>Regards,<br>
                    Educircle Team</strong><br>
                <a href="https://www.educircle.io" style="color: #555; text-decoration: none;">www.educircle.io</a>
            </p>
        </div>

        <div style="text-align: center; margin: 20px 0;">
            <img src="{{ $message->embed(public_path('home_new/images/email_footer.png')) }}" alt="Footer Design"
                style="max-width: 100%; height: auto;">
        </div>

        <div class="footer">
            <div class="footer-icons">
                <!-- Placeholder for icons if needed, can add social media links -->
            </div>
            <div class="footer-address">
                <p>India : Level 3, Landmark Cyber Park, Space Creattors Heights, Sector 67, Gurugram, Haryana 122101
                </p>
                <p>Australia: 1601, 265 Exhibition st, Melbourne 3000</p>
            </div>
        </div>
    </div>
</body>

</html>