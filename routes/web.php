<?php

use Illuminate\Support\Facades\{Auth, Hash, Route};
use Illuminate\Http\Request;
use Laravel\Socialite\Socialite;
use App\Http\Controllers\{ProfileController, TalkController};
use App\Models\User;

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

    Route::get('/talks/create', [TalkController::class, 'create'])->name('talks.create');
    Route::Post('/talks', [TalkController::class, 'store']) ->name('talks.store');
    Route::delete('/talks/{talk}', [TalkController::class, 'destroy']) ->name('talks.destroy');
    Route::get('/talks/{talk}/edit', [TalkController::class, 'edit']) ->name('talks.edit');
    Route::get('/talks', [TalkController::class, 'index']) ->name('talks.index');
    Route::get('/talks/{talk}', [TalkController::class, 'show']) ->name('talks.show');
    Route::patch('/talks/{talk}', [TalkController::class, 'update']) ->name('talks.update');

});

require __DIR__.'/auth.php';



Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
 
    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);
 
    Auth::login($user);
 
    return redirect('/talks/create');
});
