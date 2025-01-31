<?php

use App\Http\Controllers\Filiale\NewsController;
use App\Http\Controllers\FilialenController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/filialen');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => '/filialen'], function() {
        Route::get('/', [FilialenController::class, 'index'])->name('filialen.index');

        Route::get('/{filialeId}', [FilialenController::class, 'show'])->name('filialen.show');
        Route::get('/{filialeId}/news', [NewsController::class, 'index'])->name('news.index');
        Route::post('/{filialeId}/news', [NewsController::class, 'store'])->name('news.store');
    });
});

require __DIR__.'/auth.php';
