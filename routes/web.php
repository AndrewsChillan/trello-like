<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\BController;
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
Route::get('/projets', [ProjetController::class, 'index']);
Route::get('/profils/{id}/edit', [ProfilController::class, 'edit'])
    ->name('profils.edit');
