<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use Illuminate\Http\Request;

class PaysController extends Controller
{
    public function index()
    {
        $pays = Pay::all();
        return view('pays', compact('pays'));
    }
    
    public function create()
    {
        return view('pay.ajout');
    }
    
    public function store(Request $request)
    {
        // Validation avec le code
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:pays,code', // Vérifie l'unicité
            'nom' => 'required|string|max:255',
            'commentaire' => 'nullable|string'
        ]);
        
        // Création avec le code
        Pay::create([
            'code' => $validated['code'],
            'nom' => $validated['nom'],
            'commentaire' => $validated['commentaire']
        ]);
        
        return redirect()->route('pay.ajout')
                         ->with('success', 'Pays ajouté avec succès !');
    }
}