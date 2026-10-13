<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        // Mengambil data buku beserta relasi peminjamannya
        $bukus = Buku::with('peminjamans')->get();

        // Mengembalikan tampilan ke file resources/views/buku/index.blade.php
        return view('buku.index', compact('bukus'));
    }
}