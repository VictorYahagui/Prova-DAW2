<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PosicaoController;
use App\Http\Controllers\ClubeController;
use App\Http\Controllers\JogadorController;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::resource('posicoes', PosicaoController::class)->except(['show']);
Route::resource('clubes', ClubeController::class)->except(['show']);
Route::resource('jogadores', JogadorController::class)->except(['show']);
