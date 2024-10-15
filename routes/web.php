<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\View\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/auth/login', function () {
    return view('auth/login');
});

Route::get('/auth/register', function () {
    return view('auth/register');
});

Route::middleware(['web'])->group(function () {
    Route::post('/auth/register', [UserController::class, 'create'])->name('auth.register');
    Route::post('/auth/login', [UserController::class, 'login'])->name('auth.login');
});

