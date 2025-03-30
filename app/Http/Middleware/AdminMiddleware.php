<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        if (Auth::check()) {
            // L'utilisateur est connecté mais n'est pas admin
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Vous devez être administrateur pour accéder à cette section.');
        }

        // L'utilisateur n'est pas connecté
        return redirect()->route('admin.login');
    }
}
