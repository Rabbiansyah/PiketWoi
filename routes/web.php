<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth','role:user'])->group(function () {
    //Route::resource('users', UserController::class);
});

Route::middleware(['auth','role:admin'])->group(function () {
     //Route::resource('admin', UserController::class);
});

Route::middleware(['auth','role:developer'])->group(function () {
     //Route::resource('developer', UserController::class);
});

require __DIR__.'/auth.php';
