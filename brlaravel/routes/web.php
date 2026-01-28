<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('post.index');
});

// Route::get('categories',CategoryController::class);
Route::get('/post/index',[PostController::class , "index"]);
Route::get('/post/edit',[PostController::class , "edit"]);
Route::get('/post/create',[PostController::class , "create"]);
Route::get('/post/show',[PostController::class , "show"]);
