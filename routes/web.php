<?php

use App\Http\Controllers\ProfileController;
use App\Models\Bug;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/tickets', function () {
    return view('tickets.index', [
        'bugs' => Bug::with('assignedTo')->latest()->paginate(5)
    ]);
});

Route::post('/tickets', function() {
    Bug::create([
        'title' => request('title'),
        'description' => request('description'),
        'AssignedTo' => request('assigned'),
        'CreatedBy' => 1
    ]);

    return redirect('/tickets');
});

Route::get('/tickets/create', function () {
    $users = User::all();

    return view('tickets.create', [
        'users' => $users
    ]);
});

Route::get('/tickets/{id}', function ($id) {
    $bug = Bug::find($id);

    return view('tickets.show', ['bug' => $bug]);
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
