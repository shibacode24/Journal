<!DOCTYPE html>
<html>
<head>
    <title>Assigned Menuscript</title>
</head>
<body>
    <h5>Assigned Menuscript</h6>
    <p>Dear {{ $get_user_data['first_name'] }} {{ $get_user_data['last_name'] }},</p>
    <p>Script Title : {{ $data['menuscript_title'] }}</p>
    <p>Menuscript has been assigned to you.</p>

    <p>Thank you.</p>
    <p>Regards,<br>Journal</p>
</body>
</html>