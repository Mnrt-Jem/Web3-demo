<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/shop', function () {
    return Inertia::render('Shop');
})->name('shop');
Route::post('login-web3', \App\Actions\LoginUsingWeb3::class);


// LADDERBOARD
Route::middleware(['auth:sanctum', 'verified'])->get('/ladder', function () {
    return Inertia::render('Ladder');
})->name('ladder');
Route::middleware(['auth:sanctum', 'verified'])->get('/ladder/stage', function () {
    return Inertia::render('Ladder');
})->name('StageLadder');
Route::middleware(['auth:sanctum', 'verified'])->get('/ladder/coins', function () {
    return Inertia::render('Ladder');
})->name('CoinsLadder');
Route::middleware(['auth:sanctum', 'verified'])->get('/ladder/kill', function () {
    return Inertia::render('Ladder');
})->name('KillLadder');
// END LADDERBOARD


// API
Route::get('user/reward', 'App\Http\Controllers\UserController@getReward');
Route::get('user/items', 'App\Http\Controllers\UserController@getInventory');
Route::get('games/ladder/{id}', 'App\Http\Controllers\LadderController@getLadder');
Route::get('shop/items', 'App\Http\Controllers\ShopController@getItems');


