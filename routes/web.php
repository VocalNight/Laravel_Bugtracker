<?php

use App\Http\Controllers\BugsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->middleware(['guest']);

Route::controller(ProjectsController::class)
->middleware(['auth'])
->group(function(): void {
    Route::get('/projects', 'index')->name('projects');
    Route::get('/projects/create', 'create');
    Route::post('/projects', 'store');
});


Route::controller(BugsController::class)
->middleware(['auth', 'verified'])
->group(function() {
    Route::get('/tickets',  'index')->name('tickets');
    Route::get('/tickets/create', 'create');
    Route::get('/tickets/{bug}', 'show');
    Route::get('/tickets/{bug}/edit', 'edit');
    Route::post('/tickets', 'store');
    Route::patch('/tickets/{bug}', 'update');
    Route::delete('/tickets/{bug}', 'destroy');
});




Route::get('/projects/Placeholder', function () {
    return view('projectInfo');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
