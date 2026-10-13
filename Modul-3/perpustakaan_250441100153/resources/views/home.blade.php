@extends('layouts.app')

@section('title', 'Beranda - Perpustakaan Digital')

@section('content')

<section class="hero">

    <div class="container hero-content">

        <div class="hero-text">

            <span class="hero-label">
                SELAMAT DATANG
            </span>

            <h2>
                Jelajahi Dunia
                <span>Pengetahuan</span>
            </h2>

            <p>
                Selamat datang di Perpustakaan Digital.
                Temukan berbagai koleksi buku menarik untuk
                menambah wawasan, inspirasi, dan pengetahuan.
            </p>

            <div class="hero-buttons">

                <a
                    href="{{ route('buku.index') }}"
                    class="btn btn-primary"
                >
                    Lihat Koleksi Buku
                </a>

                <a
                    href="#tentang"
                    class="btn btn-secondary"
                >
                    Tentang Perpustakaan
                </a>

            </div>

        </div>


        <div class="hero-card">

            <div class="book-illustration">
                📖
            </div>

            <h3>Knowledge</h3>

            <p>
                "Membaca adalah jendela untuk melihat
                dunia yang lebih luas."
            </p>

        </div>

    </div>

</section>


<section class="about" id="tentang">

    <div class="container">

        <div class="section-heading">

            <span>PERPUSTAKAAN DIGITAL</span>

            <h2>
                Tempat Menemukan Pengetahuan
            </h2>

            <p>
                Perpustakaan ini menyediakan koleksi buku
                dari berbagai kategori yang dapat kamu
                jelajahi dengan mudah.
            </p>

        </div>


        <div class="feature-grid">

            <div class="feature-card">
                <div class="feature-number">01</div>

                <h3>Koleksi Buku</h3>

                <p>
                    Berbagai buku tersedia dengan informasi
                    judul, penulis, tahun terbit, dan kategori.
                </p>
            </div>


            <div class="feature-card">
                <div class="feature-number">02</div>

                <h3>Mudah Dijelajahi</h3>

                <p>
                    Gunakan halaman daftar buku untuk
                    menemukan koleksi yang tersedia.
                </p>
            </div>


            <div class="feature-card">
                <div class="feature-number">03</div>

                <h3>Informasi Lengkap</h3>

                <p>
                    Setiap buku memiliki halaman detail
                    yang menampilkan informasi lebih lengkap.
                </p>
            </div>

        </div>

    </div>

</section>

@endsection