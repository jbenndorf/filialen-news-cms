<?php

use App\Http\Controllers\Filiale\NewsController;
use App\Http\Controllers\FilialenController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => '/filialen'], function() {
    Route::get('/', [FilialenController::class, 'index'])->name('filiale.index');
    Route::get('/{filiale}', [FilialenController::class, 'show'])->name('filiale.show');

    Route::group(['prefix' => '/news'], function() {
        Route::get('/', [NewsController::class, 'index'])->name('news.index');
        Route::get('/{news}', [NewsController::class, 'show'])->name('news.show');
    });
});

require __DIR__.'/auth.php';
