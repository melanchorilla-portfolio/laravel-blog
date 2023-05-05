<?php

use Illuminate\Support\Facades\{ Auth, Route };
use App\Http\Controllers\Admin\{CategoryController, TagController, PostController};
use App\Models\Post;



Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::get('/post/{post:slug}', [App\Http\Controllers\PostController::class, 'show']);
Route::view('about', 'about')->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            $posts = Post::with('category', 'tags')->take(3)->latest()->get();
            $title = 'Latest post';

            return view('admin.dashboard', compact('posts', 'title'));
        });
        Route::resource('/categories', CategoryController::class);
        Route::resource('/tags', TagController::class);
        Route::resource('/posts', PostController::class);
    });
});