<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/register', [UserController::class, 'create']);
Route::post('/auth/login', [UserController::class, 'login']);

