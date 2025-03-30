<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'session_id'];

    protected $casts = [
        'images' => 'array',
        'price' => 'decimal:1',
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Récupère le panier actuel de l'utilisateur ou de la session
    public static function getCurrent()
    {
        if (auth()->check()) {
            // Utilisateur connecté
            $cart = self::firstOrCreate(['user_id' => auth()->id()]);
        } else {
            // Visiteur avec session
            $sessionId = session()->getId();
            $cart = self::firstOrCreate(['session_id' => $sessionId]);
        }
        return $cart;
    }

    // Fusionne un panier de session avec un panier utilisateur
    public static function mergeWithUserCart($userId)
    {
        $sessionId = session()->getId();
        $sessionCart = self::where('session_id', $sessionId)->first();

        if (!$sessionCart) return;

        $userCart = self::firstOrCreate(['user_id' => $userId]);

        // Transférer les articles du panier de session au panier utilisateur
        foreach ($sessionCart->items as $item) {
            $existingItem = $userCart->items()
                ->where('product_id', $item->product_id)
                ->first();

            if ($existingItem) {
                $existingItem->update(['quantity' => $existingItem->quantity + $item->quantity]);
            } else {
                $userCart->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price
                ]);
            }
        }

        // Supprimer l'ancien panier de session
        $sessionCart->items()->delete();
        $sessionCart->delete();
    }

    // Normaliser l'ajout de produits pour conserver une structure cohérente
    public static function addProduct($productId, $quantity = 1)
    {
        // Pour utilisateurs authentifiés
        if (auth()->check()) {
            $user = auth()->user();
            $cart = $user->cart ?? self::create(['user_id' => $user->id]);

            $cartItem = $cart->items()->where('product_id', $productId)->first();

            if ($cartItem) {
                $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
            } else {
                $cart->items()->create([
                    'product_id' => $productId,
                    'quantity' => $quantity
                ]);
            }

            return true;
        }

        // Pour visiteurs (panier en session)
        $cart = session()->get('cart', ['items' => []]);

        if(isset($cart['items'][$productId])) {
            $cart['items'][$productId]['quantity'] += $quantity;
        } else {
            $product = Product::findOrFail($productId);
            $cart['items'][$productId] = [
                "id" => $productId,
                "product" => [
                    "id" => $productId,
                    "name" => $product->name,
                    "price" => $product->price,
                    "images" => $product->images
                ],
                "quantity" => $quantity
            ];
        }

        session()->put('cart', $cart);
        return true;
    }
}
