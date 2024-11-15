<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocialMediaController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('social')->as('account.')->group(function () {
    Route::get('{account}/redirect', [SocialMediaController::class, 'redirect'])->name('redirect');
    Route::get('{account}/callback', [SocialMediaController::class, 'callback'])->name('callback');
});
