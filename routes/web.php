<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TrelloController;
use App\Http\Controllers\StatutController;



Route::get('/', [TrelloController::class, 'index'])
    ->name('trellos.index');

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');


// Route TRELLOS
Route::resource('trellos', TrelloController::class);



// Route PROJECTS

Route::resource('projects', ProjectController::class);

Route::delete('/projects/{id}/{project}', [ProjectController::class, 'destroy'])
    ->name('projects.destroy.id');

Route::post('/projects/{statut}', [ProjectController::class, 'store'])
    ->name('projects.store.id');



// ROUTE PROFILES

Route::get('/profiles/{id}/edit', [ProfilController::class, 'edit'])
    ->name('profiles.edit');

Route::put('/profiles/{id}', [ProfilController::class, 'update'])
    ->name('profiles.update');

//Create statut
Route::resource('statuts', StatutController::class);
