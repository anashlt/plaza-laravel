<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Search
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::get('/title-auto',[App\Http\Controllers\HomeController::class, 'titleAutocomplete'])->name('titleAutocomplete');
Route::get('/city-auto',[App\Http\Controllers\HomeController::class, 'cityAutocomplete'])->name('cityAutocomplete');

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
// Ad images upload
Route::post('/image-upload', [App\Http\Controllers\AdController::class, 'uploadImage']);

// Admin dashboard
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/admin/posts', [App\Http\Controllers\AdminController::class, 'posts']);
    Route::get('/admin/post/{id}', [App\Http\Controllers\AdminController::class, 'editPost']);
});
