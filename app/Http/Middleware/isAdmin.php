<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
                    $role=!Auth::check() || Auth::user()->role?->id_role;

        if ($role== 90) {
            abort(403, 'Accès interdit : réservé aux administrateurs.');
        }

        return $next($request);
    }
}
