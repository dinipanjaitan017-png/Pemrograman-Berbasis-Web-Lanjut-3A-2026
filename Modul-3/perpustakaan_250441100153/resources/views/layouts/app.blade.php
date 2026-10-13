<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Perpustakaan Digital')
    </title>

    @vite(['resources/css/app.css'])
</head>

<body>

    <!-- HEADER + NAVBAR -->
    <header class="header">
        <div class="container navbar">

            <a href="{{ route('home') }}" class="brand">
                <div class="brand-icon">
                    📚
                </div>

                <div>
                    <h1>Perpustakaan</h1>
                    <span>Digital Library</span>
                </div>
            </a>

            <nav class="nav-menu">

                <a
                    href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'active' : '' }}"
                >
                    Beranda
                </a>

                <a
                    href="{{ route('buku.index') }}"
                    class="{{ request()->routeIs('buku.*') ? 'active' : '' }}"
                >
                    Daftar Buku
                </a>

            </nav>

        </div>
    </header>


    <!-- KONTEN -->
    <main>
        @yield('content')
    </main>


    <!-- FOOTER -->
    <footer class="footer">

        <div class="container footer-content">

            <div>
                <h3>Perpustakaan Digital</h3>
                <p>
                    Temukan berbagai buku dan pengetahuan
                    dalam satu tempat.
                </p>
            </div>

            <div class="footer-right">
                <p>&copy; {{ date('Y') }} Perpustakaan Digital</p>
                <p>Laravel 13 • PBWL Modul 1</p>
            </div>

        </div>

    </footer>

</body>
</html>