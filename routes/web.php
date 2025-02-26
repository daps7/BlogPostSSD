<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

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

Route::get('/', [PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/posts/{post}/like', [PostsController::class, 'like'])->name('posts.like');
Route::post('/posts/{post}/favorite', [PostsController::class, 'favorite'])->name('posts.favorite');
Route::get('/favorites', [PostsController::class, 'favorites'])->name('favorites');

// Remove redundant routes
// Route::post('/like/{id}', [PostsController::class, 'like']);

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

