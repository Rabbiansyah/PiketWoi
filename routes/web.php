<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Semua role dapat melihat jadwal, input hanya oleh admin (divalidasi di controller)
Route::get('piket/jadwal', [JadwalController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('piket.jadwal');
Route::post('piket/jadwal', [JadwalController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('piket.jadwal.store');
Route::post('piket/jadwal/bulk', [JadwalController::class, 'storeBulk'])
    ->middleware(['auth', 'verified'])
    ->name('piket.jadwal.storeBulk');

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
