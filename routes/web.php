<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\PlaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::resource('places', PlaceController::class);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});


require __DIR__.'/auth.php';