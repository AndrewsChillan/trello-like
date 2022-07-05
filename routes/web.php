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

    Route::post('/projects/{test}/{project}', [ProjectController::class, 'addList'])
        ->name('projects.addList');

    Route::delete('/projects/{statut_id}/{project}/{test}', [ProjectController::class, 'deleteList'])
        ->name('projects.deletelist');

    //Create statut
    Route::resource('statuts', StatutController::class);

    // Route commentaire
    Route::post('comments/{project}', [CommentController::class, 'store'])
        ->name('comments.store');


    // Route profile
    Route::get('/profiles/{id}/edit', [ProfilController::class, 'edit'])
        ->name('profiles.edit');

    //Create statut
    Route::put('/profiles/{id}', [ProfilController::class, 'update'])
        ->name('profiles.update');
});
