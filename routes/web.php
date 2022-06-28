<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\BController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TrelloController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


// Route TRELLOS

// Index
Route::get('/trellos', [TrelloController::class, 'index'])
    ->name('trellos.index');

// Create
Route::get('/trellos', [TrelloController::class, 'create'])
    ->name('trellos.create');

// Store
Route::post('/trellos', [TrelloController::class, 'store'])
    ->name('trellos.store');

// Show
Route::get('/trellos', [TrelloController::class, 'show'])
    ->name('trellos.show');

// Edit
Route::get('/trellos', [TrelloController::class, 'edit'])
    ->name('trellos.edit');

// Update
Route::put('/trellos', [TrelloController::class, 'update'])
    ->name('trellos.update');

// Destroy
Route::delete('/trellos', [TrelloController::class, 'destroy'])
    ->name('trellos.destroy');





Route::get('/projets', [ProjetController::class, 'index']);
Route::get('/profils/{id}/edit', [ProfilController::class, 'edit'])
    ->name('profils.edit');
