<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/register', [UserController::class, 'create']);
Route::post('/auth/login', [UserController::class, 'login']);

Route::post('/category', [CategoryController::class, 'create']);

Route::post('/comment', [CommentController::class, 'create']);

Route::post('/post', [PostController::class, 'create']);
Route::get('/posts', [PostController::class, 'all']);
