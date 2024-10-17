{{-- <html>

<head>

</head>

<body>
    <p> Dear <b>{{ auth()->user()->name }}</b>,<br>
        *This mail is generated automatically.<br>
        Thank you for submitting the menuscript.<br>
    
        Kind Regards,<br><br>
        Journal<br>
    </p>
</body>

</html> --}}


{{-- <!DOCTYPE html>
<html>
<head>
    <title>Menuscript Submitted</title>
</head>
<body>
    <h5>Menuscript Submission Confirmation</h6>
    <p>Dear {{ auth()->user()->first_name }} {{ auth()->user()->last_name }},</p>
    <p>Your menuscript has been successfully submitted.</p>

    <p>Thank you for your submission.</p>
    <p>Regards,<br>Journal</p>
</body>
</html> --}}

<!DOCTYPE html>
<html>
<head>
    <title>Manuscript Re-submission Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .content {
            margin: 20px;
        }
        .footer {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="content">
        <h5>Manuscript re-submission Confirmation</h5>
        <p>Dear {{ auth()->user()->first_name }} {{ auth()->user()->last_name }},</p>
        <p>Your manuscript has been successfully re-submitted.</p>

        <p>Thank you for your submission.</p>

        <p class="footer">Kind Regards,<br>Journal</p>
    </div>
</body>
</html>
