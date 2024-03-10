<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 150px;
        }
        .content {
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('https://youcode-evento/storage/logo.png') }}" alt="Logo">
        </div>
        <div class="content">
            <h2>Reset Password</h2>
            <p>Hello,</p>
            <p>You are receiving this email because we received a password reset request for your account.</p>
            <p>Your verification code is :</p>
            <p>
                <a class="button">{{ session('token') }}</a>
            </p>
            <p>If you did not request a password reset, no further action is required.</p>
            <p>Regards,</p>
            <p>Your Company</p>
        </div>
    </div>
</body>
</html>