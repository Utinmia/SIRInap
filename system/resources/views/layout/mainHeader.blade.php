<div class="main-header">
    <header class="main-header__bottom main-header--two sticky-header sticky-header--normal">
        <div class="container-fluid">
            <div class="main-header__logo">
                <a href="{{ url('/') }}">
                    <img src="{{ url('public') }}/logo/sir_1.png" alt="Villoz HTML" width="40">
                    <img src="{{ url('public') }}/logo/sir-text.png" alt="Villoz HTML" width="125">
                </a>
            </div><!-- /.main-header__logo -->
            <nav class="main-header__nav main-menu">
                <ul class="main-menu__list">

                    <li class="{{ request()->is('/') ? 'current' : '' }}">
                        <a href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="{{ request()->is('kamar') ? 'current' : '' }}">
                        <a href="{{ url('/kamar') }}">Kamar</a>
                    </li>
                    {{-- <li class="{{ request()->is('fasilitas') ? 'current' : '' }}">
                        <a href="{{ url('/fasilitas') }}">Fasilitas</a>
                    </li> --}}
                    <li class="{{ request()->is('galeri') ? 'current' : '' }}">
                        <a href="{{ url('/galeri') }}">Galeri</a>
                    </li>

                    <li class="{{ request()->is('hubungi-kami') ? 'current' : '' }}">
                        <a href="{{ url('/hubungi-kami') }}">Hubungi Kami</a>
                    </li>

                    {{-- <li class="{{ request()->is('about') ? 'current' : '' }}">
                        <a href="{{ url('/about') }}">About</a>
                    </li> --}}

                    @if (session('user'))
                        <li class="{{ request()->is('riwayat-pemesanan') ? 'current' : '' }}">
                            <a href="{{ url('/riwayat-pemesanan') }}">Riwayat Pemesanan</a>
                        </li>
                    @endif
                </ul>
            </nav><!-- /.main-header__nav -->
            <div class="main-header__right">
                <div class="mobile-nav__btn mobile-nav__toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div><!-- /.mobile-nav__toggler -->
                <a href="@if (session('user')) {{ url('form-pesanan') }} @else {{ url('login') }} @endif"
                    class="villoz-btn villoz-btn--border main-header__btn me-3">
                    <i>Mulai Pemesanan</i>
                    <span>Mulai Pemesanan</span>
                </a><!-- /.thm-btn main-header__btn -->

                @if (!session('user'))
                    {{-- <p>{{session('user')->nama}}</p> --}}
                    <a href="{{ url('login') }}" class="villoz-btn villoz-btn--border main-header__btn">
                        <i>Masuk / Daftar</i>
                        <span>Masuk / Daftar</span>
                    </a>
                @else
                    <a href="{{ url('profile') }}" class="main-header__search">
                        <i class="icon-users" aria-hidden="true"></i>
                        <span class="sr-only">Profile</span>
                    </a>
                @endif

                {{-- <a href="{{ url('daftar-pesanan') }}" class="main-header__cart">
                    <i class="icon-shopping-cart" aria-hidden="true"></i>
                    <span class="sr-only">Shopping</span>
                </a> --}}
                <!-- /.search-toggler -->
            </div><!-- /.main-header__right -->
        </div><!-- /.container-fluid -->
    </header><!-- /.main-header -->
</div><!-- /.main-header -->
