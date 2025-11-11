<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;

// =======================================================
// A. ROUTE PUBLIK / GUEST (Bagian Utama Triplay)
// =======================================================

// 1. Halaman Utama (Home)
Route::get('/', function () {
    return view('home'); // Mengarah ke resources/views/home.blade.php
})->name('home');

// 2. Halaman Kategori (Hiking, Trekking, Camping)
Route::get('/activities', function () {
    return view('activities'); // Mengarah ke resources/views/activities.blade.php
})->name('activities');

// 3. Daftar Destinasi per Kategori (Publik/Guest boleh lihat)
Route::get('/activities/{category}', [DestinationController::class, 'index'])->name('kegiatan.detail');


// 4. Detail Destinasi (Publik/Guest boleh lihat)
Route::get('/destination/{destination}', [DestinationController::class, 'show'])->name('destinations.show');


// =======================================================
// B. ROUTE AUTHENTIKASI & PROTECTED (Login Wajib)
// =======================================================

Route::middleware('auth')->group(function () {

    // CRUD Posts
    Route::resource('posts', PostController::class);


    // Route Profile (dari Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('auth')->group(function () {
    Route::get('/activities/{category}', [DestinationController::class, 'index'])->name('destinations.index');
});


    // Dashboard (dari Breeze)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// ROUTE AUTH DARI BREEZE (Login, Register, dll.)
require __DIR__.'/auth.php';
