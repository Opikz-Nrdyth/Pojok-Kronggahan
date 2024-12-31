<header>
    <div>
        <a href="/" class="company-name">Pojok Kronggahan</a>
    </div>
    <nav>
        <button class="nav-search" onclick="showSearch()"><i class="fa-solid fa-magnifying-glass"></i></button>
        <a href="/" class="nav-link">Home</a>
        <a href="/live-chat" class="nav-link">Live Chat</a>
        <a href="/panduan" class="nav-link">Panduan</a>
        <a href="/terbaru" class="nav-link">Info Terbaru</a>
        <a href="/rekomendasi" class="nav-link">Rekomendasi</a>
    </nav>
    <nav class="bars-container">
        <button class="bars" onclick="showBars()"><i class="fa-solid fa-bars"></i></button>
        <div class="bars-menu" style="display: none">
            @if (auth()->check())
                <a href="/api/logout" class="bars-link"><i
                        class="fa-solid fa-person-walking-dashed-line-arrow-right"></i>
                    Logout</a>
                @if (auth()->user()->role == 'Admin')
                    <a href="/admin" class="bars-link"><i class="fa-solid fa-user-tie"></i> Login Admin</a>
                @endif
            @else
                <a href="/admin/login" class="bars-link"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
            @endif

            <a href="/service" class="bars-link"><i class="fa-solid fa-user-gear"></i> Service</a>
            <a href="/kontak" class="bars-link"><i class="fa-solid fa-hospital-user"></i> Kontak</a>
            <div class="nav-menu">
                <a href="/live-chat" class="bars-link"><i class="fa-solid fa-headset"></i> Live Chat</a>
                <a href="/panduan" class="bars-link"><i class="fa-solid fa-book-open-reader"></i> Panduan</a>
                <a href="/terbaru" class="bars-link"><i class="fa-solid fa-circle-info"></i> Info Terbaru</a>
                <a href="/rekomendasi" class="bars-link"><i class="fa-solid fa-newspaper"></i> Rekomendasi</a>
            </div>
        </div>
    </nav>
</header>
@livewire('search')
