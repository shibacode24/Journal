<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            background-color: #5b4ce2;
            color: white;
            padding: 10px 0;
            border-radius: 10px 10px 0 0;
        }
        .content {
            padding: 20px;
        }
        .button {
            display: inline-block;
            background-color: #e4e4eb;
            color: #5b4ce2;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to Our Pratibha Journal!</h1>
        </div>
        <div class="content">
            <p>Hi <strong>{{$data['firstname']}} {{$data['lastname']}}</strong>,</p>
            <p>Thank you for registering on our website. We are excited to have you with us!</p>
            <p>Your login details are as follows:</p>
            <ul>
                <li><strong>User ID:</strong> {{$data['email']}}</li>
                <li><strong>Password:</strong> {{$data['password']}}</li>
            </ul>
            <p>You can log in to your account by clicking the button below:</p>
            <p><a href="http://localhost/journal/website_login" class="button">Login to Your Account</a></p>
            <p>If you have any questions or need assistance, feel free to contact our support team.</p>
            <p>Best regards,<br>The Pratibha International Interdisciplinary Journal Team</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Our Website. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
