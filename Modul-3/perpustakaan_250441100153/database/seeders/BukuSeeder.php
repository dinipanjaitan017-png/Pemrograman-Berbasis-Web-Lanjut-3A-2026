<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $dataBuku = [
            [
                'judul'        => 'Laskar Pelangi',
                'penulis'      => 'Andrea Hirata',
                'tahun_terbit' => 2005,
                'kategori_id'  => 1, // Kategori Novel/Fiksi
            ],
            [
                'judul'        => 'Bumi Manusia',
                'penulis'      => 'Pramoedya Ananta Toer',
                'tahun_terbit' => 1980,
                'kategori_id'  => 2, // Kategori Sejarah
            ],
            [
                'judul'        => 'Negeri 5 Menara',
                'penulis'      => 'Ahmad Fuadi',
                'tahun_terbit' => 2009,
                'kategori_id'  => 1, // Kategori Novel/Inspirasi
            ],
            [
                'judul'        => 'Filosofi Teras',
                'penulis'      => 'Henry Manampiring',
                'tahun_terbit' => 2018,
                'kategori_id'  => 3, // Kategori Pengembangan Diri
            ],
            [
                'judul'        => 'Atomic Habits',
                'penulis'      => 'James Clear',
                'tahun_terbit' => 2018,
                'kategori_id'  => 3, // Kategori Produktivitas/Pengembangan Diri
            ],
        ];

        foreach ($dataBuku as $buku) {
            Buku::create($buku);
        }
    }
}