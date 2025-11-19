<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Vérification du rôle
            if (Auth::user()->role?->id_role == 90) {
                return redirect()->route('admin.dashboard');
            }

            if (Auth::user()->role?->id_role ==60) {
                return redirect()->route('gestion.dashboard');
            }

            return redirect()->route('accueil');
        }

        return back()->with('error', 'Email ou mot de passe incorrect.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('accueil');
    }
}
