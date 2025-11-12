<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Role::all(); // utilisation du modèle
        return view('roles', compact('roles'));
    }

    public function store(Request $request)
    {
        $genre = Role::create($request->all());
        return redirect()->route('roles');
    }
    
}
