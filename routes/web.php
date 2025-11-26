<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProfileController, TalkController};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/talks/create', [App\Http\Controllers\TalkController::class, 'create'])->name('talks.create');
    Route::Post('/talks', [App\Http\Controllers\TalkController::class, 'store']) ->name('talks.store');
    Route::delete('/talks/{talk}', [App\Http\Controllers\TalkController::class, 'destroy']) ->name('talks.destroy');
    Route::get('/talks/{talk}/edit', [App\Http\Controllers\TalkController::class, 'edit']) ->name('talks.edit');
    Route::get('/talks', [App\Http\Controllers\TalkController::class, 'index']) ->name('talks.index');
    Route::get('/talks/{talk}', [App\Http\Controllers\TalkController::class, 'show']) ->name('talks.show');
    Route::patch('/talks/{talk}', [App\Http\Controllers\TalkController::class, 'update']) ->name('talks.update');

});

require __DIR__.'/auth.php';
