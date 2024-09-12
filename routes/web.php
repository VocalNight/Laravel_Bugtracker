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

Route::get('/tickets', function () {
    return view('bugs', [
        'bugs' => Bug::with('assignedTo')->paginate(5)
    ]);
});

Route::get('/tickets/create', function () {
    return view('projects');
});

Route::get('/tickets/{id}', function ($id) {
    $bug = Bug::find($id);

    return view('ticket', ['bug' => $bug]);
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
