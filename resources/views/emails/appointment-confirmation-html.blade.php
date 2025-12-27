<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bestätigung Ihres Termins</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background:#f7fafc; color:#374151; margin:0; padding:0 }
        .container { max-width:680px; margin:24px auto; background:white; border-radius:8px; overflow:hidden; box-shadow:0 8px 30px rgba(16,24,40,.08) }
        .header { background:linear-gradient(90deg,#4f46e5,#7c3aed); padding:28px; color:white }
        .logo { font-weight:700; font-size:20px }
        .content { padding:28px }
        h1 { margin:0 0 12px; font-size:20px; color:#111827 }
        p { margin:0 0 12px; line-height:1.6 }
        .meta { background:#f3f4f6; padding:12px; border-radius:6px; margin:12px 0 }
        .btn { display:inline-block; background:#4f46e5; color:white; padding:10px 16px; border-radius:8px; text-decoration:none }
        .footer { font-size:13px; color:#6b7280; padding:18px; text-align:center }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Voyance Spirituelle Expert</div>
        </div>
        <div class="content">
            <h1>Ihr Termin ist bestätigt</h1>

            <p>Hallo <strong>{{ $appointment->client_name }}</strong>,</p>

            <p>Vielen Dank für Ihre Reservierung. Hier ist eine Zusammenfassung Ihres Termins:</p>

            <div class="meta">
                <p><strong>Datum:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->locale('de')->isoFormat('LL') }}</p>
                <p><strong>Uhrzeit:</strong> {{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($appointment->end_time)->format('H:i') }}</p>
                @if ($appointment->consultationType)
                    <p><strong>Typ:</strong> {{ $appointment->consultationType->name }} — {{ number_format($appointment->consultationType->price, 2) }} €</p>
                @endif
                <p><strong>Kontaktmethode:</strong>
                    @if ($appointment->contact_method === 'email')
                        Email ({{ $appointment->client_email }})
                    @elseif($appointment->contact_method === 'whatsapp')
                        WhatsApp ({{ $appointment->client_phone }})
                    @else
                        Telefon ({{ $appointment->client_phone }})
                    @endif
                </p>
            </div>

            @if ($appointment->notes)
                <p><strong>Gesendete Notizen:</strong></p>
                <p>{{ $appointment->notes }}</p>
            @endif

            <p>Wenn Sie Fragen haben oder Ihren Termin ändern möchten, können Sie direkt auf diese Nachricht antworten.</p>

            <p style="margin-top:18px">
                <a class="btn" href="{{ url('/') }}">Website besuchen</a>
            </p>

            <p style="margin-top:18px; color:#6b7280; font-size:13px">Vielen Dank für Ihr Vertrauen,<br>Voyance Spirituelle Expert</p>
        </div>
        <div class="footer">Wenn Sie diese Reservierung nicht vorgenommen haben, kontaktieren Sie uns sofort unter contact@sanni-sterne.com</div>
    </div>
</body>
</html>
