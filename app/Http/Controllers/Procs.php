<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pay;
use App\Models\Role;
use App\Models\Genre;
class Procs extends Controller
{
    public function FormulaireAjout(Request $request)
    {
        // Récupère le choix depuis l'URL (pay, role, genre, etc.)
        $choix = $request->segment(1); // Prend le premier segment de l'URL
        
        // Mapping des entités vers leurs vues
        $viewMapping = [
            'pay' => 'pay.ajout',
            'role' => 'role.ajout',
            'genre' => 'genre.ajout',
        ];
        
        // Vérifie si l'choix existe dans le mapping
        if (array_key_exists($choix, $viewMapping)) {
            $viewPath = $viewMapping[$choix];
            
            if (view()->exists($viewPath)) {
                return view($viewPath);
            }
        }
        
        abort(404, "Formulaire non trouvé");
    }
    
    // Vos méthodes existantes...

    public function createPay(Request $request)
{
    $validated = $request->validate([
        'code' => 'required|string|max:10|unique:pays,code',
        'nom' => 'required|string|max:255',
        'commentaire' => 'nullable|string',
        `created_at`=> now(),
        `updated_at`=> now(),
    ]);
    
    Pay::create($validated);
    
    return redirect()->route('pay.ajout')
                     ->with('success', 'Pays ajouté avec succès !');
}
    public function editPay($pay):View
    {
        $payModel = Pay::findOrFail($pay);
        return view('pay.edit', compact('payModel'));
    }

    public function MajPay(Request $request, $pay)
    {
        $payModel = Pay::findOrFail($pay);
        $payModel->update($request->only(['code','nom', 'commentaire']));
        return redirect()->route('pays')->with('success', 'Pays mis à jour avec succès');
    }

    public function SuppPay($pay)
    {
        $payModel = Pay::findOrFail($pay);
        $payModel->delete();
        return redirect()->route('pays')->with('success', 'Pays supprimé avec succès');
    }
    public function createRole(Request $request)
{
    $validated = $request->validate([
        'code' => 'required|string|max:10|unique:roles,id',
        'nom' => 'required|string|max:255',
        'commentaire' => 'nullable|string'
    ]);
    
    Role::create($validated);
    
    return redirect()->route('role.ajout.form')
                     ->with('success', 'Rôle ajouté avec succès !');
}

    public function editRole($role):View
    {
        $roleModel = Role::findOrFail($role);
        return view('role.edit', compact('roleModel'));
    }
    public function MajRole(Request $request, $role)
    {
        $roleModel = Role::findOrFail($role);
        $roleModel->update($request->only(['code','nom', 'commentaire']));
        return redirect()->route('roles')->with('success', 'Rôle mis à jour avec succès');
    }
    public function SuppRole($role)
    {
        $roleModel = Role::findOrFail($role);
        $roleModel->delete();
        return redirect()->route('roles')->with('success', 'Rôle supprimé avec succès');
    }
    public function createGenre(Request $request)
{
    $validated = $request->validate([
        'code' => 'required|string|max:1|unique:genres,code',
        'nom' => 'required|string|max:255',
        'commentaire' => 'nullable|string'
    ]);
    
    Genre::create($validated);
    
    return redirect()->route('genre.ajout.form')
                     ->with('success', 'Genre ajouté avec succès !');
}
    // Afficher le formulaire d'édition
    public function editGenre(Genre $genre): View
    {
        return view('genre.edit', compact('genre'));
    }

    // Mettre à jour le genre
    public function MajGenre(Request $request, Genre $genre)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'commentaire' => 'nullable|string|max:500',
        ]);

        $genre->update($validated);

        return redirect()->route('genre')->with('success', 'Genre mis à jour avec succès');
    }

    // C'est pour supp un genre
    public function SuppGenre(Genre $genre)
{
    // Vérifie si y'a des utilisateurs de ce genre avant de supprimer
    if ($genre->utilisateurs()->count() > 0) {
        return redirect()->route('genre')
            ->with('error', 'Impossible de supprimer ce genre, il est utilisé par des utilisateurs.');
    }

    $genre->delete();

    return redirect()->route('genre')->with('success', 'Genre supprimé avec succès');
}
}
