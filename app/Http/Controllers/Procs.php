<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pay;
use App\Models\Role;
use App\Models\Genre;
use App\Models\User; // pour gérer les engager liés aux rôles

class Procs extends Controller
{
    /* --------------------------------------------- */
    /*  FORMULAIRES GÉNÉRIQUES                        */
    /* --------------------------------------------- */
    public function FormulaireAjout(Request $request)
    {
        $choix = $request->segment(1);

        $viewMapping = [
            'pay' => 'pay.ajout',
            'role' => 'role.ajout',
            'genre' => 'genre.ajout',
        ];

        if (array_key_exists($choix, $viewMapping)) {
            $viewPath = $viewMapping[$choix];
            if (view()->exists($viewPath)) {
                return view($viewPath);
            }
        }

        abort(404, "Formulaire non trouvé");
    }

    /* --------------------------------------------- */
    /*  PAYS                                         */
    /* --------------------------------------------- */
    public function createPay(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:pays,code',
            'nom' => 'required|string|max:255',
            'commentaire' => 'nullable|string',
        ]);

        Pay::create($validated);

        return redirect()->route('pay.ajout.form')
            ->with('success', 'Pays ajouté avec succès !');
    }

    public function editPay($pay): View
    {
        $payModel = Pay::findOrFail($pay);
        return view('pay.edit', compact('payModel'));
    }

    public function MajPay(Request $request, $pay)
    {
        $payModel = Pay::findOrFail($pay);
        $payModel->update($request->only(['code', 'nom', 'commentaire']));

        return redirect()->route('pays')
            ->with('success', 'Pays mis à jour avec succès');
    }

    public function SuppPay($pay)
    {
        $payModel = Pay::findOrFail($pay);
        $payModel->delete();

        return redirect()->route('pays')
            ->with('success', 'Pays supprimé avec succès');
    }

    /* --------------------------------------------- */
    /*  ROLE                                         */
    /* --------------------------------------------- */
    public function createRole(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:roles,code',
            'nom' => 'required|string|max:255',
            'commentaire' => 'nullable|string',
        ]);

        Role::create($validated);

        return redirect()->route('role.ajout.form')
            ->with('success', 'Rôle ajouté avec succès !');
    }

    public function editRole($role): View
    {
        $roleModel = Role::findOrFail($role);
        return view('role.edit', compact('roleModel'));
    }

    public function MajRole(Request $request, $role)
    {
        $roleModel = Role::findOrFail($role);

        $validated = $request->validate([
            'code' => 'required|string|max:10|unique:roles,code,' . $role,
            'nom' => 'required|string|max:255',
            'commentaire' => 'nullable|string',
        ]);

        $roleModel->update($validated);

        return redirect()->route('roles')
            ->with('success', 'Rôle mis à jour avec succès');
    }

    /**
     * Suppression d'un rôle avec choix pour les engager
     */
    public function SuppRole(Request $request, $role)
{
    $roleModel = Role::findOrFail($role);

    // Compter les engager liés via la relation HasMany
    $utilisateursCount = $roleModel->engager()->count();

    // Si aucune action n'a été choisie, afficher le formulaire
    if (!$request->has('action')) {
        return view('role.confirmation', [
            'roleModel' => $roleModel,
            'utilisateursCount' => $utilisateursCount
        ]);
    }

    switch ($request->input('action')) {
        case 'delete_users':
            foreach ($roleModel->engager as $user) {
                $user->delete();
            }
            $roleModel->delete();
            return redirect()->route('roles')
                ->with('success', 'Rôle et engager supprimés avec succès.');

        case 'keep_users':
            foreach ($roleModel->engager as $user) {
                $user->id_role = null; // ou role_id selon ta table
                $user->save();
            }
            $roleModel->delete();
            return redirect()->route('roles')
                ->with('success', 'Rôle supprimé, les engager restent sans rôle.');

        case 'cancel':
        default:
            return redirect()->route('roles')
                ->with('info', 'Suppression annulée.');
    }
}


    /* --------------------------------------------- */
    /*  GENRE                                        */
    /* --------------------------------------------- */
    public function createGenre(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:1|unique:genres,code',
            'nom' => 'required|string|max:255',
            'commentaire' => 'nullable|string',
        ]);

        Genre::create($validated);

        return redirect()->route('genre.ajout.form')
            ->with('success', 'Genre ajouté avec succès !');
    }

    public function editGenre(Genre $genre): View
    {
        return view('genre.edit', compact('genre'));
    }

    public function MajGenre(Request $request, Genre $genre)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:1|unique:genres,code,' . $genre->id,
            'nom' => 'required|string|max:255',
            'commentaire' => 'nullable|string|max:500',
        ]);

        $genre->update($validated);

        return redirect()->route('genre')
            ->with('success', 'Genre mis à jour avec succès');
    }

    public function SuppGenre(Genre $genre)
    {
        if ($genre->engager()->count() > 0) {
            return redirect()->route('genre')
                ->with('error', 'Impossible de supprimer ce genre, il est utilisé par des engager.');
        }

        $genre->delete();

        return redirect()->route('genre')
            ->with('success', 'Genre supprimé avec succès');
    }
}
