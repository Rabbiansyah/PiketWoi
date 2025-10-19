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

// Semua role
Route::view('piket/jadwal', 'pages.piket.jadwal')
    ->middleware(['auth', 'verified', 'role:user,admin,developer'])
    ->name('piket.jadwal');

// Upload: user, admin, developer
Route::view('piket/upload', 'pages.piket.upload')
    ->middleware(['auth', 'verified', 'role:user,admin,developer'])
    ->name('piket.upload');

// Lihat bukti: admin, developer
Route::view('piket/bukti', 'pages.piket.bukti')
    ->middleware(['auth', 'verified', 'role:admin,developer'])
    ->name('piket.bukti');

// Developer only
Route::view('users', 'pages.management.users')
    ->middleware(['auth', 'verified', 'role:developer'])
    ->name('users.index');

Route::view('settings', 'pages.management.settings')
    ->middleware(['auth', 'verified', 'role:developer'])
    ->name('settings.index');

require __DIR__.'/auth.php';
