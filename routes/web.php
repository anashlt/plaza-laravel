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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

// Brows all ads
Route::get('/a/latest', [App\Http\Controllers\HomeController::class, 'browse'])->name('browse');
// Get ad by city
Route::get('/category/{category}/city/{city}', [App\Http\Controllers\HomeController::class, 'showAdByCity'])->name('showAdByCity');
// Get ad by category
Route::get('/category/{category}', [App\Http\Controllers\HomeController::class, 'showAdByCategory'])->name('showAdByCategory');
// Get ad by slug
Route::get('/{category}/{city}/a/{slug}', [App\Http\Controllers\AdController::class, 'index'])->name('showAd');
// View post an ad 
Route::get('/ads/post', [App\Http\Controllers\AdController::class, 'create'])->middleware('auth')->name('viewPostAdd');
// Create post an ad 
Route::post('/ads/post/create', [App\Http\Controllers\AdController::class, 'store'])->middleware('auth')->name('createPostAdd');
