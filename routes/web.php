<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Menu principal
Route::get('/accueil', [PageController::class, 'accueil'])->name('accueil');

// Classement
Route::get('/classement/eleve', [PageController::class, 'eleves'])->name('eleves');
Route::get('/classement/equipe', [PageController::class, 'equipe'])->name('equipe');
Route::get('/classement/college', [PageController::class, 'college'])->name('college');
Route::get('classement', [PageController::class, 'classement'])->name('classement');
// Autres sections
Route::get('/genre', [PageController::class, 'genre'])->name('genre');
Route::get('/pays', [PageController::class, 'pays'])->name('pays');
Route::get('/pays/{pay}/edit', [PageController::class, 'editPay'])->name('pay.edit');
Route::put('/pays/{pay}', [PageController::class, 'MajPay'])->name('pay.update');
Route::delete('/pays/{pay}', [PageController::class, 'SuppPay'])->name('pay.suppression');
Route::get('/epreuve', [PageController::class, 'epreuve'])->name('epreuve');
// Admin
Route::get('/admin/edition', [PageController::class, 'edition'])->name('edition');
Route::get('/admin/secretaire', [PageController::class, 'secretaire'])->name('secretaire');
Route::get('/admin/gestionnaire', [PageController::class, 'gestionnaire'])->name('gestionnaire');
Route::get('/admin/abonnement', [PageController::class, 'abonnement'])->name('abonnement');
Route::get('/roles', [PageController::class, 'roles'])->name('roles');
// Utilisateurs et rôles
Route::get('/utilisateurs', [PageController::class, 'utilisateurs'])->name('utilisateurs');


// Résultat
Route::get('/resultat/edition', [PageController::class, 'resultatEdition'])->name('resultat.edition');
Route::get('/resultat/exportation', [PageController::class, 'resultatExportation'])->name('resultat.exportation');
Route::get('/resultat/modification', [PageController::class, 'resultatModification'])->name('resultat.modification');

