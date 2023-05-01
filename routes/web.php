<?php

use Illuminate\Support\Facades\{ Auth, Route };
use App\Http\Controllers\Admin\{CategoryController, TagController, PostController};


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        });
        Route::resource('/categories', CategoryController::class);
        Route::resource('/tags', TagController::class);
        Route::resource('/posts', PostController::class);
    });
});