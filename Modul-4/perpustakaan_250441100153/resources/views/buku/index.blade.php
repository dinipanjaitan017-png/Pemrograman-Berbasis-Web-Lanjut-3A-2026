
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Buku</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9f9f9;
            color: #333;
        }

        h1, h2 {
            color: #2c3e50;
        }

        form {
            background: white;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 5px;
        }

        input, select, button {
            padding: 10px;
            box-sizing: border-box;
        }

        input, select {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            margin-top: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .simpan {
            background: #3498db;
            color: white;
        }

        .edit {
            background: #f39c12;
            color: white;
            margin-right: 5px;
        }

        .hapus {
            background: #e74c3c;
            color: white;
        }

        .batal {
            background: #7f8c8d;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #pesan {
            margin: 15px 0;
            font-weight: bold;
            white-space: pre-line;
        }

        .tabel-container {
            overflow-x: auto;
        }
    </style>
</head>

<body>

    <h1>Daftar Buku</h1>

    <div id="pesan" role="status" aria-live="polite"></div>

    <h2 id="judulForm">Tambah Buku</h2>

    <form id="formBuku">
        <input type="hidden" id="buku_id">

        <label for="kategori_id">Kategori</label>
        <select id="kategori_id" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}">
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </select>

        <label for="judul">Judul Buku</label>
        <input
            type="text"
            id="judul"
            minlength="3"
            maxlength="150"
            required
        >

        <label for="penulis">Penulis</label>
        <input
            type="text"
            id="penulis"
            minlength="3"
            maxlength="100"
            required
        >

        <label for="tahun_terbit">Tahun Terbit</label>
        <input
            type="number"
            id="tahun_terbit"
            min="1900"
            max="{{ date('Y') }}"
            required
        >

        <button type="submit" class="simpan" id="tombolSimpan">
            Simpan Buku
        </button>

        <button type="button" class="batal" id="tombolBatal" hidden>
            Batal Edit
        </button>
    </form>

    <h2>Daftar Buku</h2>

    <div class="tabel-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody id="daftarBuku">
                <tr>
                    <td colspan="6" style="text-align: center;">
                        Memuat data buku...
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        const API = @json(url('/api/buku'));

        const form = document.getElementById('formBuku');
        const daftarBuku = document.getElementById('daftarBuku');
        const pesan = document.getElementById('pesan');
        const bukuId = document.getElementById('buku_id');
        const judulForm = document.getElementById('judulForm');
        const tombolSimpan = document.getElementById('tombolSimpan');
        const tombolBatal = document.getElementById('tombolBatal');

        let dataBuku = [];

        // Mengirim permintaan ke API dan menangani error
        async function permintaan(url, pilihan = {}) {
            const response = await fetch(url, {
                ...pilihan,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    ...pilihan.headers
                }
            });

            const hasil = await response.json().catch(() => ({}));

            if (!response.ok) {
                if (response.status === 422 && hasil.errors) {
                    const daftarError = Object.values(hasil.errors).flat();
                    throw new Error(daftarError.join('\n'));
                }

                throw new Error(
                    hasil.message || `Permintaan gagal (${response.status})`
                );
            }

            return hasil;
        }

        // Menampilkan pesan berhasil atau gagal
        function tampilkanPesan(teks, error = false) {
            pesan.textContent = teks;
            pesan.style.color = error ? '#c0392b' : '#218838';
        }

        // Mengambil data buku dari API
        async function muatBuku() {
            daftarBuku.innerHTML = `
                <tr>
                    <td colspan="6" style="text-align:center;">
                        Memuat data buku...
                    </td>
                </tr>
            `;

            try {
                const hasil = await permintaan(API);

                // Data API menggunakan pagination Laravel
                dataBuku = Array.isArray(hasil.data) ? hasil.data : [];

                tampilkanBuku();
            } catch (error) {
                daftarBuku.innerHTML = `
                    <tr>
                        <td colspan="6" style="text-align:center;">
                            Gagal memuat data buku.
                        </td>
                    </tr>
                `;

                tampilkanPesan(error.message, true);
            }
        }

        // Menampilkan daftar buku dalam tabel
        function tampilkanBuku() {
            daftarBuku.innerHTML = '';

            if (dataBuku.length === 0) {
                daftarBuku.innerHTML = `
                    <tr>
                        <td colspan="6" style="text-align:center;">
                            Belum ada data buku.
                        </td>
                    </tr>
                `;
                return;
            }

            dataBuku.forEach((buku, index) => {
                const baris = document.createElement('tr');

                const nilai = [
                    index + 1,
                    buku.kategori ?? '-',
                    buku.judul ?? '-',
                    buku.penulis ?? '-',
                    buku.tahun_terbit ?? '-'
                ];

                nilai.forEach((isi) => {
                    const kolom = document.createElement('td');
                    kolom.textContent = isi;
                    baris.appendChild(kolom);
                });

                // Tombol edit
                const kolomAksi = document.createElement('td');

                const tombolEdit = document.createElement('button');
                tombolEdit.type = 'button';
                tombolEdit.className = 'edit';
                tombolEdit.textContent = 'Edit';
                tombolEdit.addEventListener('click', () => editBuku(buku.id));

                // Tombol hapus
                const tombolHapus = document.createElement('button');
                tombolHapus.type = 'button';
                tombolHapus.className = 'hapus';
                tombolHapus.textContent = 'Hapus';
                tombolHapus.addEventListener('click', () => hapusBuku(buku.id));

                kolomAksi.append(tombolEdit, tombolHapus);
                baris.appendChild(kolomAksi);
                daftarBuku.appendChild(baris);
            });
        }

        // Menambahkan atau memperbarui buku tanpa reload halaman
        form.addEventListener('submit', async function(event) {
            event.preventDefault();

            const id = bukuId.value;

            const data = {
                kategori_id: document.getElementById('kategori_id').value,
                judul: document.getElementById('judul').value.trim(),
                penulis: document.getElementById('penulis').value.trim(),
                tahun_terbit: Number(
                    document.getElementById('tahun_terbit').value
                )
            };

            tombolSimpan.disabled = true;

            try {
                if (id) {
                    await permintaan(`${API}/${id}`, {
                        method: 'PUT',
                        body: JSON.stringify(data)
                    });

                    tampilkanPesan('Buku berhasil diperbarui.');
                } else {
                    await permintaan(API, {
                        method: 'POST',
                        body: JSON.stringify(data)
                    });

                    tampilkanPesan('Buku berhasil ditambahkan.');
                }

                form.reset();
                resetForm();
                await muatBuku();
            } catch (error) {
                tampilkanPesan(error.message, true);
            } finally {
                tombolSimpan.disabled = false;
            }
        });

        // Mengisi form ketika tombol Edit ditekan
        function editBuku(id) {
            const buku = dataBuku.find(item => String(item.id) === String(id));

            if (!buku) {
                tampilkanPesan('Data buku tidak ditemukan.', true);
                return;
            }

            bukuId.value = buku.id;
            document.getElementById('kategori_id').value = buku.kategori_id;
            document.getElementById('judul').value = buku.judul;
            document.getElementById('penulis').value = buku.penulis;
            document.getElementById('tahun_terbit').value = buku.tahun_terbit;

            judulForm.textContent = 'Edit Buku';
            tombolSimpan.textContent = 'Simpan Perubahan';
            tombolBatal.hidden = false;

            tampilkanPesan('Silakan ubah data buku.');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Mengembalikan form ke mode tambah
        function resetForm() {
            bukuId.value = '';
            judulForm.textContent = 'Tambah Buku';
            tombolSimpan.textContent = 'Simpan Buku';
            tombolBatal.hidden = true;
        }

        // Membatalkan edit
        tombolBatal.addEventListener('click', function() {
            form.reset();
            resetForm();
            tampilkanPesan('Edit dibatalkan.');
        });

        // Menghapus buku setelah konfirmasi
        async function hapusBuku(id) {
            const setuju = confirm(
                'Apakah kamu yakin ingin menghapus buku ini?'
            );

            if (!setuju) {
                return;
            }

            try {
                const hasil = await permintaan(`${API}/${id}`, {
                    method: 'DELETE'
                });

                tampilkanPesan(hasil.message || 'Buku berhasil dihapus.');

                if (String(bukuId.value) === String(id)) {
                    form.reset();
                    resetForm();
                }

                await muatBuku();
            } catch (error) {
                tampilkanPesan(error.message, true);
            }
        }

        // Memuat data saat halaman dibuka
        muatBuku();
    </script>

</body>
</html>
