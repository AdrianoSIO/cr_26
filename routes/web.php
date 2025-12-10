<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Procs;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;

// Menu principal
Route::get('/', [PageController::class, 'accueil'])->name('accueil');
Route::get('/accueil', [PageController::class, 'accueil'])->name('accueil');

// Classement
Route::get('/classement/eleve', [PageController::class, 'eleves'])->name('eleves');
Route::get('/classement/equipe', [PageController::class, 'equipe'])->name('equipe');
Route::get('/classement/college', [PageController::class, 'college'])->name('college');
Route::get('/classement', [PageController::class, 'classement'])->name('classement');

// =========================
// SECTION ADMIN
// =========================

// Pages accessibles uniquement à ADMIN
Route::middleware([IsAdmin::class])->group(function () {

    Route::get('/genre', [PageController::class, 'genre'])->name('genre');
    Route::get('/pays', [PageController::class, 'pays'])->name('pays');
    Route::get('/roles', [PageController::class, 'roles'])->name('roles');
    Route::get('/utilisateurs', [PageController::class, 'utilisateurs'])->name('utilisateurs');

    // PAYS - CRUD
    Route::get('/pay/ajout', [Procs::class, 'FormulaireAjout'])->name('pay.ajout.form');
    Route::post('/pay/ajout', [Procs::class, 'createPay'])->name('pay.ajout');
    Route::get('/pay/{pay}/edit', [Procs::class, 'editPay'])->name('pay.edit');
    Route::put('/pay/{pay}', [Procs::class, 'MajPay'])->name('pay.update');
    Route::delete('/pays/{pay}', [Procs::class, 'SuppPay'])->name('pay.suppression');

    // ROLES - CRUD
    Route::get('/role/ajout', [Procs::class, 'FormulaireAjout'])->name('role.ajout.form');
    Route::post('/role/ajout', [Procs::class, 'createRole'])->name('role.ajout');
    Route::get('/role/{role}/edit', [Procs::class, 'editRole'])->name('role.edit');
    Route::put('/role/{role}', [Procs::class, 'MajRole'])->name('role.update');
    Route::delete('/role/{role}', [Procs::class, 'SuppRole'])->name('role.suppression');

    // GENRE - CRUD
    Route::get('/genre/ajout', [Procs::class, 'FormulaireAjout'])->name('genre.ajout.form');
    Route::post('/genre/ajout', [Procs::class, 'createGenre'])->name('genre.ajout');

    // Edition et mise à jour par code
    Route::get('/genre/{genre}/edit', [Procs::class, 'editGenre'])->name('genre.edit');
    Route::put('/genre/{genre}', [Procs::class, 'MajGenre'])->name('genre.update');

   // Suppression
    Route::delete('/genre/{genre}', [Procs::class, 'SuppGenre'])->name('genre.suppression');


    // Pages Admin
    Route::get('/admin/edition', [PageController::class, 'edition'])->name('edition');
    Route::get('/admin/secretaire', [PageController::class, 'secretaire'])->name('secretaire');
    Route::get('/admin/gestionnaire', [PageController::class, 'gestionnaire'])->name('gestionnaire');
    Route::get('/admin/abonnement', [PageController::class, 'abonnement'])->name('abonnement');
});

// Épreuve
Route::get('/epreuve', [PageController::class, 'epreuve'])->name('epreuve');

// Résultat
Route::get('/resultat/edition', [PageController::class, 'resultatEdition'])->name('resultat.edition');
Route::get('/resultat/exportation', [PageController::class, 'resultatExportation'])->name('resultat.exportation');
Route::get('/resultat/modification', [PageController::class, 'resultatModification'])->name('resultat.modification');

// Profile (utilisateurs connectés)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Connexion
Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'loginPost'])->name('login.post');

// Déconnexion
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
