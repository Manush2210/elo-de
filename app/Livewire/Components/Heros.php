<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\Attributes\Computed;

class Heros extends Component
{
    /**
     * Le numéro de téléphone WhatsApp au format international (sans le '+').
     * Astuce PRO : Pour une meilleure maintenance, stockez-le dans config/services.php
     * et appelez-le avec config('services.whatsapp.phone').
     *
     * @var string
     */
    public string $phoneNumber = '33612345678'; // <-- MODIFIEZ CECI !

    /**
     * La liste des consultations disponibles.
     * La gérer ici permet de la modifier facilement sans toucher à la vue.
     *
     * @var array
     */
    public array $consultations = [
        'Consultation sentimentale',
        'Consultation générale',
        'Consultation amoureuse',
        'Consultation professionnelle',
    ];

    /**
     * La consultation actuellement sélectionnée par l'utilisateur.
     * 'wire:model.live' dans la vue mettra à jour cette propriété en temps réel.
     *
     * @var string
     */
    public string $selectedConsultation = '';

    /**
     * [Propriété Calculée] Génère dynamiquement le lien WhatsApp.
     * Cette méthode est mise en cache et ne s'exécute que si une de ses
     * dépendances ($selectedConsultation, $phoneNumber) change. C'est très performant.
     *
     * @return string
     */
    #[Computed]
    public function whatsappLink(): string
    {
        // Si aucune consultation n'est choisie, le lien est non fonctionnel.
        if (empty($this->selectedConsultation)) {
            return '#';
        }

        // Message qui sera pré-rempli dans la discussion WhatsApp.
        $message = sprintf(
            "Bonjour, je suis intéressé(e) par une \"%s\" et j'aimerais prendre rendez-vous.",
            $this->selectedConsultation
        );

        // On encode le message pour qu'il soit valide dans une URL.
        $encodedMessage = urlencode($message);

        // On construit et retourne le lien final.
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
