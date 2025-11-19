<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role?->code !== 'ADM') {
            abort(403, 'Accès interdit : réservé aux administrateurs.');
        }

        return $next($request);
    }
}
