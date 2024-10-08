<?php

use App\Livewire\CreateServer;
use App\Livewire\ShowServer;
use App\Models\ServerTask;
use App\Server\States\InProgress;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/servers/create', CreateServer::class)
    ->middleware(['auth', 'verified'])
    ->name('servers.create');

Route::get('/servers/{server}', ShowServer::class)
    ->middleware(['auth', 'verified'])
    ->name('servers.show');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
