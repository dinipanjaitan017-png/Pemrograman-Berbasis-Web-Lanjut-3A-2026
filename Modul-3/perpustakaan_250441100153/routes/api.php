<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BukuController;
use App\Http\Controllers\Api\RekapController;

// CRUD API Buku (nama route diberi prefix "api." supaya tidak bentrok dengan route web)
Route::apiResource('buku', BukuController::class)->names('api.buku');

// Rekap Agregasi Data
Route::get('rekap/buku-per-kategori', [RekapController::class, 'bukuPerKategori']);
Route::get('rekap/peminjaman-per-buku', [RekapController::class, 'peminjamanPerBuku']);