<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        // Mengambil data buku beserta relasi peminjamannya
        $bukus = Buku::with('peminjamans')->get();

        // Mengambil semua data kategori
        $kategoris = Kategori::all();

        // Menampilkan halaman daftar buku
        return view('buku.index', compact('bukus', 'kategoris'));
    }
}
