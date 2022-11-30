<?php

use App\Http\Controllers\PokemonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('attack', [TypeController::class, 'attack'])->name('attack');
Route::get('defense', [HomeController::class, 'defense'])->name('defense');
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::get('signin', [LoginController::class, 'signin'])->name('signin');

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('pokemon', [PokemonController::class, 'index']);
*/

Route::resource("pokemon", PokemonController::class);
