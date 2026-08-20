<?php

use App\Http\Middleware\EnsureUserIsLogged;
use App\Http\Middleware\EnsureUserIsNotLogged;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::middleware(EnsureUserIsNotLogged::class)->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('throttle:5,1');
});

Route::middleware(EnsureUserIsLogged::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
