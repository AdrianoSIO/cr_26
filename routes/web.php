<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Controllers;
use App\Http\Controllers\Procs;

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
// Pays - CRUD
Route::get('/pays/creation', [PageController::class, 'createPay'])->name('pay.create');
Route::get('/pays/{pay}/edit', [Procs::class, 'editPay'])->name('pay.edit');
Route::put('/pays/{pay}', [Procs::class, 'MajPay'])->name('pay.update');
Route::delete('/pays/{pay}', [Procs::class, 'SuppPay'])->name('pay.suppression');
// Role _ CRUD
Route::get('/role/creation', [PageController::class, 'createRole'])->name('role.create');
Route::get('/role/{role}/edit', [Procs::class, 'editRole'])->name('role.edit');
Route::put('/role/{role}', [Procs::class, 'MajRole'])->name('role.update');
Route::delete('/role/{role}', [Procs::class, 'SuppRole'])->name('role.suppression');
// Genre - CRUD
Route::get('/genre/creation', [PageController::class, 'createGenre'])->name('genre.create');
Route::get('/genre/{genre}/edit', [Procs::class, 'editGenre'])->name('genre.edit');
Route::put('/genre/{genre}', [Procs::class, 'MajGenre'])->name('genre.update');
Route::delete('/genre/{genre}', [Procs::class, 'SuppGenre'])->name('genre.suppression');
// Épreuve
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

