<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'show'])
    ->middleware('guest')
    ->name('login');

Route::post('login/try-to-login', [LoginController::class, 'login'])
    ->middleware('guest')
    ->name('try-to-login');

Route::post('logout', [LoginController::class, 'logout'])
    ->name('logout');