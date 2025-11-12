<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Pay::all(); // utilisation du modèle
        return view('pays', compact('pays'));
    }

    public function store(Request $request)
    {
        $genre = Pay::create($request->all());
        return redirect()->route('payss');
    }
    
    
}
