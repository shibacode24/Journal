<!DOCTYPE html>
<html>
<head>
    <title>Thank You for Reviewing</title>
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
        <h2>Manuscript Review Confirmation</h2>
        <p>Dear {{ auth()->user()->first_name }} {{ auth()->user()->first_name }},</p>
        <p>Thank you for taking the time to review the manuscript. Your expertise and insights are invaluable to maintaining the high standards of our journal.</p>

        <p>Your feedback plays a crucial role in the decision-making process, and we greatly appreciate your contribution to the academic community.</p>

        <p>Thank you once again for your efforts.</p>

        <p class="footer">Regards,<br>The Journal Team</p>
    </div>
</body>
</html>
