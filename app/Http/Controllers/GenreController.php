<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all(); // utilisation du modèle
        return view('genres', compact('genres'));
    }

    public function store(Request $request)
    {
        $genre = Genre::create($request->all());
        return redirect()->route('genres');
    }
    public function SuppGenre(Genre $genre)
{
    if ($genre->utilisateurs()->count() > 0) {
        return redirect()->route('genre')
            ->with('error', 'Impossible de supprimer ce genre, il est utilisé par des utilisateurs.');
    }

    $genre->delete();
    return redirect()->route('genre')->with('success', 'Genre supprimé avec succès');
}

    
}
