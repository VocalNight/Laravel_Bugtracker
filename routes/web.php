<?php

use App\Http\Controllers\BugsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::get('/projects', function () {
    return view('projects');
});

Route::controller(BugsController::class)->group(function() {
    Route::get('/tickets',  'index');
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
