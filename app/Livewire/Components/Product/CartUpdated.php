<?php

namespace App\Livewire\Components\Product;

use Livewire\Component;
use Livewire\Attributes\On;

class CartUpdated extends Component
{
    public $show = false;
    public $message = '';
    public $type = 'success'; // 'success' or 'error'
    public $autoClose = true;
    public $autoCloseDelay = 5000; // 5 seconds

    public function mount($message = null, $type = 'success', $autoClose = true, $autoCloseDelay = 5000)
    {
        $this->message = $message;
        $this->type = $type;
        $this->autoClose = $autoClose;
        $this->autoCloseDelay = $autoCloseDelay;

        if ($message) {
            $this->show = true;
        }
    }

    #[On('showToast')]
    public function showToast($payload)
    {
        // Pour accepter le format que vous utilisez dans Navbar.php
        if (is_array($payload) && isset($payload['message'])) {
            $this->message = $payload['message'];
            $this->type = $payload['type'] ?? 'success';
        } else {
            // Garder la compatibilité avec l'ancien format
            $this->message = $payload;
            $this->type = func_get_arg(1) ?? 'success';
        }

        $this->show = true;

        // Dispatcher un événement pour mettre à jour le panier dans d'autres composants
        $this->dispatch('cartUpdated');

        if ($this->autoClose) {
            $this->dispatch('closeToastAfterDelay', $this->autoCloseDelay);
        }
    }

    public function closeToast()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.components.product.cart-updated');
    }
}
