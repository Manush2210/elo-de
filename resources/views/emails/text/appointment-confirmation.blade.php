Bestätigung Ihres Termins\n\nHallo {{ $appointment->client_name }},\n\nIhr Termin ist bestätigt für
{{ \Carbon\Carbon::parse($appointment->appointment_date)->locale('de')->isoFormat('LL') }} um
{{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }}.\n\nDetails:\n- Typ:
{{ $appointment->consultationType->name ?? 'N/A' }}\n- Preis:
{{ number_format($appointment->consultationType->price ?? 0, 2) }} €\n\nWenn Sie Fragen haben, antworten Sie auf diese
E-Mail.\n\nMit freundlichen Grüßen,\nVoyance Spirituelle Expert
