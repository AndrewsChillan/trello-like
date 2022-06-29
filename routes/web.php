<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TrelloController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


// Route TRELLOS

// Index - Route d'affichage de tous les projets
Route::get('/trellos', [TrelloController::class, 'index'])
    ->name('trellos.index');


// Create
Route::get('/trellos/create', [TrelloController::class, 'create'])
    ->name('trellos.create');

// Store
Route::post('/trellos', [TrelloController::class, 'store'])
    ->name('trellos.store');

// Show
Route::get('/trellos/{id}', [TrelloController::class, 'show'])
    ->name('trellos.show');

// Edit
Route::get('/trellos/{id}/edit', [TrelloController::class, 'edit'])
    ->name('trellos.edit');

// Update
Route::put('/trellos/{id}', [TrelloController::class, 'update'])
    ->name('trellos.update');

// Destroy
Route::delete('/trellos/{id}', [TrelloController::class, 'destroy'])
    ->name('trellos.destroy');


/* xxxxxxx PROJECTS xxxxxxx */


Route::resource('projects', ProjectController::class);



Route::get('/profils/{id}/edit', [ProfilController::class, 'edit'])
    ->name('profils.edit');
