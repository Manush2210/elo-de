@component('mail::message')
    # Nouvelle réservation de consultation

    Une nouvelle réservation a été effectuée.

    ## Détails du client:
    - Nom: {{ $appointment->client_name }}
    - Email: {{ $appointment->client_email }}
    - Téléphone: {{ $appointment->client_phone }}

    ## Détails du rendez-vous:
    - Date: {{ \Carbon\Carbon::parse($appointment->appointment_date)->locale('fr')->isoFormat('LL') }}
    - Heure: {{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }}
    @if ($appointment->consultationType)
        - Type: {{ $appointment->consultationType->name }}
        - Prix: {{ number_format($appointment->consultationType->price, 2) }} €
    @endif

    ## Méthode de contact:
    @if ($appointment->contact_method === 'email')
        Le client souhaite être contacté par **email** à: {{ $appointment->client_email }}
    @elseif($appointment->contact_method === 'whatsapp')
        Le client souhaite être contacté par **WhatsApp** au: {{ $appointment->client_phone }}
    @elseif($appointment->contact_method === 'telephone')
        Le client souhaite être contacté par **téléphone** au: {{ $appointment->client_phone }}
    @else
        - Méthode: {{ $appointment->contact_method }}
    @endif

    ## Méthode de paiement:
    - {{ $appointment->payment_method }}

    @if ($appointment->notes)
        ## Notes du client:
        {{ $appointment->notes }}
    @endif

    La preuve de paiement est jointe à cet email.

    @component('mail::button', ['url' => url('/admin/appointments/' . $appointment->id)])
        Voir le rendez-vous
    @endcomponent
@endcomponent
