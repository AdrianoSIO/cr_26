<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifierAdministrateurOuGestionnaire
{
    /**
     * Autorise uniquement les administrateurs et les gestionnaires à accéder à la ressource.
     */
    public function handle(Request $request, Closure $next)
    {
        if (
            Auth::check() && 
            (Auth::user()->role === 'administrateur' || Auth::user()->role === 'gestionnaire')
        ) {
            // Accès autorisé
            return $next($request);
        }
        // Accès refusé
        abort(403, "Vous n'avez pas les autorisations nécessaires pour accéder à cette page.");
    }
}