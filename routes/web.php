<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::view('/', 'welcome');

// Menu principal
Route::get('/accueil', [PageController::class, 'accueil'])->name('accueil');

// Classement
Route::get('/classement/eleve', [PageController::class, 'eleves'])->name('eleves');
Route::get('/classement/equipe', [PageController::class, 'equipe'])->name('equipe');
Route::get('/classement/college', [PageController::class, 'college'])->name('college');

// Autres sections
Route::get('/genre', [PageController::class, 'genre'])->name('genre');
Route::get('/pays', [PageController::class, 'pays'])->name('pays');
Route::get('/epreuve', [PageController::class, 'epreuve'])->name('epreuve');
// Admin
Route::get('/admin/edition', [PageController::class, 'edition'])->name('edition');
Route::get('/admin/secretaire', [PageController::class, 'secretaire'])->name('secretaire');
Route::get('/admin/gestionnaire', [PageController::class, 'gestionnaire'])->name('gestionnaire');

// Utilisateurs et rôles
Route::get('/utilisateurs', [PageController::class, 'utilisateurs'])->name('utilisateurs');
Route::get('/roles', [PageController::class, 'roles'])->name('roles');

// Résultat
Route::get('/resultat/edition', [PageController::class, 'resultatEdition'])->name('resultat.edition');
Route::get('/resultat/exportation', [PageController::class, 'resultatExportation'])->name('resultat.exportation');
Route::get('/resultat/modification', [PageController::class, 'resultatModification'])->name('resultat.modification');

