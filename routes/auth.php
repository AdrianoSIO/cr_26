<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/email/verify', [VerifyEmailController::class, 'show'])
    ->middleware('auth')
    ->name('verification.notice');