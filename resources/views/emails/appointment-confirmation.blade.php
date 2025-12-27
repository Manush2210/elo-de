@component('mail::message')
    # Bestätigung Ihres Termins

    Hallo {{ $appointment->client_name }},

    Wir bestätigen Ihren Privatkonsulatationstermin für
    **{{ \Carbon\Carbon::parse($appointment->appointment_date)->locale('de')->isoFormat('LL') }}** um
    **{{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }}**.

    ## Termindetails:
    - Datum: {{ \Carbon\Carbon::parse($appointment->appointment_date)->locale('de')->isoFormat('LL') }}
    - Uhrzeit: {{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }}
    - Dauer: 1 Stunde
    @if ($appointment->consultationType)
        - Typ: {{ $appointment->consultationType->name }}
        - Preis: {{ number_format($appointment->consultationType->price, 2) }} €
    @endif

    ## Bankdaten:
    @if ($bankAccount)
        - Bank: {{ $bankAccount->bank }}
        - Kontoinhaber: {{ $bankAccount->owner }}
        - IBAN: {{ $bankAccount->iban }}
        - BIC/SWIFT: {{ $bankAccount->swift }}
        - Adresse: {{ $bankAccount->address }}
        - Land: {{ $bankAccount->country }}
    @endif

    ## Kontaktmethode:
    @if ($appointment->contact_method === 'email')
        Sie werden per **E-Mail** unter folgender Adresse kontaktiert: {{ $appointment->client_email }}
    @elseif($appointment->contact_method === 'whatsapp')
        Sie werden per **WhatsApp** unter folgender Nummer kontaktiert: {{ $appointment->client_phone }}
    @elseif($appointment->contact_method === 'telephone')
        Sie werden per **Telefon** unter folgender Nummer kontaktiert: {{ $appointment->client_phone }}
    @else
        Gewählte Methode: {{ $appointment->contact_method }}
    @endif

    ## Vorbereitung:
    - Sorgen Sie für einen ruhigen und ablenkungsfreien Ort für Ihre Konsultation
    - Notieren Sie sich vorher die Fragen, die Sie am meisten beschäftigen
    - Seien Sie einige Minuten vor Ihrem Termin verfügbar

    Vielen Dank für Ihr Vertrauen,

    Das Team von Elodie Voyance
@endcomponent
