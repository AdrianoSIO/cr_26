<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pay;
use App\Models\Genre;
use App\Models\Role;
use App\Models\Utilisateur;
use App\Models\User; // pour gérer les engagers liés aux rôles

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
     * Suppression d'un rôle avec choix pour les engagers
     */
    public function SuppRole(Request $request, $role)
{
    $roleModel = Role::findOrFail($role);

    // Compter les engagers liés
    $utilisateursCount = $roleModel->engagers()->count();

    // Si aucune action n'a été choisie, afficher le formulaire
    if (!$request->has('action')) {
        return view('role.confirmation', [
            'roleModel' => $roleModel,
            'utilisateursCount' => $utilisateursCount  // <-- nom harmonisé
        ]);
    }

    switch ($request->input('action')) {
        case 'delete_users':
            // Supprimer tous les engagers liés à ce rôle
            \App\Models\Engager::where('id_role', $roleModel->id)->delete();

            // Supprimer le rôle
            $roleModel->delete();

            return redirect()->route('roles')
                ->with('success', 'Rôle et utilisateurs supprimés avec succès.');

        case 'keep_users':
            // Laisser les engagers mais dissocier le rôle
            \App\Models\Engager::where('id_role', $roleModel->id)
                ->update(['id_role' => null]);

            // Supprimer le rôle
            $roleModel->delete();

            return redirect()->route('roles')
                ->with('success', 'Rôle supprimé, les utilisateurs restent sans rôle.');

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
    public function SuppGenre(Request $request, $genreId)
{
    $genre = Genre::findOrFail($genreId);

    // Récupérer les utilisateurs liés à ce genre
    $userIds = Utilisateur::where('code_genre', $genre->code)->pluck('id');
    $utilisateursCount = $userIds->count();

    // Afficher le formulaire de confirmation si aucune action n'a été choisie
    if (!$request->has('action')) {
        return view('genre.confirmation', [
            'genreModel' => $genre,
            'utilisateursCount' => $utilisateursCount
        ]);
    }

    switch ($request->input('action')) {

        case 'delete_users':
            // Supprimer d'abord les engagers liés à ces utilisateurs
            \App\Models\Engager::whereIn('id_utilisateur', $userIds)->delete();

            // Supprimer les utilisateurs
            Utilisateur::whereIn('id', $userIds)->delete();

            // Supprimer le genre
            $genre->delete();

            return redirect()->route('genre.ajout.form')
                ->with('success', 'Genre et utilisateurs supprimés avec succès.');

        case 'keep_users':
            // Dissocier le genre pour les utilisateurs
            Utilisateur::whereIn('id', $userIds)
                       ->update(['code_genre' => null]);

            // Supprimer le genre
            $genre->delete();

            return redirect()->route('genre.ajout.form')
                ->with('success', 'Genre supprimé, les utilisateurs restent sans genre.');

        case 'cancel':
        default:
            return redirect()->route('genre.ajout.form')
                ->with('info', 'Suppression annulée.');
    }
}

}