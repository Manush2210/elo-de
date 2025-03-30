<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            // Mises à jour lorsqu'un utilisateur se connecte
            $this->syncCartWithSession();

            session()->flash('message', 'Connexion réussie!');
            return $this->redirect(route('home'));
        }

        $this->addError('email', 'Les informations fournies ne correspondent pas à nos dossiers.');
    }

    // Synchronise le panier de session avec le panier utilisateur enregistré
    protected function syncCartWithSession()
    {
        // Si l'utilisateur a un panier en session
        if (session()->has('cart')) {
            $sessionCart = session('cart');

            // Récupérer ou créer le panier utilisateur
            $userCart = Auth::user()->cart ?? Cart::create(['user_id' => Auth::id()]);

            // Migrer les articles du panier de session vers le panier utilisateur
            foreach ($sessionCart['items'] as $item) {
                $existingItem = $userCart->items()->where('product_id', $item['id'])->first();

                if ($existingItem) {
                    $existingItem->update(['quantity' => $item['quantity']]);
                } else {
                    $userCart->items()->create([
                        'product_id' => $item['id'],
                        'quantity' => $item['quantity']
                    ]);
                }
            }

            // Mettre à jour le panier de session avec le panier utilisateur
            $this->dispatch('cartUpdated');
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('components.layouts.app');
    }
}
