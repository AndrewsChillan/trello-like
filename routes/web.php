<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TrelloController;
use App\Http\Controllers\StatutController;
use App\Http\Controllers\CommentController;




Route::get('/', [TrelloController::class, 'index'])
    ->name('trellos.index');



Auth::routes();


Route::group(['middleware' => 'auth'], function () {




    // Route TRELLOS
    Route::resource('trellos', TrelloController::class);


    // Route PROJECTS

    Route::resource('projects', ProjectController::class);

    Route::delete('/projects/{id}/{project}', [ProjectController::class, 'destroy'])
        ->name('projects.destroy.id');

    Route::post('/projects/{statut}', [ProjectController::class, 'store'])
        ->name('projects.store.id');

//Create statut
Route::resource('statuts', StatutController::class);

// Route commentaire
Route::post('comments/{project}', [CommentController::class, 'store'])
    ->name('comments.store');
