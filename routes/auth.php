<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function (): void {
    
    Route::get('register', [RegisterController::class, 'showForm'])->name('register.form');
    Route::post('register', [RegisterController::class, 'register'])->name('register.submit');

    Route::get('login', [LoginController::class, 'showForm'])->name('login.form');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
});

