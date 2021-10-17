<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Models\Post;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post/{id}', [PostController::class, 'show']);

Route::get('/posts', [PostController::class, 'showAllPosts']);

//Route::get('/comment/test/{id}', [CommentController::class, 'show']);

Route::resource('/comment', CommentController::class);

Route::resource('/storePost', PostController::class);

Route::resource('/editStoredPost', PostController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/createpost', [PostController::class, 'create']);

Route::get('/editpost/{id}', [PostController::class, 'edit']);


