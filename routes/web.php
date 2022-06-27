<?php

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
Auth::routes([
    'login' => true,
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/', function () {
    return view('welcome');
});

Route::domain('cloud.vortex-community.ga')->group(function(){
    Route::get('storage/{filename}', [\App\Http\Controllers\CloudController::class, 'index'])->name('storage');
});

Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('players', [\App\Http\Controllers\PlayerController::class, 'index'])->name('players');
Route::get('players/{id}', [\App\Http\Controllers\PlayerController::class, 'update'])->name('players.update');
Route::post('players/{id}', [\App\Http\Controllers\PlayerController::class, 'update'])->name('players.update');

Route::get('games', [\App\Http\Controllers\GameController::class, 'index'])->name('games');


Route::get('/demandpassport', [App\Http\Controllers\BlogController::class, 'demandpassport'])->name('demandpassport');
Route::get('/rules', [App\Http\Controllers\BlogController::class, 'rules'])->name('rules');
