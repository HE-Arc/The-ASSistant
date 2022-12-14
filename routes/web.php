<?php

use App\Http\Controllers\PokemonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
Route::get('defense', [TypeController::class, 'defense'])->name('defense');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('action', [PokemonController::class, 'action'])->name('action');

Route::post('authenticate', [UserController::class, 'authenticate'])->name('authenticate');

Route::resource("pokemon", PokemonController::class);
Route::resource("users", UserController::class);
