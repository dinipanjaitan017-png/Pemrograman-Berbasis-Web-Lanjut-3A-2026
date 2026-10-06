<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Perpustakaan Digital')</title>

    @vite(['resources/css/app.css'])
</head>
<body>

    {{-- HEADER --}}
    <header class="site-header">
        <div class="container header-inner">
            <span class="logo-icon">📚</span>
            <h1 class="app-name">Perpustakaan Digital</h1>
        </div>
    </header>

    {{-- NAVBAR --}}
    <nav class="navbar">
        <div class="container navbar-inner">
            <a href="{{ route('home') }}"
               class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('buku.index') }}"
               class="{{ request()->routeIs('buku.*') ? 'active' : '' }}">Daftar Buku</a>
        </div>
    </nav>

    {{-- KONTEN --}}
    <main class="container content">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="site-footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Perpustakaan Digital &mdash; Dibangun dengan Laravel 13 &amp; Blade.</p>
        </div>
    </footer>

</body>
</html>