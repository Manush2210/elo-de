<?php

namespace App\Livewire\Pages;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $cart = [];
    public $cartItems = [];
    public $subtotal = 0;
    public $shipping = 7.99;
    public $free_shipping_threshold = 130.00;
    public $total = 0;

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        if (Auth::check()) {
            // Utilisateur connecté: obtenir le panier depuis la BD
            $user = Auth::user();
            if ($user->cart) {
                $this->cartItems = [];
                $items = $user->cart->items()->with('product')->get();

                foreach ($items as $item) {
                    $this->cartItems[$item->product_id] = [
                        'id' => $item->product_id,
                        'product' => [
                            'id' => $item->product_id,
                            'name' => $item->product->name,
                            'price' => $item->product->price,
                            'images' => $item->product->images
                        ],
                        'quantity' => $item->quantity
                    ];
                }
            } else {
                $this->cartItems = [];
            }
        } else {
            // Visiteur: obtenir depuis la session
            $sessionCart = session()->get('cart', ['items' => []]);
            $this->cartItems = $sessionCart['items'] ?? [];
        }

        // Calculer les totaux
        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        $this->subtotal = 0;
        foreach ($this->cartItems as $item) {
            $this->subtotal += $item['product']['price'] * $item['quantity'];
        }

        $this->shipping = $this->subtotal >= $this->free_shipping_threshold ? 0 : $this->shipping;
        $this->total = $this->subtotal + $this->shipping;
    }

    public function updateQuantity($productId, $quantity)
    {
        $quantity = (int)$quantity;
        if ($quantity <= 0) {
            $this->removeItem($productId);
            return;
        }

        if (Auth::check()) {
            // Utilisateur connecté: mettre à jour en BD
            $user = Auth::user();
            if ($user->cart) {
                $cartItem = $user->cart->items()->where('product_id', $productId)->first();
                if ($cartItem) {
                    $cartItem->update(['quantity' => $quantity]);
                }
            }
        } else {
            // Visiteur: mettre à jour en session
            $cart = session()->get('cart', ['items' => []]);

            if (isset($cart['items'][$productId])) {
                $cart['items'][$productId]['quantity'] = $quantity;
                session()->put('cart', $cart);
            }
        }

        $this->updateCart();
        $this->dispatch('cartUpdated');
    }

    public function removeItem($productId)
    {
        if (Auth::check()) {
            // Utilisateur connecté: supprimer de la BD
            $user = Auth::user();
            if ($user->cart) {
                $user->cart->items()->where('product_id', $productId)->delete();
            }
        } else {
            // Visiteur: supprimer de la session
            $cart = session()->get('cart', ['items' => []]);

            if (isset($cart['items'][$productId])) {
                unset($cart['items'][$productId]);
                session()->put('cart', $cart);
            }
        }

        $this->updateCart();
        $this->dispatch('cartUpdated');
        $this->dispatch('showToast', [
            'message' => 'Produit retiré du panier',
            'type' => 'success'
        ]);
    }

    public function clearCart()
    {
        if (Auth::check()) {
            // Utilisateur connecté: vider le panier en BD
            $user = Auth::user();
            if ($user->cart) {
                $user->cart->items()->delete();
            }
        } else {
            // Visiteur: vider le panier en session
            session()->forget('cart');
        }

        $this->updateCart();
        $this->dispatch('cartUpdated');
        $this->dispatch('showToast', [
            'message' => 'Panier vidé',
            'type' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.pages.cart');
    }
}
