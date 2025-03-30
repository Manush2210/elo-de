<?php
// app/Http/Middleware/SyncCart.php
namespace App\Http\Middleware;

use Closure;
use App\Models\Cart;

class SyncCart
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && session()->has('cart_merged') === false) {
            // Fusionner les paniers
            Cart::mergeWithUserCart(auth()->id());
            session()->put('cart_merged', true);
        }

        return $next($request);
    }
}
