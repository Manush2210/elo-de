<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class SingleProduct extends Component
{
    public $product;
    public $quantity = 1;

    public function mount($slug)
    {
        $this->product = \App\Models\Product::where('slug', $slug)->firstOrFail();

        // Si le produit n'est pas actif, redirigez vers la page d'accueil
        if (!$this->product->is_active) {
            return redirect()->route('home');
        }

    }

    public function addToCart()
    {
        // Ajoute la logique d'ajout au panier ici
        session()->flash('message', 'Produit ajouté au panier.');
    }

    public function render()
    {
        return view('livewire.pages.single-product');
    }
}
