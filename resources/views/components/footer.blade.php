<div class="footer">
    <div class="row">
        @foreach ($socialMedia as $sosmed)
            <a href="{{ $sosmed['url'] }}" class="brand-icon">{!! $sosmed['icon'] !!}</a>
        @endforeach

    </div>

    <div class="row">
        <ul>
            <li><a href="/service">Hubungi kami</a></li>
            <li><a href="#">Layanan Kami</a></li>
            <li><a href="#">Kebijakan Privasi</a></li>
            <li><a href="#">Syarat & Ketentuan</a></li>
        </ul>
    </div>

    <div class="row">
        Hak Cipta © {{ date('Y') }} Pojok Kronggahan - Semua hak dilindungi undang-undang || Dirancang Oleh: Piny
    </div>
</div>
