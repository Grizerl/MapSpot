<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\Admin\AdminPlaceController;
use App\Http\Controllers\Dashboard\Admin\HomeController;
use App\Http\Controllers\Dashboard\CommentController;
use App\Http\Controllers\Dashboard\LocationController;
use App\Http\Controllers\Dashboard\PlaceController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::middleware(['auth', 'throttle:60,1'])->prefix('dashboard')->group(function (): void {
    Route::resource('places', PlaceController::class);

    Route::get('/map/points', [LocationController::class, 'index'])->name('map.points.index');

    Route::post('/places/{place}/comments', [CommentController::class, 'store'])->name('places.comments.store');


    Route::middleware([IsAdmin::class])->prefix('admin')->group(function (): void {
        Route::get('/', [HomeController::class, 'index'])->name('admin.home.page');

        Route::resource('points', AdminPlaceController::class)->except(['create', 'store']);

    });

});

Route::post('logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


require __DIR__.'/auth.php';
