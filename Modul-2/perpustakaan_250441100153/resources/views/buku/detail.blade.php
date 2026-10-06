@extends('layouts.app')

@section('title', 'Detail Buku - Perpustakaan Digital')

@section('content')
    @if ($buku)
        <div class="detail-buku">
            <a href="{{ route('buku.index') }}" class="back-link">&larr; Kembali ke Daftar Buku</a>

            <h2>{{ $buku['judul'] }}</h2>
            <span class="badge">{{ $buku['kategori'] }}</span>

            <table class="detail-table">
                <tr>
                    <th>ID Buku</th>
                    <td>{{ $buku['id'] }}</td>
                </tr>
                <tr>
                    <th>Penulis</th>
                    <td>{{ $buku['penulis'] }}</td>
                </tr>
                <tr>
                    <th>Tahun Terbit</th>
                    <td>{{ $buku['tahun'] }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $buku['kategori'] }}</td>
                </tr>
            </table>
        </div>
    @else
        <div class="not-found">
            <h2>😕 Buku Tidak Ditemukan</h2>
            <p>Buku dengan ID tersebut tidak tersedia di dalam koleksi kami.</p>
            <a href="{{ route('buku.index') }}" class="btn btn-primary">Kembali ke Daftar Buku</a>
        </div>
    @endif
@endsection