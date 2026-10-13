<?php

namespace App\Http\Controllers\Api; // <-- Wajib ada \Api

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use Illuminate\Http\Request;

class BukuController extends Controller

{
    public function index(Request $request)
    {
        $query = Buku::with('kategori')->withCount('peminjamans');

        // Pencarian (Judul / Penulis)
        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('judul', 'like', "%{$cari}%")
                ->orWhere('penulis', 'like', "%{$cari}%");
            });
        }

        // Filter Kategori
        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        // Filter Tahun
        if ($request->filled('tahun')) {
            $query->where('tahun_terbit', $request->tahun);
        }

        $bukus = $query->latest('id')->paginate(10)->withQueryString();

        return response()->json($bukus, 200);
    }

    public function store(StoreBukuRequest $request)
    {
        $buku = Buku::create($request->validated());
        $buku->load('kategori');

        return response()->json([
            'message' => 'Buku berhasil ditambahkan',
            'data'    => $buku
        ], 201);
    }

    public function show($id)
    {
        $buku = Buku::with(['kategori', 'peminjamans'])->find($id);

        if (!$buku) {
            return response()->json(['message' => 'not found'], 404);
        }

        return response()->json(['data' => $buku], 200);
    }

    public function update(UpdateBukuRequest $request, $id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json(['message' => 'not found'], 404);
        }

        $buku->update($request->validated());
        $buku->load('kategori');

        return response()->json([
            'message' => 'Buku berhasil diperbarui',
            'data'    => $buku
        ], 200);
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json(['message' => 'not found'], 404);
        }

        $buku->delete();

        return response()->json(['message' => 'Buku berhasil dihapus'], 200);
    }
}