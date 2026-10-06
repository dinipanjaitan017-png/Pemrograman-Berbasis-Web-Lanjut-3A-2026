@props(['buku'])

<div class="kartu-buku">
    <div class="kartu-buku-body">
        <h3 class="kartu-judul">{{ $buku['judul'] }}</h3>
        <p class="kartu-penulis">✍️ {{ $buku['penulis'] }}</p>
        <p class="kartu-tahun">📅 Terbit: {{ $buku['tahun'] }}</p>

        {{-- Named slot untuk konten tambahan (mis. kategori) --}}
        @isset($kategori)
            <div class="kartu-kategori">
                {{ $kategori }}
            </div>
        @endisset

        {{-- Slot default, untuk konten tambahan lain jika diperlukan --}}
        {{ $slot }}
    </div>

    <div class="kartu-buku-footer">
        <a href="{{ route('buku.show', $buku['id']) }}" class="btn btn-detail">
            Lihat Detail
        </a>
    </div>
</div>