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
                    @if (session('user'))
                        <li class="{{ request()->is('riwayat-pemesanan') ? 'current' : '' }}">
                            <a href="{{ url('/riwayat-pemesanan') }}">Riwayat Pemesanan</a>
                        </li>
                    @endif

                    {{-- <li class="dropdown">
                        <a href="#">Kamar</a>
                        <ul>
                            <li><a href="about.html">About Page</a></li>
                            <li><a href="team.html">Our Team</a></li>
                            <li><a href="team-carousel.html">Team Carousel</a></li>
                            <li><a href="team-details.html">Team Details</a></li>
                            <li><a href="reviews.html">Reviews</a></li>
                            <li><a href="reviews-carousel.html">Reviews Carousel</a></li>
                            <li><a href="packages.html">Packages</a></li>
                            <li><a href="packages-carousel.html">Packages Carousel</a></li>
                            <li>
                                <a href="gallery.html">Gallery</a>
                                <ul>
                                    <li><a href="gallery.html">Gallery Masonry</a></li>
                                    <li><a href="gallery-filter.html">Gallery Filter</a></li>
                                    <li><a href="gallery-grid.html">Gallery Grid</a></li>
                                    <li><a href="gallery-carousel.html">Gallery Carousel</a></li>
                                </ul>
                            </li>
                            <li><a href="faq.html">FAQs</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="404.html">404 Error</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Destination</a>
                        <ul>
                            <li><a href="destination.html">Destination One</a></li>
                            <li><a href="destination-2.html">Destination Two</a></li>
                            <li><a href="destination-carousel.html">Destination Carousel</a></li>
                            <li><a href="destination-details.html">Destination Details</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Villa</a>
                        <ul>
                            <li class="dropdown">
                                <a href="#">Villa Grid One</a>
                                <ul>
                                    <li><a href="villa-grid-1.html">No Sidebar</a></li>
                                    <li><a href="villa-grid-1-left.html">Left Sidebar</a></li>
                                    <li><a href="villa-grid-1-right.html">Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">Villa Grid Two</a>
                                <ul>
                                    <li><a href="villa-grid-2.html">No Sidebar</a></li>
                                    <li><a href="villa-grid-2-left.html">Left Sidebar</a></li>
                                    <li><a href="villa-grid-2-right.html">Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">Villa List</a>
                                <ul>
                                    <li><a href="villa-list.html">No Sidebar</a></li>
                                    <li><a href="villa-list-left.html">Left Sidebar</a></li>
                                    <li><a href="villa-list-right.html">Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">Villa Carousel</a>
                                <ul>
                                    <li><a href="villa-carousel-1.html">Carousel One</a></li>
                                    <li><a href="villa-carousel-2.html">Carousel Two</a></li>
                                    <li><a href="villa-carousel-3.html">Carousel Three</a></li>
                                </ul>
                            </li>
                            <li><a href="villa-details.html">Villa Details One</a></li>
                            <li><a href="villa-details-2.html">Villa Details Two</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Shop</a>
                        <ul class="sub-menu">
                            <li class="dropdown">
                                <a href="#">Products</a>
                                <ul class="sub-menu">
                                    <li><a href="products.html">No Sidebar</a></li>
                                    <li><a href="products-left.html">Left Sidebar</a></li>
                                    <li><a href="products-right.html">Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="products-carousel.html">Products Carousel</a></li>
                            <li><a href="product-details.html">Product Details</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">News</a>
                        <ul class="sub-menu">
                            <li class="dropdown">
                                <a href="#">News Grid</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-grid.html">No Sidebar</a></li>
                                    <li><a href="blog-grid-left.html">Left Sidebar</a></li>
                                    <li><a href="blog-grid-right.html">Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">News List</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-list.html">No Sidebar</a></li>
                                    <li><a href="blog-list-left.html">Left Sidebar</a></li>
                                    <li><a href="blog-list-right.html">Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="blog-carousel.html">News Carousel</a></li>
                            <li class="dropdown">
                                <a href="#">News Details</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-details.html">No Sidebar</a></li>
                                    <li><a href="blog-details-left.html">Left Sidebar</a></li>
                                    <li><a href="blog-details-right.html">Right Sidebar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li> --}}
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
