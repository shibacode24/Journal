<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Complete</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f06a58;
            color: #333;
        }

        .message-box {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .message-box h1 {
            color: #f30c18;
            margin-bottom: 20px;
        }

        .message-box p {
            font-size: 16px;
            color: #666;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border: 2px solid #db3434;
            /* Border color */
            color: #dd3d3d;
            /* Text color */
            background-color: #fff;
            /* Background color */
            border-radius: 4px;
            /* Rounded corners */
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
            /* Smooth transition */
        }

        .button:hover {
            background-color: #db3434;
            /* Background color on hover */
            color: #fff;
            /* Text color on hover */
            border-color: #db3434;
            /* Border color on hover */
        }
    </style>
</head>

<body>
    <div class="message-box">
        <h1>Task Complete</h1>
        <p>Has the given task been successfully completed?</p>
        <a href="{{ route('check_login_mail', ['token' => $data['_token']]) }}"><button class="button">Login</button></a>
    </div>
</body>

</html>
