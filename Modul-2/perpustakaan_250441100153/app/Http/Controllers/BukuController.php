<?php

namespace App\Http\Controllers;

class BukuController extends Controller
{
    /**
     * Data buku sementara (tidak menggunakan database).
     */
    protected array $bukuList = [
        [
            'id'       => 1,
            'judul'    => 'Laskar Pelangi',
            'penulis'  => 'Andrea Hirata',
            'tahun'    => 2005,
            'kategori' => 'Novel',
        ],
        [
            'id'       => 2,
            'judul'    => 'Bumi Manusia',
            'penulis'  => 'Pramoedya Ananta Toer',
            'tahun'    => 1980,
            'kategori' => 'Sejarah',
        ],
        [
            'id'       => 3,
            'judul'    => 'Filosofi Teras',
            'penulis'  => 'Henry Manampiring',
            'tahun'    => 2018,
            'kategori' => 'Pengembangan Diri',
        ],
        [
            'id'       => 4,
            'judul'    => 'Cantik Itu Luka',
            'penulis'  => 'Eka Kurniawan',
            'tahun'    => 2002,
            'kategori' => 'Fiksi',
        ],
        [
            'id'       => 5,
            'judul'    => 'Sapiens: Riwayat Singkat Umat Manusia',
            'penulis'  => 'Yuval Noah Harari',
            'tahun'    => 2011,
            'kategori' => 'Non-Fiksi',
        ],
        [
            'id'       => 6,
            'judul'    => 'Clean Code',
            'penulis'  => 'Robert C. Martin',
            'tahun'    => 2008,
            'kategori' => 'Teknologi',
        ],
    ];

    /**
     * Menampilkan halaman Daftar Buku.
     * Route: GET /buku (name: buku.index)
     */
    public function index()
    {
        return view('buku.index', [
            'bukuList' => $this->bukuList,
        ]);
    }

    /**
     * Menampilkan halaman Detail Buku berdasarkan {id}.
     * Route: GET /buku/{id} (name: buku.show)
     */
    public function show(string $id)
    {
        $buku = collect($this->bukuList)->firstWhere('id', (int) $id);

        return view('buku.detail', [
            'buku' => $buku, // null jika tidak ditemukan, ditangani di view dengan @if
        ]);
    }
}