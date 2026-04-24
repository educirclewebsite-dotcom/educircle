<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Inquiry</title>
</head>
<body>
    <h2>New Inquiry Received</h2>

    <p><strong>Name:</strong> {{ $lead->name }}</p>
    <p><strong>Email:</strong> {{ $lead->email }}</p>
    <p><strong>Contact Number:</strong> {{ $lead->contact_number }}</p>
    <p><strong>WhatsApp:</strong> {{ $lead->whatsapp_number }}</p>
    <p><strong>Subject:</strong> {{ $lead->subject }}</p>

    <p><strong>Message:</strong></p>
    <p>{{ $lead->message }}</p>

    <hr>
    <p>This email was sent from the Educircle.io website inquiry form.</p>
</body>
</html>
