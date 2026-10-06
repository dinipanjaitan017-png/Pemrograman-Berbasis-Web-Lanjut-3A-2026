@extends('layouts.app')

@section('title', 'Beranda - Perpustakaan Digital')

@section('content')
    <section class="hero">
        <h2>Selamat Datang di Perpustakaan Digital</h2>
        <p>
            Temukan dan jelajahi koleksi buku pilihan kami, mulai dari novel, sejarah,
            hingga buku pengembangan diri. Jelajahi katalog dan temukan bacaan favoritmu berikutnya.
        </p>
        <a href="{{ route('buku.index') }}" class="btn btn-primary">Lihat Daftar Buku</a>
    </section>

    <section class="highlight">
        <div class="highlight-item">
            <h3>📖 Koleksi Lengkap</h3>
            <p>Berbagai kategori buku dari berbagai penulis.</p>
        </div>
        <div class="highlight-item">
            <h3>🔍 Mudah Dicari</h3>
            <p>Lihat detail setiap buku hanya dengan satu klik.</p>
        </div>
        <div class="highlight-item">
            <h3>🎓 Untuk Semua</h3>
            <p>Cocok untuk pelajar, mahasiswa, dan pembaca umum.</p>
        </div>
    </section>
@endsection