<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus'; // Sesuaikan dengan nama tabel di database Anda

    protected $fillable = [
    'kategori_id',
    'judul',
    'penulis',
    'tahun_terbit',
];

public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    /**
     * Relasi One-to-Many ke Model Peminjaman
     * (Nama method harus 'peminjamans' dengan huruf 's' di belakang)
     */
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'buku_id', 'id');
    }
}