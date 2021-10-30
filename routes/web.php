<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::resource('/comment', CommentController::class);

Route::resource('/storePost', PostController::class);

Route::resource('/user', UserController::class);

Route::resource('/category', CategoryController::class);

Route::post('/admin/layout/edit', [PostController::class, 'editActivePost']);

Route::get('/', [PostController::class, 'showAllPosts']);

Route::get('/post/{id}', [PostController::class, 'show']);

Route::get('/posts', [PostController::class, 'showAllPosts']);

Route::get('/admin/layout', [PostController::class, 'showAdminLayout']);

Route::get('/search', [PostController::class, 'searchPost'])->name('searchPost');

Route::get('/profile/{id}', [UserController::class, 'show']);

Route::get('/profile/edit/{id}', [UserController::class, 'edit']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/createpost', [PostController::class, 'create']);

Route::get('/editpost/{id}', [PostController::class, 'edit']);

Route::get('/category/{id}', [CategoryController::class, 'show']);

Route::get('/like', [LikeController::class, 'likeHandler']);

Route::get('/clearlike', [LikeController::class, 'clearLike']);



