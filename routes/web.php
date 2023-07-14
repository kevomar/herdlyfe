<?php

use App\Http\Controllers\BreedingController;
use App\Http\Controllers\CattleController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\MilkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('cattle', CattleController::class)
    ->middleware(['auth', 'verified']);

Route::resource('milk', MilkController::class)
    ->middleware(['auth', 'verified']);

Route::resource('medical', HealthController::class)
    ->middleware(['auth', 'verified']);

Route::resource('feeds', FeedController::class)
    ->middleware(['auth', 'verified']);

Route::resource('market', MarketController::class)
    ->middleware(['auth', 'verified']);

// Route::resource('breeding', BreedingControPauthller::class)
//     ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
