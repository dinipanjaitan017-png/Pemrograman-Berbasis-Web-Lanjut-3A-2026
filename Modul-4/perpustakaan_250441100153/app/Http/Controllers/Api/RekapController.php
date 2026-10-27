<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Buku;

class RekapController extends Controller
{
    public function bukuPerKategori()
    {
        $rekap = Kategori::withCount('bukus')->get();

        return response()->json([
            'status' => 'success',
            'data'   => $rekap
        ], 200);
    }

    public function peminjamanPerBuku()
    {
        $rekap = Buku::withCount('peminjaman')->get();

        return response()->json([
            'status' => 'success',
            'data'   => $rekap
        ], 200);
    }
}