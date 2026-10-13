<div class="book-card">

    <div class="book-cover">

        <div class="book-cover-pattern">
            BOOK
        </div>

        <div class="book-cover-title">
            {{ $judul }}
        </div>

    </div>


    <div class="book-content">

        <span class="book-category">
            {{ $kategori }}
        </span>

        <h3>
            {{ $judul }}
        </h3>

        <p class="book-author">
            {{ $penulis }}
        </p>

        <p class="book-year">
            Tahun terbit: {{ $tahun }}
        </p>


        {{-- Named Slot --}}
        @isset($description)
            <div class="book-description">
                {{ $description }}
            </div>
        @endisset


        <a
            href="{{ route('buku.show', $id) }}"
            class="book-button"
        >
            Lihat Detail
            <span>→</span>
        </a>

    </div>

</div>