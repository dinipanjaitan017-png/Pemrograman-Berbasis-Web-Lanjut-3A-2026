<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 1. Halaman Beranda
Route::view('/', 'home')->name('home');

// 2 & 3. Halaman Daftar Buku & Detail Buku (ditangani oleh BukuController)
Route::controller(BukuController::class)->group(function () {
    Route::get('/buku', 'index')->name('buku.index');
    Route::get('/buku/{id}', 'show')->name('buku.show');
});