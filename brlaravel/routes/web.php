<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('post.index');
});

// Route::get('categories',CategoryController::class);
Route::get('/post/index',[PostController::class , "index"]);
Route::get('/post/create',[PostController::class , "create"]);
Route::resource('posts', PostController::class);

Route::get('/category/index',[CategoryController::class , "index"]);
Route::get('/category/create',[CategoryController::class , "create"]);
Route::get('/category/create',[CategoryController::class , "create"]);
Route::resource('categories', CategoryController::class);