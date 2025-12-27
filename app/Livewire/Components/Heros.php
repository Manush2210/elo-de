<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\Computed;

class Heros extends Component
{
    /**
     * Die WhatsApp-Telefonnummer im internationalen Format (ohne '+').
     * PRO-Tipp: Für bessere Wartbarkeit speichern Sie sie in config/services.php
     * und rufen Sie sie mit config('services.whatsapp.phone') auf.
     *
     * @var string
     */
    public string $phoneNumber = '33612345678'; // <-- MODIFIEZ CECI !

    /**
     * Die Liste der verfügbaren Beratungen.
     * Sie hier zu verwalten ermöglicht es, sie leicht zu modifizieren, ohne die Ansicht zu beünflusst.
     *
     * @var array
     */
    public array $consultations = [
        'Beratung in Herzensangelegenheiten',
        'Allgemeine Beratung',
        'Liebesberatung',
        'Berufsberatung',
    ];

    /**
     * Die derzeit vom Benutzer ausgewählte Beratung.
     * 'wire:model.live' in der Ansicht aktualisiert diese Eigenschaft in Echtzeit.
     *
     * @var string
     */
    public string $selectedConsultation = '';

    /**
     * [Berechnete Eigenschaft] Generiert dynamisch den WhatsApp-Link.
     * Diese Methode wird zwischengespeichert und wird nur ausgeführt, wenn eine ihrer
     * Abhängigkeiten ($selectedConsultation, $phoneNumber) sich ändert. Das ist sehr effizient.
     *
     * @return string
     */
    #[Computed]
    public function whatsappLink(): string
    {
        // Wenn keine Beratung ausgewählt ist, ist der Link nicht funktionsfähig.
        if (empty($this->selectedConsultation)) {
            return '#';
        }

        // Nachricht, die in der WhatsApp-Konversation vorausgefüllt wird.
        $message = sprintf(
            "Hallo, ich bin an einer \"%s\" interessiert und möchte einen Termin vereinbaren.",
            $this->selectedConsultation
        );

        // Wir codieren die Nachricht, damit sie in einer URL gültig ist.
        $encodedMessage = urlencode($message);

        // Wir erstellen und geben den endgültigen Link zurück.
        return "https://wa.me/{$this->phoneNumber}?text={$encodedMessage}";
    }

    /**
     * Render the Livewire view for the hero component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.components.heros');
    }
}
