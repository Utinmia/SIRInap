@extends('layout.landing')

@section('title', 'SIRInap - Sistem Informasi Reservasi Penginapan')

@section('content')

    <style>
        .banner-form__control {
            position: relative;
            padding: 0px 0px 0;
            border-right: 1px solid var(--villoz-border-color, #d6e2f0);
        }
    </style>

    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <ul class="villoz-breadcrumb list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>Detail Kamar</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
            <h2 class="page-header__title">Detail Kamar</h2>
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <section class="villa-details-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-5">
                    <div class="villa-details-one__info">
                        {{-- <p class="villa-details-one__address">Jl. Panembahan Bandala</p> --}}
                        <h3 class="villa-details-one__title">{{ $kamar->tipe_kamar }} - {{ $kamar->nomor_kamar }}</h3>
                        <div class="villa-details-one__price-wrap">
                            <div class="villa-details-one__price">
                                Rp {{ number_format($kamar->harga,0,',','.') }} <span class="villa-details-one__price__shift">/ Malam</span></div>
                            {{-- <div class="villa-details-one__flash">
                                <p class="villa-details-one__flash__label off">10% Off</p>
                            </div> --}}
                        </div>
                    </div>
                </div>
                @php
                    switch ($kamar->tipe_kamar) {
                        case 'Single Bed':
                            $bedrooms = '1';
                            $bathroom = '1';
                            $guest = '1';
                            $size = '4 m x 3 m';
                            $ringkasan = '<h5>Pengalaman Menginap yang Nyaman dan Praktis</h5>
                                Kamar Single Bed kami dirancang khusus untuk Anda yang bepergian sendiri atau bersama pasangan.
                                Dengan suasana yang hangat dan fasilitas yang memadai, kami menjamin pengalaman menginap yang nyaman
                                dan tenang';
                            break;

                        case 'Double Bed':
                            $bedrooms = '2';
                            $bathroom = '1';
                            $guest = '2';
                            $size = '5 m x 4 m';
                            $ringkasan = '<h5>Pengalaman Menginap yang Luas dan Nyaman</h5>
                                Kamar Double Bed kami ideal untuk keluarga kecil atau teman yang bepergian bersama. 
                                Dirancang dengan sentuhan elegan dan kenyamanan, kamar ini menyediakan ruang yang lebih luas dan 
                                fasilitas lengkap untuk pengalaman menginap yang tak terlupakan.';
                            break;

                        // case 'Family Bed':
                        //     $bedrooms = '1';
                        //     $bathroom = '1';
                        //     $guest = '4';
                        //     $size = '7 m x 4 m';
                        //     $ringkasan = '<h5>Pengalaman Menginap yang Luas dan Menyenangkan untuk Keluarga</h5>
                        //         Kamar Family Bed kami dirancang khusus untuk keluarga atau grup yang membutuhkan ruang lebih luas dan 
                        //         kenyamanan ekstra. Dengan fasilitas lengkap dan desain yang hangat, 
                        //         kamar ini memastikan seluruh anggota keluarga menikmati pengalaman menginap yang menyenangkan.';
                        //     break;

                        default:
                            echo '';
                            break;
                    }
                @endphp

                <div class="col-lg-8 col-xl-7">
                    <div class="villa-details-one__meta">
                        <div class="villa-details-one__meta__item">
                            <div class="villa-details-one__meta__icon"><span class="icon-bed"></span></div>
                            <h5 class="villa-details-one__meta__number">{{ $bedrooms }}</h5>
                            <p class="villa-details-one__meta__name">Bedroom</p>
                        </div><!-- meta-item -->
                        <div class="villa-details-one__meta__item">
                            <div class="villa-details-one__meta__icon"><span class="icon-bath"></span></div>
                            <h5 class="villa-details-one__meta__number">{{ $bathroom }}</h5>
                            <p class="villa-details-one__meta__name">Bathroom</p>
                        </div><!-- meta-item -->
                        <div class="villa-details-one__meta__item">
                            <div class="villa-details-one__meta__icon"><span class="icon-guests"></span></div>
                            <h5 class="villa-details-one__meta__number">{{ $guest }}</h5>
                            <p class="villa-details-one__meta__name">Guests</p>
                        </div><!-- meta-item -->
                        <div class="villa-details-one__meta__item">
                            <div class="villa-details-one__meta__icon"><span class="icon-square-measument"></span></div>
                            <h5 class="villa-details-one__meta__number">{{ $size }}</h5>
                            <p class="villa-details-one__meta__name">Room Size</p>
                        </div><!-- meta-item -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="villa-details-two">
        <div class="container">
            <div class="villa-details-two__wrapper">

            </div>
        </div>
    </section>

    <section class="villa-details-three">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="villa-details-three__gallery">
                        <div class="villa-details-three__gallery__carousel villoz-owl__carousel owl-carousel owl-theme"
                            data-owl-options='{
                                "items": 1,
                                "margin": 0,
                                "loop": true,
                                "smartSpeed": 700,
                                "animateOut": "slideOutDown",
                                "autoplayTimeout": 6000, 
                                "nav": true,
                                "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
                                "dots": false,
                                "autoplay": true
                                }'>

                            @foreach ($kamar->galeri as $galeri)
                                <div class="item">
                                    <div class="villa-details-three__gallery__image">
                                        <img src="{{ url('system/storage/app/public/' . $galeri->url_gambar) }}"
                                            alt="villa">
                                    </div>
                                </div><!-- gallery-item -->
                            @endforeach
                        </div><!-- gallery-slider -->
                        <div class="villa-details-three__gallery__btns">
                            <a class="villoz-image-popup" href="#"
                                data-gallery-options='{
                        "items": [
                            @foreach ($kamar->galeri as $galeri)
                                {
                                    "src": "{{ url('system/storage/app/public/' . $galeri->url_gambar) }}"
                                }
                                @if (!$loop->last)
                                    ,
                                @endif @endforeach
                        ],
                        "gallery": {
                        "enabled": true
                        },
                        "type": "image"
                    }'>
                                <span class="icon-camera"></span><span class="villa-card-two__btns__count">{{ $kamar->galeri->count() }}</span>
                            </a>
                            {{-- <a class="video-popup" href="https://www.youtube.com/watch?v=0MuL8fd3pb8">
                                <span class="icon-video"></span>
                            </a> --}}
                        </div>
                    </div>
                    <div class="villa-details-three__content">
                        <h4 class="villa-details-three__content__title">Ringkasan</h4>
                        <p class="villa-details-three__content__text">
                            {!! $ringkasan !!}
                        </p>
                        <div class="villa-details-three__content__divider"></div>
                        <h4 class="villa-details-three__content__title">Fasilitas</h4>
                        <ul class="villa-details-three__lists">
                            @if ($kamar->tipe_kamar == 'Single Bed')
                                <li><span class="fas fa-check"></span>Tempat Tidur</li>
                            @elseif($kamar->tipe_kamar == 'Double Bed')
                                <li><span class="fas fa-check"></span>Dua Tempat Tidur</li>
                            @elseif($kamar->tipe_kamar == 'Family Bed')
                                <li><span class="fas fa-check"></span>Tempat Tidur Besar</li>
                            @endif

                            <li><span class="fas fa-check"></span>Kamar Mandi</li>
                            <li><span class="fas fa-check"></span>AC</li>
                            <li><span class="fas fa-check"></span>TV Cable</li>
                            <li><span class="fas fa-check"></span>WiFi Gratis</li>
                            <li><span class="fas fa-check"></span>Meja Kerja</li>
                            <li><span class="fas fa-check"></span>Lemari Pakaian</li>
                        </ul>

                        <h4 class="villa-details-three__content__title mb32">Lokasi</h4>
                        <div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.7517392063123!2d109.97928807311534!3d-1.8441916364864999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e05184448de2413%3A0x1298cdf7147a4dd4!2s%22Nur%20Aini%22!5e0!3m2!1sen!2sid!4v1720832433766!5m2!1sen!2sid"
                                width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <!-- /.google-map -->

                        <div class="result"></div><!-- /.result -->
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="villa-sidebar ">
                        <h3 class="villa-sidebar__title">FORM PESANAN</h3>
                        <hr>
                        @php
                            $actionUrl = session('user') ? route('pesan.store') : url('/login');
                            $method = session('user') ? 'POST' : 'GET';
                        @endphp
                        <form class="p-4" action="{{ $actionUrl }}" method="{{ $method }}">
                            @csrf
                            <input type="text" name="id_kamars" id="id_kamars" value="{{ $kamar->id_kamar }}"
                                data-harga="{{ $kamar->harga }}" hidden>
                            {{-- <div class="card-body"> --}}
                            <div class="banner-form__control">
                                <label for="checkin">Checkin</label>
                                <input class="villoz-datepicker" id="checkin" type="text" name="checkin"
                                    placeholder="Masukkan Tanggal">
                                <i class="icon-calendar"></i>
                            </div>
                            <div class="banner-form__control">
                                <label for="checkout">Checkout</label>
                                <input class="villoz-datepicker" id="checkout" type="text" name="checkout"
                                    placeholder="Masukkan Tanggal">
                                <i class="icon-calendar"></i>
                            </div>
                            <hr>
                            <div style="display: flex; justify-content: space-between;">
                                Total <span id="total_biaya">0</span>
                            </div>
                            <hr>
                            {{-- </div> --}}
                            <button type="submit" aria-label="search submit" class="btn btn-success form-control">
                                {{-- <i class="fas fa-plus"></i> --}}
                                <span><i class="fas fa-plus"></i> Pesan Sekarang</span>
                            </button>
                            {{-- </div> --}}
                        </form>
                    </div>
                </div>

                {{-- <div class="col-lg-4">
                    <div class="villa-details-sidebar">
                        <div class="villa-details-sidebar__booking">
                            <h4 class="villa-details-sidebar__booking__title">Form Pesanan</h4>
                            @php
                                $actionUrl = session('user') ? route('pesan.store') : url('/login');
                                $method = session('user') ? 'POST' : 'GET';
                            @endphp
                            <form class="p-4" action="{{ $actionUrl }}" method="{{ $method }}">
                                @csrf
                                <input type="text" name="id_kamars" value="{{ $kamar->id_kamar }}" hidden>
                                <div class="villa-details-sidebar__control">
                                    <label for="checkin">Checkin</label>
                                    <input class="form-control" id="checkin" type="date" name="checkin"
                                        placeholder="Select Date">
                                </div>
                                <div class="villa-details-sidebar__control">
                                    <label for="checkout">Checkout</label>
                                    <input class="form-control" id="checkout" type="date" name="checkout"
                                        placeholder="Select Date">
                                </div>
                                <div class="villa-details-sidebar__total">Total<span>$160.00</span></div>

                                <button type="submit" class="villoz-btn form-control">
                                    <i>Pesan Sekarang</i>
                                    <span>Pesan Sekarang</span>
                                </button>

                            </form>
                            <div class="result"></div><!-- /.result -->
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            function hitungTotalBiaya() {
                var checkin = $('#checkin').datepicker('getDate');
                var checkout = $('#checkout').datepicker('getDate');
                var id_kamar = $('#id_kamars').val();

                // if (checkin && checkout && id_kamar) {
                // Menghitung selisih hari
                var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                var selisihHari = Math.round(Math.abs((checkin - checkout) / oneDay));

                // Mengambil harga per malam dari option terpilih
                var hargaPerMalam = $('#id_kamars').data('harga');

                // Menghitung total biaya
                var totalBiaya = selisihHari * hargaPerMalam;

                // Menetapkan nilai total biaya ke input
                $('#total_biaya').text('Rp ' + formatRupiah(totalBiaya));

            }

            // Inisialisasi datepicker untuk elemen dengan kelas 'villoz-datepicker'
            $(".villoz-datepicker").datepicker({
                dateFormat: 'yy-mm-dd', // Format tanggal yang diinginkan
                onSelect: hitungTotalBiaya // Panggil fungsi hitungTotalBiaya saat tanggal dipilih
            });

            // $('#id_kamars').on('change',hitungTotalBiaya);
            // $('#checkin').on('change', function() {
            //     // alert("tes");

            //     hitungTotalBiaya(); // Panggil fungsi hitungTotalBiaya di sini
            // });

            $('#checkout').on('change', function() {
                // alert("tes");

                hitungTotalBiaya(); // Panggil fungsi hitungTotalBiaya di sini
            });
        });
    </script>
@endsection
