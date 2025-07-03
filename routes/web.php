<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\CommentController;
use App\Http\Controllers\Dashboard\LocationController;
use App\Http\Controllers\Dashboard\PlaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function (): void {
    Route::resource('places', PlaceController::class);

    Route::get('/map/points', [LocationController::class, 'index'])->name('map.points.index');

    Route::post('/places/{place}/comments', [CommentController::class, 'store'])->name('places.comments.store');

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

require __DIR__.'/auth.php';
