<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\BlogController;

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

Route::post('/blog/favorite/{id}', [PostsController::class, 'favorite'])->name('blog.favorite');

// Add the route for displaying a single blog post
Route::get('/blog/{id}', [PostsController::class, 'show'])->name('blogs.show');
Route::get('/blog/{slug}', [PostsController::class, 'show'])->name('blog.show');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

// Remove redundant routes
// Route::post('/like/{id}', [PostsController::class, 'like']);

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/favourites', [App\Http\Controllers\FavouriteController::class, 'index'])->name('favourites');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');

require __DIR__.'/about.php';

