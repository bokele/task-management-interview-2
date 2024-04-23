<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::resource('projects', ProjectController::class)->only(['index', 'create', 'edit', 'show']);
    Route::resource('tasks', TaskController::class)->only(['index', 'create', 'edit']);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
