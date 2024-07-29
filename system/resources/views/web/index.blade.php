@extends('layout.landing')

@section('title', 'SIRInap - Sistem Informasi Reservasi Penginapan')

@section('content')

    <!-- main-slider-start -->
    <section class="banner-two">
        <div class="banner-two__carousel villoz-owl__carousel owl-carousel owl-theme"
            data-owl-options='{
                "items": 1,
                "margin": 0,
                "loop": true,
                "smartSpeed": 700,
                "animateOut": "fadeOut",
                "autoplayTimeout": 5000, 
                "nav": true,
                "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
                "dots": false,
                "autoplay": true
                }'>
            
            <div class="item">
                <div class="banner-two__image"
                    style="background-image: url({{ url('public/landing') }}/assets/images/custom/image-1.jpg);">
                </div>
            </div>
            <div class="item">
                <div class="banner-two__image"
                    style="background-image: url({{ url('public/landing') }}/assets/images/custom/image-2.jpg);">
                </div>
            </div>
            <div class="item">
                <div class="banner-two__image"
                    style="background-image: url({{ url('public/landing') }}/assets/images/custom/image-3.jpg);">
                </div>
            </div>
            {{-- <div class="item">
                <div class="banner-two__image"
                    style="background-image: url({{ url('public/landing') }}/assets/images/custom/img_4.jpeg);">
                </div>
            </div> --}}
        </div><!-- banner slider -->
        <div class="banner-two__content">
            <div class="container">
                <div class="banner-two__content__top wow fadeInUp" data-wow-delay="300ms">
                    <h2 class="banner-two__title">
                        {{-- <span style="background-image: url({{url('public/landing')}}/assets/images/shapes/title-bg-shape.png);"
                        class="banner-two__title__sub">
                        <span>Happiness Guaranteed</span>
                    </span> --}}
                        Penginapan Nur Aini <br> "Penginapan Bernuansa Syari'ah"
                    </h2>
                    <p class="banner-two__text">Silahkan Mampir dan Rasakan Sensasinya</p>
                </div>

                @include('layout.filter')

            </div>
        </div>
    </section>
    <!-- main-slider-end -->
    <section class="feature-two"
        style="background-image: url({{ url('public/landing') }}/assets/images/shapes/feature-two-bg.jpg);">
        <div class="container">
            <div class="row gutter-y-30">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="feature-two__item">
                        <div class="feature-two__item__icon"><span class="icon-cashback"></span></div>
                        <h3 class="feature-two__item__title">Jaminan Harga Terbaik</h3>
                        <p class="feature-two__item__text">Kami menjamin Anda mendapatkan harga terbaik untuk setiap
                            pemesanan.
                        </p>
                    </div><!-- feature-item -->
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="feature-two__item">
                        <div class="feature-two__item__icon"><span class="icon-booking"></span></div>
                        <h3 class="feature-two__item__title">Pemesanan Mudah & Cepat</h3>
                        <p class="feature-two__item__text">Lakukan pemesanan kamar dengan proses yang mudah dan cepat.
                        </p>
                    </div><!-- feature-item -->
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="feature-two__item">
                        <div class="feature-two__item__icon"><span class="icon-house"></span></div>
                        <h3 class="feature-two__item__title">Pilihan Kamar Berfariasi</h3>
                        <p class="feature-two__item__text">Nikmati berbagai pilihan kamar yang sesuai dengan kebutuhan dan
                            preferensi Anda.
                        </p>
                    </div><!-- feature-item -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.feature-two -->

    <section class="villa-two">
        <div class="container">
            <div class="sec-title text-center">

                <h6 class="sec-title__tagline">Daftar Kamar yang Kami Sewakan</h6><!-- /.sec-title__tagline -->

                <h3 class="sec-title__title">Temukan kamar yang sempurna <br> untuk kebutuhan Anda di penginapan kami. </h3>
                <!-- /.sec-title__title -->
            </div><!-- /.sec-title -->
            <div class="villa-two__carousel villoz-owl__carousel villoz-owl__carousel--with-shadow villoz-owl__carousel--basic-nav owl-carousel owl-theme"
                data-owl-options='{
                    "items": 1,
                    "margin": 30,
                    "loop": false,
                    "smartSpeed": 700,
                    "nav": false,
                    "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                    "dots": false,
                    "autoplay": true,
                    "responsive": {
                        "0": {
                            "items": 1
                        },
                        "768": {
                            "items": 2
                        },
                        "1024": {
                            "items": 3
                        },
                        "1400": {
                            "items": 4
                        }
                    }
                    }'>

                @foreach ($list_kamar as $kamar)
                    <div class="item">
                        <div class="villa-card-two wow fadeInUp" data-wow-delay="400ms">
                            <div class="villa-card__flash">
                                <p class="villa-card__flash__label">{{ $kamar->status }}</p>
                            </div>
                            <div class="villa-card-two__image">
                                @if ($kamar->galeri->isNotEmpty())
                                    @php
                                        $firstImage = $kamar->galeri->first()->url_gambar;
                                        $imageUrl = url('system/storage/app/public/' . $firstImage);
                                    @endphp
                                    <img class="img_kamar" src="{{ $imageUrl }}" alt="Gambar Kamar">
                                @else
                                    <small>Belum ada gambar untuk kamar ini.</small>
                                @endif
                                {{-- <a href="javascript:void(0)" class="villa-card-two__like"><span
                                    class="fas fa-heart"></span></a><!-- /.villa-card-two__like --> --}}
                                <div class="villa-card-two__content">
                                    <div class="villa-card-two__btns">
                                        <a class="villoz-image-popup" href="#"
                                            data-gallery-options='{
                                            "items": [
                                                @foreach ($kamar->galeri as $galeri)
                                                    {
                                                        "src": "{{ url('system/storage/app/public/' . $galeri->url_gambar) }}"
                                                    }
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif 
                                                @endforeach
                                            ],
                                            "gallery": {
                                            "enabled": true
                                            },
                                            "type": "image"
                                        }'>
                                            <span class="icon-camera"></span>
                                            <span class="villa-card-two__btns__count">{{ $kamar->galeri->count() }}</span>
                                        </a>
                                        {{-- <a class="video-popup" href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                            class="icon-video"></span></a> --}}
                                    </div>
                                    {{-- <div class="villa-card-two__ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div> --}}
                                    <p class="villa-card-two__address">{{ $kamar->nomor_kamar }}</p>
                                    <h3 class="villa-card-two__title"><a
                                            href="{{ url('detail-kamar/' . $kamar->id_kamar) }}">{{ $kamar->tipe_kamar }}</a></h3>
                                    <!-- /.villa-card-two__title -->
                                    <div class="villa-card-two__price">Rp {{ number_format($kamar->harga,0,',','.') }}
                                        <span class="villa-card-two__price__shift">/Malam</span>
                                    </div>
                                </div><!-- /.villa-card-two__content -->
                            </div><!-- /.villa-card-two__image -->
                            <ul class="list-unstyled villa-card-two__meta">
                                @php
                                    switch ($kamar->tipe_kamar) {
                                        case 'Single Bed':
                                            echo '
                                                <li><span class="icon-bed"></span>1 bed</li>
                                                <li><span class="icon-bath"></span>1 bath</li>
                                                <li><span class="icon-users"></span>1 guest</li>';
                                            break;

                                        case 'Double Bed':
                                            echo '
                                                <li><span class="icon-bed"></span>2 beds</li>
                                                <li><span class="icon-bath"></span>1 bath</li>
                                                <li><span class="icon-users"></span>2 guests</li>';
                                            break;

                                        case 'Family Bed':
                                            echo '
                                                <li><span class="icon-bed"></span>1 bed</li>
                                                <li><span class="icon-bath"></span>1 baths</li>
                                                <li><span class="icon-users"></span>4 guests</li>';
                                            break;

                                        default:
                                            echo 'Tipe kamar tidak diketahui';
                                            break;
                                    }
                                @endphp
                            </ul><!-- /.list-unstyled villa-card-two__meta -->
                        </div><!-- /.villa-card-two -->
                    </div><!-- /.item -->
                @endforeach
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.villa-two -->

    {{-- <section class="tab-two" style="background-image: url({{url('public/landing')}}/{{url('public/landing')}}/assets/images/backgrounds/tab-bg-2.jpg);">
        <div class="container tabs-box">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="sec-title text-left">

                        <h6 class="sec-title__tagline">Enjoy villas</h6><!-- /.sec-title__tagline -->

                        <h3 class="sec-title__title">See Villas Highlights</h3><!-- /.sec-title__title -->
                    </div><!-- /.sec-title --><!-- section-title -->
                </div>
                <div class="col-lg-5 col-md-6">
                    <p class="tab-two__text">
                        Powerful corporate social responsibility, grantmaking, and employee engagement strategies.
                        Our impact is about more than moving money to where it’s needed most.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <ul class="list-unstyled tab-buttons tab-two__list">
                        <li data-tab="#well_curated_experience" class="tab-btn active-btn">Well Curated Experience
                        </li>
                        <li data-tab="#unforgetable_events" class="tab-btn">Unforgetable Events</li>
                        <li data-tab="#daily_housekeeping" class="tab-btn">Daily Housekeeping</li>
                        <li data-tab="#concierge_services" class="tab-btn">Concierge Services</li>
                        <li data-tab="#dine_drinks" class="tab-btn">Dine & Drinks</li>
                    </ul><!-- /.list-unstyledf -->
                </div>
                <div class="col-xl-8">
                    <div class="tabs-content">
                        <div class="tab fadeInUp animated active-tab" id="well_curated_experience">
                            <div class="tab-two__content">
                                <div class="villoz-stretch-element-inside-column">
                                    <div class="tab-two__content__img"><img src="assets/images/resources/tab-2-1.jpg"
                                            alt="villoz"></div>
                                </div>
                                <div class="tab-two__content__info">
                                    <div class="tab-two__content__info__top"
                                        style="background-image: url({{url('public/landing')}}/assets/images/shapes/tab-info-bg-2.png);">
                                        <h4 class="tab-two__content__info__title">Well Curated Experience</h4>
                                        <p class="tab-two__content__info__text">
                                            Powerful corporate social responsibility and employee engagement strategies.
                                            Impact is about more than moving.
                                        </p>
                                    </div>
                                    <a class="tab-two__content__info__rm" href="about.html">Read More<span
                                            class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="unforgetable_events">
                            <div class="tab-two__content">
                                <div class="villoz-stretch-element-inside-column">
                                    <div class="tab-two__content__img"><img src="assets/images/resources/tab-2-2.jpg"
                                            alt="villoz"></div>
                                </div>
                                <div class="tab-two__content__info">
                                    <div class="tab-two__content__info__top"
                                        style="background-image: url({{url('public/landing')}}/assets/images/shapes/tab-info-bg-2.png);">
                                        <h4 class="tab-two__content__info__title">Unforgetable Events</h4>
                                        <p class="tab-two__content__info__text">
                                            Powerful corporate social responsibility and employee engagement strategies.
                                            Impact is about more than moving.
                                        </p>
                                    </div>
                                    <a class="tab-two__content__info__rm" href="about.html">Read More<span
                                            class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="daily_housekeeping">
                            <div class="tab-two__content">
                                <div class="villoz-stretch-element-inside-column">
                                    <div class="tab-two__content__img"><img src="assets/images/resources/tab-2-3.jpg"
                                            alt="villoz"></div>
                                </div>
                                <div class="tab-two__content__info">
                                    <div class="tab-two__content__info__top"
                                        style="background-image: url({{url('public/landing')}}/assets/images/shapes/tab-info-bg-2.png);">
                                        <h4 class="tab-two__content__info__title">Daily Housekeeping</h4>
                                        <p class="tab-two__content__info__text">
                                            Powerful corporate social responsibility and employee engagement strategies.
                                            Impact is about more than moving.
                                        </p>
                                    </div>
                                    <a class="tab-two__content__info__rm" href="about.html">Read More<span
                                            class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="concierge_services">
                            <div class="tab-two__content">
                                <div class="villoz-stretch-element-inside-column">
                                    <div class="tab-two__content__img"><img src="assets/images/resources/tab-2-4.jpg"
                                            alt="villoz"></div>
                                </div>
                                <div class="tab-two__content__info">
                                    <div class="tab-two__content__info__top"
                                        style="background-image: url({{url('public/landing')}}/assets/images/shapes/tab-info-bg-2.png);">
                                        <h4 class="tab-two__content__info__title">Concierge Services</h4>
                                        <p class="tab-two__content__info__text">
                                            Powerful corporate social responsibility and employee engagement strategies.
                                            Impact is about more than moving.
                                        </p>
                                    </div>
                                    <a class="tab-two__content__info__rm" href="about.html">Read More<span
                                            class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="dine_drinks">
                            <div class="tab-two__content">
                                <div class="villoz-stretch-element-inside-column">
                                    <div class="tab-two__content__img"><img src="assets/images/resources/tab-2-5.jpg"
                                            alt="villoz"></div>
                                </div>
                                <div class="tab-two__content__info">
                                    <div class="tab-two__content__info__top"
                                        style="background-image: url({{url('public/landing')}}/assets/images/shapes/tab-info-bg-2.png);">
                                        <h4 class="tab-two__content__info__title">Dine & Drinks</h4>
                                        <p class="tab-two__content__info__text">
                                            Powerful corporate social responsibility and employee engagement strategies.
                                            Impact is about more than moving.
                                        </p>
                                    </div>
                                    <a class="tab-two__content__info__rm" href="about.html">Read More<span
                                            class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- tab-two -->
    
    <section class="video-one">
        <div class="container">
            <div class="video-one__content wow fadeInUp" data-wow-delay="100ms">
                <div class="video-one__bg" style="background-image: url({{url('public/landing')}}/assets/images/resources/video-bg-1.jpg);">
                </div>
                <div class="video-one__shape" style="background-image: url({{url('public/landing')}}/assets/images/resources/video-bg-shape.png);">
                </div>
                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="video-popup">
                    <i class="fa fa-play"></i>
                    <span class="video-popup__border-one"></span>
                    <span class="video-popup__border-two"></span>
                </a>
                <h3 class="video-one__title">Enjoy the Taste of Life</h3>
            </div>
        </div>
    </section>
    <section class="fact-one" style="background-image: url({{url('public/landing')}}/assets/images/backgrounds/funfact-bg-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="fact-one__item text-center"
                        style="background-image: url({{url('public/landing')}}/assets/images/shapes/funfact-border.png);">
                        <div class="fact-one__item__icon"><span class="icon-house"></span></div>
                        <!-- /.fact-one__icon -->
                        <div class="fact-one__item__count">
                            <span class="count-box">
                                <span class="count-text" data-stop="920" data-speed="1500"></span>
                            </span>
                        </div><!-- /.fact-one__count -->
                        <h3 class="fact-one__item__title">Luxury Villas</h3><!-- /.fact-one__title -->
                    </div><!-- /.fact-one__item -->
                </div><!-- /.col-lg-3 col-md-6 -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="fact-one__item text-center"
                        style="background-image: url({{url('public/landing')}}/assets/images/shapes/funfact-border.png);">
                        <div class="fact-one__item__icon"><span class="icon-recommend"></span></div>
                        <!-- /.fact-one__icon -->
                        <div class="fact-one__item__count">
                            <span class="count-box">
                                <span class="count-text" data-stop="28" data-speed="1500"></span>K
                            </span>
                        </div><!-- /.fact-one__count -->
                        <h3 class="fact-one__item__title">Five Star Rating</h3><!-- /.fact-one__title -->
                    </div><!-- /.fact-one__item -->
                </div><!-- /.col-lg-3 col-md-6 -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="fact-one__item text-center"
                        style="background-image: url({{url('public/landing')}}/assets/images/shapes/funfact-border.png);">
                        <div class="fact-one__item__icon"><span class="icon-refugee"></span></div>
                        <!-- /.fact-one__icon -->
                        <div class="fact-one__item__count">
                            <span class="count-box">
                                <span class="count-text" data-stop="80" data-speed="1500"></span>K
                            </span>
                        </div><!-- /.fact-one__count -->
                        <h3 class="fact-one__item__title">International Guests</h3><!-- /.fact-one__title -->
                    </div><!-- /.fact-one__item -->
                </div><!-- /.col-lg-3 col-md-6 -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="fact-one__item text-center"
                        style="background-image: url({{url('public/landing')}}/assets/images/shapes/funfact-border.png);">
                        <div class="fact-one__item__icon"><span class="icon-hot-coffee"></span></div>
                        <!-- /.fact-one__icon -->
                        <div class="fact-one__item__count">
                            <span class="count-box">
                                <span class="count-text" data-stop="990" data-speed="1500"></span>
                            </span>
                        </div><!-- /.fact-one__count -->
                        <h3 class="fact-one__item__title">Breakfast Served</h3><!-- /.fact-one__title -->
                    </div><!-- /.fact-one__item -->
                </div><!-- /.col-lg-3 col-md-6 -->
            </div>
            <div class="fact-one__bottom">
                <div class="fact-one__bottom__bg"
                    style="background-image: url({{url('public/landing')}}/assets/images/backgrounds/funfact-bg-1-bottom.jpg);"></div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="fact-one__bottom__image"><img src="assets/images/resources/funfact-1-1.jpg"
                                alt="villoz"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="fact-one__bottom__content">
                            <h3 class="fact-one__bottom__title">See Premium Choice<br> for Vacation<br> Rentals</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="about.html" class="villoz-btn">
                                        <i>Discover More</i>
                                        <span>Discover More</span>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <p class="fact-one__bottom__text">
                                        There are many variations of passages of ipsum available, but the majority have
                                        suffered in some form, by injected humour words.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="client-carousel client-carousel--with-border">
        <div class="container">
            <div class="client-carousel__one villoz-owl__carousel owl-theme owl-carousel"
                data-owl-options='{
        "items": 5,
        "margin": 65,
        "smartSpeed": 700,
        "loop":true,
        "autoplay": 6000,
        "nav":false,
        "dots":false,
        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
        "responsive":{
            "0":{
                "items":1,
                "margin": 0
            },
            "360":{
                "items":2,
                "margin": 0
            },
            "575":{
                "items":3,
                "margin": 30
            },
            "768":{
                "items":3,
                "margin": 40
            },
            "992":{
                "items": 4,
                "margin": 40
            },
            "1200":{
                "items": 5
            }
        }
        }'>
                <div class="client-carousel__one__item">
                    <img src="assets/images/resources/brand-1-1.png" alt="villoz">
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel__one__item">
                    <img src="assets/images/resources/brand-1-1.png" alt="villoz">
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel__one__item">
                    <img src="assets/images/resources/brand-1-1.png" alt="villoz">
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel__one__item">
                    <img src="assets/images/resources/brand-1-1.png" alt="villoz">
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel__one__item">
                    <img src="assets/images/resources/brand-1-1.png" alt="villoz">
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel__one__item">
                    <img src="assets/images/resources/brand-1-1.png" alt="villoz">
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel__one__item">
                    <img src="assets/images/resources/brand-1-1.png" alt="villoz">
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel__one__item">
                    <img src="assets/images/resources/brand-1-1.png" alt="villoz">
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel__one__item">
                    <img src="assets/images/resources/brand-1-1.png" alt="villoz">
                </div><!-- /.owl-slide-item-->
                <div class="client-carousel__one__item">
                    <img src="assets/images/resources/brand-1-1.png" alt="villoz">
                </div><!-- /.owl-slide-item-->
            </div><!-- /.thm-owl__slider -->
        </div><!-- /.container -->
    </div><!-- /.client-carousel -->
    <section class="tab-one">
        <div class="container">
            <div class="row tabs-box">
                <div class="col-xl-6">
                    <div class="tab-one__left">
                        <div class="sec-title text-left">

                            <h6 class="sec-title__tagline">other features</h6><!-- /.sec-title__tagline -->

                            <h3 class="sec-title__title">We’re Providing Villas Services & Amenities for You</h3>
                            <!-- /.sec-title__title -->
                        </div><!-- /.sec-title --><!-- section-title -->
                        <ul class="list-unstyled tab-buttons tab-one__list">
                            <li data-tab="#housekeeping" class="tab-btn">House Keeping<span
                                    class="fas fa-arrow-right"></span></li>
                            <li data-tab="#quality_food" class="tab-btn active-btn">Quality Food<span
                                    class="fas fa-arrow-right"></span></li>
                            <li data-tab="#massages" class="tab-btn">Best Massages<span
                                    class="fas fa-arrow-right"></span></li>
                            <li data-tab="#events" class="tab-btn">Events<span class="fas fa-arrow-right"></span>
                            </li>
                        </ul><!-- /.list-unstyledf -->
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="tabs-content">
                        <div class="tab fadeInUp animated" id="housekeeping">
                            <div class="tab-one__content">
                                <div class="tab-one__content__map"><img src="assets/images/resources/about-1-map.png"
                                        alt="villoz"></div>
                                <div class="tab-one__content__img"><img src="assets/images/resources/tab-1.jpg"
                                        alt="villoz"></div>
                                <div class="tab-one__content__info"
                                    style="background-image: url({{url('public/landing')}}/assets/images/resources/tab-info-bg.jpg);">
                                    <h4 class="tab-one__content__info__title">House Keeping</h4>
                                    <p class="tab-one__content__info__text">
                                        The unthinkable today becomes inevitable. Lorem ipsum dolor sit do amet, simply
                                        free text consectetur adipiscing.
                                    </p>
                                    <a class="tab-one__content__info__rm" href="about.html"><span
                                            class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab active-tab fadeInUp animated" id="quality_food">
                            <div class="tab-one__content">
                                <div class="tab-one__content__map"><img src="assets/images/resources/about-1-map.png"
                                        alt="villoz"></div>
                                <div class="tab-one__content__img"><img src="assets/images/resources/tab-2.jpg"
                                        alt="villoz"></div>
                                <div class="tab-one__content__info"
                                    style="background-image: url({{url('public/landing')}}/assets/images/resources/tab-info-bg.jpg);">
                                    <h4 class="tab-one__content__info__title">Quality Food</h4>
                                    <p class="tab-one__content__info__text">
                                        The unthinkable today becomes inevitable. Lorem ipsum dolor sit do amet, simply
                                        free text consectetur adipiscing.
                                    </p>
                                    <a class="tab-one__content__info__rm" href="about.html"><span
                                            class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="massages">
                            <div class="tab-one__content">
                                <div class="tab-one__content__map"><img src="assets/images/resources/about-1-map.png"
                                        alt="villoz"></div>
                                <div class="tab-one__content__img"><img src="assets/images/resources/tab-3.jpg"
                                        alt="villoz"></div>
                                <div class="tab-one__content__info"
                                    style="background-image: url({{url('public/landing')}}/assets/images/resources/tab-info-bg.jpg);">
                                    <h4 class="tab-one__content__info__title">Best Massages</h4>
                                    <p class="tab-one__content__info__text">
                                        The unthinkable today becomes inevitable. Lorem ipsum dolor sit do amet, simply
                                        free text consectetur adipiscing.
                                    </p>
                                    <a class="tab-one__content__info__rm" href="about.html"><span
                                            class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab fadeInUp animated" id="events">
                            <div class="tab-one__content">
                                <div class="tab-one__content__map"><img src="assets/images/resources/about-1-map.png"
                                        alt="villoz"></div>
                                <div class="tab-one__content__img"><img src="assets/images/resources/tab-4.jpg"
                                        alt="villoz"></div>
                                <div class="tab-one__content__info"
                                    style="background-image: url({{url('public/landing')}}/assets/images/resources/tab-info-bg.jpg);">
                                    <h4 class="tab-one__content__info__title">Events</h4>
                                    <p class="tab-one__content__info__text">
                                        The unthinkable today becomes inevitable. Lorem ipsum dolor sit do amet, simply
                                        free text consectetur adipiscing.
                                    </p>
                                    <a class="tab-one__content__info__rm" href="about.html"><span
                                            class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- tab-one -->
    <section class="testimonials-two">
        <div class="testimonials-two__bg" style="background-image: url({{url('public/landing')}}/assets/images/backgrounds/testimonial-bg-2.png);">
        </div>
        <!-- /.testimonials__bg -->
        <div class="testimonials-two__inner"></div><!-- /.testimonials__border -->
        <div class="container">
            <div class="testimonials-two__wrapper">
                <div class="testimonials-two__carousel villoz-owl__carousel owl-theme owl-carousel"
                    data-owl-options='{
            "items": 1,
            "margin": 0,
            "smartSpeed": 700,
            "loop":true,
            "autoplay": true,
            "nav":false,
            "URLhashListener":true,
            "dots":false,
            "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow\"></span>"]
            }'>
                    <!-- Testimonial Item -->
                    <div class="item" data-hash="item1">
                        <div class="testimonials-two__item">
                            <div class="testimonials-two__item__ratings">
                                <span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                    class="fa fa-star"></span><span class="fa fa-star"></span><span
                                    class="fa fa-star"></span>
                            </div>
                            <div class="testimonials-two__item__quote">
                                Thank you very much for courteous and professional service. Lisa and I had a great trip
                                and. Lipsum is simply free text available in market.
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial Item -->
                    <!-- Testimonial Item -->
                    <div class="item" data-hash="item2">
                        <div class="testimonials-two__item">
                            <div class="testimonials-two__item__ratings">
                                <span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                    class="fa fa-star"></span><span class="fa fa-star"></span><span
                                    class="fa fa-star"></span>
                            </div>
                            <div class="testimonials-two__item__quote">
                                Thank you very much for courteous and professional service. Lisa and I had a great trip
                                and. Lipsum is simply free text available in market.
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial Item -->
                    <!-- Testimonial Item -->
                    <div class="item" data-hash="item3">
                        <div class="testimonials-two__item">
                            <div class="testimonials-two__item__ratings">
                                <span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                    class="fa fa-star"></span><span class="fa fa-star"></span><span
                                    class="fa fa-star"></span>
                            </div>
                            <div class="testimonials-two__item__quote">
                                Thank you very much for courteous and professional service. Lisa and I had a great trip
                                and. Lipsum is simply free text available in market.
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial Item -->
                    <!-- Testimonial Item -->
                    <div class="item" data-hash="item4">
                        <div class="testimonials-two__item">
                            <div class="testimonials-two__item__ratings">
                                <span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                    class="fa fa-star"></span><span class="fa fa-star"></span><span
                                    class="fa fa-star"></span>
                            </div>
                            <div class="testimonials-two__item__quote">
                                Thank you very much for courteous and professional service. Lisa and I had a great trip
                                and. Lipsum is simply free text available in market.
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial Item -->
                    <!-- Testimonial Item -->
                    <div class="item" data-hash="item5">
                        <div class="testimonials-two__item">
                            <div class="testimonials-two__item__ratings">
                                <span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                    class="fa fa-star"></span><span class="fa fa-star"></span><span
                                    class="fa fa-star"></span>
                            </div>
                            <div class="testimonials-two__item__quote">
                                Thank you very much for courteous and professional service. Lisa and I had a great trip
                                and. Lipsum is simply free text available in market.
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial Item -->
                </div>
                <!-- Testimonial Thumb -->
                <div class="testimonials-two__carousel-thumb villoz-owl__carousel owl-theme owl-carousel"
                    data-owl-options='{
            "items": 5,
            "margin": 40,
            "smartSpeed": 700,
            "loop":true,
            "autoplay": true,
            "URLhashListener":true,
            "center": true,
            "dots":false,
            "responsive": {
                "0": {
                    "items": 3
                },
                "500": {
                    "items": 5
                }
            }
            }'>
                    <a href="#item1" class="item" data-hash="item1">
                        <span class="testimonials-two__meta-thumb"><img src="assets/images/resources/testi-2-1.jpg"
                                alt="villoz"></span>
                        <span class="testimonials-two__meta">
                            <span class="testimonials-two__meta__name">Mike Hardson</span>
                            <span class="testimonials-two__meta__designation">Customer</span>
                        </span>
                    </a><!-- testimonial-author -->
                    <a href="#item2" class="item" data-hash="item2">
                        <span class="testimonials-two__meta-thumb"><img src="assets/images/resources/testi-2-2.jpg"
                                alt="villoz"></span>
                        <span class="testimonials-two__meta">
                            <span class="testimonials-two__meta__name">Mike Hardson</span>
                            <span class="testimonials-two__meta__designation">Customer</span>
                        </span>
                    </a><!-- testimonial-author -->
                    <a href="#item3" class="item" data-hash="item3">
                        <span class="testimonials-two__meta-thumb"><img src="assets/images/resources/testi-2-3.jpg"
                                alt="villoz"></span>
                        <span class="testimonials-two__meta">
                            <span class="testimonials-two__meta__name">Mike Hardson</span>
                            <span class="testimonials-two__meta__designation">Customer</span>
                        </span>
                    </a><!-- testimonial-author -->
                    <a href="#item4" class="item" data-hash="item4">
                        <span class="testimonials-two__meta-thumb"><img src="assets/images/resources/testi-2-4.jpg"
                                alt="villoz"></span>
                        <span class="testimonials-two__meta">
                            <span class="testimonials-two__meta__name">Mike Hardson</span>
                            <span class="testimonials-two__meta__designation">Customer</span>
                        </span>
                    </a><!-- testimonial-author -->
                    <a href="#item5" class="item" data-hash="item5">
                        <span class="testimonials-two__meta-thumb"><img src="assets/images/resources/testi-2-5.jpg"
                                alt="villoz"></span>
                        <span class="testimonials-two__meta">
                            <span class="testimonials-two__meta__name">Mike Hardson</span>
                            <span class="testimonials-two__meta__designation">Customer</span>
                        </span>
                    </a><!-- testimonial-author -->
                </div>
                <!-- Testimonial Thumb -->
            </div><!-- /.testimonials-two__carousel -->
        </div><!-- /.container -->
    </section><!-- /.testimonials-two -->
    <section class="blog-one">
        <div class="container">
            <div class="sec-title text-center">

                <h6 class="sec-title__tagline">Our Blog Posts</h6><!-- /.sec-title__tagline -->

                <h3 class="sec-title__title">Latest News & Articles <br>from the Blog</h3><!-- /.sec-title__title -->
            </div><!-- /.sec-title -->
            <div class="blog-one__carousel villoz-owl__carousel villoz-owl__carousel--with-shadow villoz-owl__carousel--basic-nav owl-carousel owl-theme"
                data-owl-options='{
        "items": 1,
        "margin": 30,
        "loop": false,
        "smartSpeed": 700,
        "nav": false,
        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
        "dots": true,
        "autoplay": false,
        "responsive": {
            "0": {
                "items": 1
            },
            "768": {
                "items": 2
            },
            "992": {
                "items": 3
            }
        }
        }'>
                <div class="item">
                    <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'>
                        <div class="blog-card__image">
                            <img src="assets/images/blog/blog-1-1.png" alt="10 advantages of staying in a luxury villa">
                            <img src="assets/images/blog/blog-1-1.png" alt="10 advantages of staying in a luxury villa">
                            <img src="assets/images/blog/blog-1-1.png" alt="10 advantages of staying in a luxury villa">
                            <a href="blog-details-right.html" class="blog-card__image__link"><span class="sr-only">10
                                    advantages of staying in a luxury villa</span>
                                <!-- /.sr-only --></a>
                            <div class="blog-card__date"><span>28</span>
                                July</div><!-- /.blog-card__date -->
                        </div><!-- /.blog-card__image -->
                        <div class="blog-card__content">
                            <ul class="list-unstyled blog-card__meta">
                                <li><a href="blog-list.html">
                                        <i class="fa fa-user-circle"></i>
                                        by Admin</a></li>
                                <li><a href="blog-details-right.html">
                                        <i class="fa fa-comments"></i>
                                        2 Comments</a></li>
                            </ul><!-- /.list-unstyled blog-card__meta -->
                            <h3 class="blog-card__title"><a href="blog-details-right.html">10 advantages of staying in
                                    a luxury villa</a></h3><!-- /.blog-card__title -->
                            <a href="blog-details-right.html" class="blog-card__link">
                                Read More
                                <i class="icon-right-arrow"></i>
                            </a><!-- /.blog-card__link -->
                        </div><!-- /.blog-card__content -->
                    </div><!-- /.blog-card -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='100ms'>
                        <div class="blog-card__image">
                            <img src="assets/images/blog/blog-1-2.png" alt="Live a balanced life in a premium villa">
                            <img src="assets/images/blog/blog-1-2.png" alt="Live a balanced life in a premium villa">
                            <img src="assets/images/blog/blog-1-2.png" alt="Live a balanced life in a premium villa">
                            <a href="blog-details-right.html" class="blog-card__image__link"><span class="sr-only">Live a
                                    balanced life in a premium villa</span>
                                <!-- /.sr-only --></a>
                            <div class="blog-card__date"><span>28</span>
                                July</div><!-- /.blog-card__date -->
                        </div><!-- /.blog-card__image -->
                        <div class="blog-card__content">
                            <ul class="list-unstyled blog-card__meta">
                                <li><a href="blog-list.html">
                                        <i class="fa fa-user-circle"></i>
                                        by Admin</a></li>
                                <li><a href="blog-details-right.html">
                                        <i class="fa fa-comments"></i>
                                        2 Comments</a></li>
                            </ul><!-- /.list-unstyled blog-card__meta -->
                            <h3 class="blog-card__title"><a href="blog-details-right.html">Live a balanced life in a
                                    premium villa</a></h3><!-- /.blog-card__title -->
                            <a href="blog-details-right.html" class="blog-card__link">
                                Read More
                                <i class="icon-right-arrow"></i>
                            </a><!-- /.blog-card__link -->
                        </div><!-- /.blog-card__content -->
                    </div><!-- /.blog-card -->
                </div><!-- /.item -->
                <div class="item">
                    <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='200ms'>
                        <div class="blog-card__image">
                            <img src="assets/images/blog/blog-1-3.png" alt="Get villas with a high level of privacy">
                            <img src="assets/images/blog/blog-1-3.png" alt="Get villas with a high level of privacy">
                            <img src="assets/images/blog/blog-1-3.png" alt="Get villas with a high level of privacy">
                            <a href="blog-details-right.html" class="blog-card__image__link"><span class="sr-only">Get
                                    villas with a high level of privacy</span>
                                <!-- /.sr-only --></a>
                            <div class="blog-card__date"><span>28</span>
                                July</div><!-- /.blog-card__date -->
                        </div><!-- /.blog-card__image -->
                        <div class="blog-card__content">
                            <ul class="list-unstyled blog-card__meta">
                                <li><a href="blog-list.html">
                                        <i class="fa fa-user-circle"></i>
                                        by Admin</a></li>
                                <li><a href="blog-details-right.html">
                                        <i class="fa fa-comments"></i>
                                        2 Comments</a></li>
                            </ul><!-- /.list-unstyled blog-card__meta -->
                            <h3 class="blog-card__title"><a href="blog-details-right.html">Get villas with a high
                                    level of privacy</a></h3><!-- /.blog-card__title -->
                            <a href="blog-details-right.html" class="blog-card__link">
                                Read More
                                <i class="icon-right-arrow"></i>
                            </a><!-- /.blog-card__link -->
                        </div><!-- /.blog-card__content -->
                    </div><!-- /.blog-card -->
                </div><!-- /.item -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.blog-one -->
    <section class="gallery-two">
        <div class="container">
            <div class="gallery-two__carousel villoz-owl__carousel  villoz-owl__carousel--basic-nav owl-carousel owl-theme"
                data-owl-options='{
        "items": 6,
        "margin": 30,
        "loop": false,
        "smartSpeed": 700,
        "nav": false,
        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
        "dots": false,
        "autoplay": true,
        "responsive": {
            "0": {
                "items": 1
            },
            "360": {
                "items": 2,
                "margin": 20
            },
            "575": {
                "items": 3
            },
            "992": {
                "items": 4
            },
            "1200": {
                "items": 5
            },
            "1365": {
                "items": 6
            }
        }
        }'>
                <div class="item">
                    <div class="gallery-two__card">
                        <img src="assets/images/gallery/gallery-2-1.jpg" alt="">
                        <div class="gallery-two__card__hover">
                            <a href="assets/images/gallery/gallery-2-1.jpg" class="img-popup">
                                <span class="gallery-two__card__icon"></span>
                            </a>
                        </div><!-- /.gallery-two__card__hover -->
                    </div><!-- /.gallery-two__card -->
                </div><!-- /.col-md-6 col-lg-4 -->
                <div class="item">
                    <div class="gallery-two__card">
                        <img src="assets/images/gallery/gallery-2-2.jpg" alt="">
                        <div class="gallery-two__card__hover">
                            <a href="assets/images/gallery/gallery-2-2.jpg" class="img-popup">
                                <span class="gallery-two__card__icon"></span>
                            </a>
                        </div><!-- /.gallery-two__card__hover -->
                    </div><!-- /.gallery-two__card -->
                </div><!-- /.col-md-6 col-lg-4 -->
                <div class="item">
                    <div class="gallery-two__card">
                        <img src="assets/images/gallery/gallery-2-3.jpg" alt="">
                        <div class="gallery-two__card__hover">
                            <a href="assets/images/gallery/gallery-2-3.jpg" class="img-popup">
                                <span class="gallery-two__card__icon"></span>
                            </a>
                        </div><!-- /.gallery-two__card__hover -->
                    </div><!-- /.gallery-two__card -->
                </div><!-- /.col-md-6 col-lg-4 -->
                <div class="item">
                    <div class="gallery-two__card">
                        <img src="assets/images/gallery/gallery-2-4.jpg" alt="">
                        <div class="gallery-two__card__hover">
                            <a href="assets/images/gallery/gallery-2-4.jpg" class="img-popup">
                                <span class="gallery-two__card__icon"></span>
                            </a>
                        </div><!-- /.gallery-two__card__hover -->
                    </div><!-- /.gallery-two__card -->
                </div><!-- /.col-md-6 col-lg-4 -->
                <div class="item">
                    <div class="gallery-two__card">
                        <img src="assets/images/gallery/gallery-2-5.jpg" alt="">
                        <div class="gallery-two__card__hover">
                            <a href="assets/images/gallery/gallery-2-5.jpg" class="img-popup">
                                <span class="gallery-two__card__icon"></span>
                            </a>
                        </div><!-- /.gallery-two__card__hover -->
                    </div><!-- /.gallery-two__card -->
                </div><!-- /.col-md-6 col-lg-4 -->
                <div class="item">
                    <div class="gallery-two__card">
                        <img src="assets/images/gallery/gallery-2-6.jpg" alt="">
                        <div class="gallery-two__card__hover">
                            <a href="assets/images/gallery/gallery-2-6.jpg" class="img-popup">
                                <span class="gallery-two__card__icon"></span>
                            </a>
                        </div><!-- /.gallery-two__card__hover -->
                    </div><!-- /.gallery-two__card -->
                </div><!-- /.col-md-6 col-lg-4 -->
            </div><!-- /.gallery-two__carousel -->
        </div><!-- /.container -->
    </section><!-- /.gallery-two -->
    <section class="cta-two">
        <div class="container">
            <div class="blog-one__carousel villoz-owl__carousel villoz-owl__carousel--with-shadow villoz-owl__carousel--basic-nav owl-carousel owl-theme"
                data-owl-options='{
        "items": 1,
        "margin": 0,
        "loop": true,
        "smartSpeed": 700,
        "nav": false,
        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
        "dots": false,
        "autoplay": true
        }'>
                <h3 class="cta-two__title">Luxury Villa Rentals. The Privacy and Comfort of a Home with the
                    Convenience of Hotel Services</h3>
                <h3 class="cta-two__title">Lavishness Villa Rentals. The Privacy and Comfort of a Home with the
                    Convenience of Hotel Services</h3>
            </div>
        </div><!-- /.container -->
    </section><!-- /.cta-one --> --}}

@endsection
