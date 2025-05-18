<!DOCTYPE html>
<html>

<head>
    <title>Nouveau message de contact</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2>Nouveau message de contact</h2>
        <p><strong>Nom:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Message:</strong></p>
        <p style="background: #f5f5f5; padding: 15px; border-radius: 5px;">{{ $messageContent }}</p>
    </div>
</body>

</html>
