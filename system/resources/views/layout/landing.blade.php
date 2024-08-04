<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>@yield('title', 'SIRInap - Sistem Informasi Reservasi Penginapan')</title>

    <!-- Favicon -->
    {{-- <link rel="icon" href="{{url('public/landing')}}/img/core-img/favicon.ico"> --}}
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('public') }}/logo/sir_1.png">
    {{-- <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" /> --}}
    {{-- <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png" /> --}}
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png" /> --}}

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <!-- reey font -->
    <link rel="stylesheet" href="{{ url('public/landing') }}/assets/vendors/reey-font/stylesheet.css">


    <link rel="stylesheet" href="{{ url('public/landing') }}/assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="{{ url('public/landing') }}/assets/vendors/bootstrap-select/bootstrap-select.min.css" />
    <link rel="stylesheet" href="{{ url('public/landing') }}/assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="{{ url('public/landing') }}/assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="{{ url('public/landing') }}/assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="{{ url('public/landing') }}/assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet"
        href="{{ url('public/landing') }}/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="{{ url('public/landing') }}/assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="{{ url('public/landing') }}/assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="{{ url('public/landing') }}/assets/vendors/tiny-slider/tiny-slider.css" />
    <link rel="stylesheet" href="{{ url('public/landing') }}/assets/vendors/villoz-icons/style.css" />
    <link rel="stylesheet" href="{{ url('public/landing') }}/assets/vendors/owl-carousel/css/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="{{ url('public/landing') }}/assets/vendors/owl-carousel/css/owl.theme.default.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

    <!-- template styles -->
    <link rel="stylesheet" href="{{ url('public/landing') }}/assets/css/villoz.css" />
    <link rel="stylesheet" href="{{ url('public/admin') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
    {{-- <script src="{{ url('public/admin') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark/dark.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> --}}

    <style>
        /* .banner-form__control i{
            right: 20px;
        } */
             /* warna backgronduntuk footer */
        .background-black {
            background-color: #132742 !important;
        }
        .banner-two__title {
            font-size: 40px !important;
        }

        .sec-title__title {
            font-size: 35px !important;
        }

        .preloader__image {
            width: 200px !important;
            height: 200px !important;
            background-size: contain !important;
            /* or cover, depending on your needs */
            background-repeat: no-repeat !important;
            background-position: center !important;
        }

        .page-header__bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url({{ url('public/landing/assets/images/custom/image-1.jpg') }});
            opacity: 0.3;
        }

        /* Filter */
        .banner-form__wrapper .villoz-btn {
            /* background-color: var(--villoz-base, #537eac); */
            background-color: #132742;
        }
        .banner-form__wrapper .villoz-btn > i {
            /* background-color: var(--villoz-base, #537eac); */
            background-color: #132742;
        }
        .banner-form__wrapper .villoz-btn > span {
            /* background-color: var(--villoz-black, #132742); */
            background-color: #517ca9;
        }
        /* End Filter */



        /* Main Hider / Menu Mulai Pemesanan */
        .main-header .villoz-btn {
            /* background-color: #08963c; */
        }
        .main-header .villoz-btn > i {
            /* background-color: #08963c; */
        }
        .main-header .villoz-btn > span {
            /* background-color: #066027;
            color: #fff; */
        }
        /* End Main Hider / Menu Mulai Pemesanan */

        

        /* .villa-card__flash__label {
            background-color: #559E35 !important;
        } */
        .img_kamar {
            background-size: cover !important;
            background-position: center !important;
        }

        @media (min-width: 992px) {
            .contact-map {
                padding: 80px 0;
            }
        }

        @media (min-width: 768px) {
            .main-footer__top {
                padding: 50px 0px;
            }
        }
    </style>

    @yield('styles')

</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <!-- .preloader -->
    <div class="preloader">
        <div class="preloader__image" style="background-image: url({{ url('public') }}/logo/sirinap_2.png);"></div>
    </div>
    <!-- /.preloader -->

    <div class="page-wrapper">
        @include('layout.mainHeader')

        @yield('content')

        <!-- .main-footer -->
        <footer class="main-footer background-black">
            <div class="main-footer__bg background-black"></div>
            <!-- /.main-footer__bg -->
            <div class="main-footer__top">

                <div class="container">
                    <a href="index.html" class="main-footer__logo">
                        <img src="{{ url('public') }}/logo/sir_1.png" width="40" height="40"
                            alt="Villoz HTML Template">
                        <img src="{{ url('public') }}/logo/sir-text.png" width="130" height="40"
                            alt="Villoz HTML Template">
                    </a>
                    {{-- <div class="main-footer__social">
                        <a href="https://twitter.com">
                            <i class="fab fa-twitter" aria-hidden="true"></i>
                            <span class="sr-only">Twitter</span>
                        </a>
                        <a href="https://facebook.com">
                            <i class="fab fa-facebook" aria-hidden="true"></i>
                            <span class="sr-only">Facebook</span>
                        </a>
                        <a href="https://web.whatsapp.com/">
                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                            <span class="sr-only">Whatsapp </span>
                        </a>
                        <a href="https://instagram.com">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                            <span class="sr-only">Instagram</span>
                        </a>
                    </div> --}}
                    <span style="color: white">© Copyright 2024 by <a href="#">Penginapan Nur Aini</a></span>

                </div><!-- /.container -->
            </div><!-- /.main-footer__top -->
        </footer>
        <!-- /.main-footer -->

    </div>

    @include('layout.mobileNav')

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="#">
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="villoz-btn villoz-btn--base">
                    <i><i class="icon-magnifying-glass"></i></i>
                    <span><i class="icon-magnifying-glass"></i></span>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->


    <a href="#" class="scroll-top">
        <svg class="scroll-top__circle" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </a>

    <script src="{{ url('public/landing') }}/assets/vendors/jquery/jquery-3.7.0.min.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/tiny-slider/tiny-slider.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/wow/wow.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/tilt/tilt.jquery.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/simpleParallax/simpleParallax.min.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/imagesloaded/imagesloaded.min.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/isotope/isotope.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/countdown/countdown.min.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/jquery-circleType/jquery.circleType.js"></script>
    <script src="{{ url('public/landing') }}/assets/vendors/jquery-lettering/jquery.lettering.min.js"></script>
    <!-- template js -->

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    
    <script src="{{ url('public/landing') }}/assets/js/villoz.js"></script>

    {{-- <script src="{{ url('public/admin') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script> --}}

    <script>
        function formatRupiah(angka) {
            var number_string = angka.toString();
            var split = number_string.split(',');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;
        }
    </script>

    @yield('scripts')
</body>

</html>
