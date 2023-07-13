<?php

use App\Http\Controllers\CattleController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\MilkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', fn () => redirect()->route('dashboard'))
    ->middleware(['auth', 'verified', 'admin']);

Route::resource('cattle', CattleController::class)
    ->middleware(['auth', 'verified', 'admin']);

Route::resource('milk', MilkController::class)
    ->middleware(['auth', 'verified', 'admin']);

Route::resource('medical', HealthController::class)
    ->middleware(['auth', 'verified', 'admin']);

Route::resource('feeds', FeedController::class)
    ->middleware(['auth', 'verified', 'admin']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::view('about', 'about')->name('about');

    Route::resource('user', UserController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
