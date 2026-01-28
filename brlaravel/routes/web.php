<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('post.index');
});

// Route::get('categories',CategoryController::class);

Route::resource('posts', PostController::class);
 
Route::resource('categories', CategoryController::class);