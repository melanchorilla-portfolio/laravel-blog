<?php

use Illuminate\Support\Facades\{ Auth, Route };
use App\Http\Controllers\Admin\{CategoryController, TagController, PostController};
use App\Models\Post;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            $posts = Post::with('category', 'tags')->take(3)->latest()->get();

            return view('admin.dashboard', compact('posts'));
        });
        Route::resource('/categories', CategoryController::class);
        Route::resource('/tags', TagController::class);
        Route::resource('/posts', PostController::class);
    });
});