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
            @auth
                @if(Auth::user()->role == 3)
                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <i class="bi bi-box-arrow-right"></i>
                    <span> LogOut</span>
                </a>
                @else
                <li><a class="nav-link scrollto" href="{{ route('dashboard') }}"><i class="bi bi-arrow-right font-weight-bold nav-icon" style="margin: 0 !important;"></i> Dashboard</a></li>
                @endif
            @else
                <li><a class="nav-link scrollto" href="{{ route('login') }}"><i class="bi bi-arrow-right font-weight-bold nav-icon" style="margin: 0 !important;"></i> Login</a></li>

            @endauth
        </ul>
    @endif
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->
