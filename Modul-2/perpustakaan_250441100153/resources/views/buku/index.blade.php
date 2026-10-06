@extends('layouts.app')

@section('title', 'Daftar Buku - Perpustakaan Digital')

@section('content')
    <h2 class="page-title">Daftar Buku</h2>
    <p class="page-subtitle">Berikut adalah koleksi buku yang tersedia di perpustakaan kami.</p>

    <div class="grid-buku">
        @foreach ($bukuList as $buku)
            <x-kartu-buku :buku="$buku">
                <x-slot:kategori>
                    {{ $buku['kategori'] }}
                </x-slot:kategori>
            </x-kartu-buku>
        @endforeach
    </div>
@endsection