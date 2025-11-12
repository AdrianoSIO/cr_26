<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pay;
use App\Models\Genre;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
class PageController extends Controller
{
    // --- Pages principales ---
    public function accueil(): View
    {
        return view('accueil');
    }

    // --- Classement ---
    public function eleves(): View
    {
        return view('eleve');
    }

    public function equipe(): View
    {
        return view('equipe');
    }

    public function college(): View
    {
        return view('college');
    }

    

public function genre()
{
    $genres = Genre::simplePaginate(10); // récupère 10 genres par page
    return view('genre', compact('genres'));
}


    public function pays(): View
{
    $pays = Pay::simplePaginate(10); // récupère 10 pays par page
    return view('pays', compact('pays'));
}


    public function epreuve(): View
    {
        return view('epreuve');
    }

    // --- Admin ---
    public function edition(): View
    {
        return view('edition');
    }

    public function secretaire(): View
    {
        return view('secretaire');
    }

    public function gestionnaire(): View
    {
        return view('gestionnaire');
    }

    // --- Utilisateurs & rôles ---
    public function utilisateurs(): View
    {
        return view('utilisateurs');
    }

    public function roles(): View
    {
        $roles = Role::simplePaginate(10); // récupère 10 genres par page
    return view('roles', compact('roles'));
    }

    // --- Résultat ---
    public function resultatEdition(): View
    {
        return view('resultat.edition');
    }

    public function resultatExportation(): View
    {
        return view('resultat.exportation');
    }

    public function resultatModification(): View
    {
        return view('resultat.modification');
    }
    public function resultatImportation(): View
    {
        return view('resultat.importation');
    }
    public function classement(): View
    {
        return view('classement');
    }
    public function abonnement(): View
    {
        return view('abonnement');
    }
}
