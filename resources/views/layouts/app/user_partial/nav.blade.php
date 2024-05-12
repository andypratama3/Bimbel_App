<nav id="navbar" class="navbar">
    @if (request()->routeIs('register.bimbel')  || request()->routeIs('register.guru'))
        <ul>
            <li><a class="nav-link scrollto active" href="/">Home</a></li>
            <li><a class="nav-link scrollto" href="/">Tentang</a></li>
            <li><a class="nav-link scrollto" href="/">Visi Misi</a></li>
            <li><a class="nav-link scrollto" href="/">Guru</a></li>
            <li><a class="nav-link scrollto" href="/">Paket Bimbel</a></li>
            <li><a class="nav-link scrollto" href="/">Kontak</a></li>
            <li><a class="nav-link scrollto" href="{{ route('login') }}"><i class="bi bi-arrow-right font-weight-bold nav-icon" style="margin: 0 !important;"></i> Login</a></li>
        </ul>
    @else
        <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
            <li><a class="nav-link scrollto" href="#visi_misi">Visi Misi</a></li>
            <li><a class="nav-link scrollto" href="#guru">Guru</a></li>
            <li><a class="nav-link scrollto" href="#paket_bimbel">Paket Bimbel</a></li>
            <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
            <li><a class="nav-link scrollto" href="{{ route('login') }}"><i class="bi bi-arrow-right font-weight-bold nav-icon" style="margin: 0 !important;"></i> Login</a></li>
        </ul>
    @endif
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->
