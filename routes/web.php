<?php

use App\Http\Controllers\BreedingController;
use App\Http\Controllers\CattleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\MilkController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\ProfileController;
use App\Models\Market;
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

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

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

Route::get('/payment/{id}', [MarketController::class, 'payment'])
    ->middleware(['auth', 'verified'])
    ->name('payment');

Route::get('/payment', [MarketController::class, 'confirmPayment'])
    ->middleware(['auth', 'verified'])
    ->name('confirmPayment');

Route::get('milk/create/{id}', [MilkController::class, 'createSpecific'])
    ->middleware(['auth', 'verified'])
    ->name('milk.createSpecific');

Route::get('health/create/{id}', [HealthController::class, 'createSpecific'])
    ->middleware(['auth', 'verified'])
    ->name('health.createSpecific');

Route::get('market/forsale/{id}', [MarketController::class, 'forSale'])
    ->middleware(['auth', 'verified'])
    ->name('market.forsale');


Route::get('market/remove/{id}', [MarketController::class, 'remove'])
    ->middleware(['auth', 'verified'])
    ->name('market.remove');

Route::post('market/place/{id}', [MarketController::class, 'place'])
    ->middleware(['auth', 'verified'])
    ->name('market.place');

/**
 * Handles most of the daraja api requests
 */

Route::controller(MpesaController::class)->group(function () {
    Route::post('/stkPush', 'stkPush')->name('stkPush');
});

Route::get('/mpesa/callback', [MpesaController::class, 'handleCallback']);
Route::post('/mpesa/callback', [MpesaController::class, 'handlePostCallback']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
