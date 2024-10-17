<!DOCTYPE html>
<html>
<head>
    <title>Withdrawal Menuscript</title>
</head>
<body>
    <h5>Withdrawal Menuscript</h6>
    <p>Dear {{ auth()->user()->first_name }} {{ auth()->user()->last_name }},</p>
    <p>Script Title : {{ $data['menuscript_title'] }}</p>
    <p>Your menuscript has been successfully withdraw.</p>

    <p>Thank you.</p>
    <p>Regards,<br>Journal</p>
</body>
</html>