<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';
    
    protected $fillable = [
        'anggota_id', 
        'buku_id', 
        'tanggal_pinjam', 
        'tanggal_kembali'
    ];

    // Relasi ke tabel Buku
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    // Relasi ke tabel Anggota (jika ada model Anggota)
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
}