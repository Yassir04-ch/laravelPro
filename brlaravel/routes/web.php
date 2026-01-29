<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

Route::get('/',[PostController::class,"index"]);

Route::get('/post/index',[PostController::class , "index"]);
Route::get('/post/create',[PostController::class , "create"]);
Route::get('/post/{post}/edit',[PostController::class , "edit"])->name('post.edit');
Route::post('/post',[PostController::class , "store"]);
Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
  
Route::get('/categories/index',[CategoryController::class , "index"]);
Route::get('/categories/create',[CategoryController::class , "create"]);
Route::get('/categories/{category}/edit',[CategoryController::class , "edit"])->name('categories.edit');
Route::post('/categories',[CategoryController::class , "store"]);
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');