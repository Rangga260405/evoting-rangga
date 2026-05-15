<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ParticipantController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect('/dashboard');

});

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');

})->name('logout');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::post('/participant/register', [ParticipantController::class, 'register'])
        ->name('participant.register');

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/voting/{status}', [SettingController::class, 'update']);

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | USER AREA
    |--------------------------------------------------------------------------
    */

    // halaman voting
    Route::get('/vote', [VotingController::class, 'index'])
        ->name('vote');

    // detail kandidat
    Route::get('/candidate/{id}', [VotingController::class, 'show'])
        ->name('candidate.show');

    // simpan vote
    Route::post('/vote/store', [VotingController::class, 'store'])
        ->name('vote.store');

    // hasil voting
    Route::get('/results', [VotingController::class, 'results'])
        ->name('results');

    // realtime chart
    Route::get('/results/data', [VotingController::class, 'data'])
        ->name('results.data');

    /*
    |--------------------------------------------------------------------------
    | VERIFY TOKEN
    |--------------------------------------------------------------------------
    */

    Route::get('/verify-token/{token}', [TokenController::class, 'verify'])
        ->name('token.verify');

    /*
    |--------------------------------------------------------------------------
    | ADMIN AREA
    |--------------------------------------------------------------------------
    */

    Route::middleware(['admin'])->group(function () {

        Route::get('/results/pdf', [ResultController::class, 'exportPdf'])
            ->name('results.pdf');

        /*
        |--------------------------------------------------------------------------
        | CANDIDATES
        |--------------------------------------------------------------------------
        */

        Route::resource('candidates', CandidateController::class);

        /*
        |--------------------------------------------------------------------------
        | TOKEN QR
        |--------------------------------------------------------------------------
        */

        Route::get('/token', [TokenController::class, 'index'])
            ->name('token.index');

        Route::post('/token/generate', [TokenController::class, 'generate'])
            ->name('token.generate');

        Route::get('/participants', [ParticipantController::class, 'index'])
            ->name('participants.index');

        Route::post('/participants/{id}/approve', [ParticipantController::class, 'approve'])
            ->name('participants.approve');

        Route::post('/participants/{id}/reject', [ParticipantController::class, 'reject'])
            ->name('participants.reject');

    });

});

/*
|--------------------------------------------------------------------------
| BREEZE AUTH
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';