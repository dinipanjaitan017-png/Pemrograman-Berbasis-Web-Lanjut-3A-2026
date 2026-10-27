
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Buku</h2>

    <p>Judul: {{ $buku->judul }}</p>
    <p>Penulis: {{ $buku->penulis }}</p>
    <p>Tahun Terbit: {{ $buku->tahun_terbit }}</p>

    <a href="{{ url('/buku') }}">Kembali</a>
</div>
@endsection
