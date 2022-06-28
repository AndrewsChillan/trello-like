<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TrelloController;

// test

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/trellos', [TrelloController::class, 'index']);
Route::get('/projets', [ProjetController::class, 'index'])
    ->name('projets.index');
Route::get('/projets/create', [ProjetController::class, 'create'])
    ->name('projets.create');
Route::post('/projets', [ProjetController::class, 'store'])
    ->name('projets.store');
Route::get('/projets/{id}/edit', [ProjetController::class, 'edit'])
    ->name('projets.edit');
Route::put('/projets/{id}', [ProjetController::class, 'update'])
    ->name('projets/');
Route::delete('/projets/{id}', [ProjetController::class, 'destroy'])
    ->name('projets.destroy');

Route::get('/profils/{id}/edit', [ProfilController::class, 'edit'])
    ->name('profils.edit');
