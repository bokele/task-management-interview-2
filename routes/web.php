<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {


    // Route::get('projects/{project}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    // Route::get('projects/tasks', [TaskController::class, 'index'])->name('tasks.index');
    // Route::get('projects/{project}/tasks/edit', [TaskController::class, 'create'])->name('tasks.edit');

    Route::resource('projects', ProjectController::class)->only(['index', 'create', 'edit', 'show']);



    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});