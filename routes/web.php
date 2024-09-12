<?php

use App\Http\Controllers\ProfileController;
use App\Models\Bug;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/bugs', function () {
    return view('bugs', [
        'bugs' => Bug::all()
    ]);
});

Route::get('/bugs/{id}', function ($id) {
    $bug = Bug::find($id);

    return view('bug', ['bug' => $bug]);
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
