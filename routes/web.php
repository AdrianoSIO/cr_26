<?php

use Illuminate\Support\Facades\Route;

Route::get('/accueil', [TestController::class, 'accueil']);
Route::get('/mentions', [TestController::class, 'mentions']);
Route::get('/equipe', [TestController::class, 'equipe']);
Route::get('/', [TestController::class, 'welcome']);
Route::get('/resultat', [TestController::class, 'role']);
Route::get('/resultat', [TestController::class, 'genre']);
Route::get('/resultat', [TestController::class, 'pays']);
Route::get('/epreuve', [TestController::class, 'epreuve']);
Route::get('/collège', [TestController::class, 'collège']);
Route::get('/resultat', [TestController::class, 'resultat']);
