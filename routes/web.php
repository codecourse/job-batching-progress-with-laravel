<?php

use App\Jobs\Example;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/job', function () {
    dispatch(new Example());
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
