<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f9f9f9; color: #333; }
        h1 { color: #2c3e50; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #3498db; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h1>Daftar Buku & Peminjaman</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Jumlah Dipinjam</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bukus as $index => $buku)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <!-- Memanggil relasi peminjamans -->
                    <td>{{ $buku->peminjamans->count() }} kali</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">Belum ada data buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>