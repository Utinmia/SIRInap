@extends('layout.landing')

@section('title', 'SIRInap - Sistem Informasi Reservasi Penginapan')

@section('content')

    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <ul class="villoz-breadcrumb list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>Kamar</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
            <h2 class="page-header__title">Daftar Kamar</h2>
        </div><!-- /.container -->
        <div class="banner-form__position wow fadeInUp" data-wow-delay="300ms">
            <div class="container">

                @include('layout.filter')

            </div>
        </div>
    </section><!-- /.page-header -->
    <section class="villa-page">
        <div class="container tabs-box">
            <div class="tabs-content">
                <div class="tab active-tab" id="grid">
                    <div class="row gutter-y-30">
                        @foreach ($list_kamar as $kamar)
                            <div class="col-lg-4 col-md-6">
                                <div class="villa-card wow fadeInUp" data-wow-delay="100ms">
                                    <div class="villa-card__image">
                                        @if ($kamar->galeri->isNotEmpty())
                                            @php
                                                $firstImage = $kamar->galeri->first()->url_gambar;
                                                $imageUrl = url('system/storage/app/public/' . $firstImage);
                                            @endphp
                                            <img class="img_kamar" src="{{ $imageUrl }}" alt="Gambar Kamar">
                                        @else
                                            <small>Belum ada gambar untuk kamar ini.</small>
                                        @endif
                                        {{-- <img src="{{ url('public/landing') }}/assets/images/custom/{{url($kamar->galeri->url_gambar)}}"> --}}
                                        {{-- <a href="javascript:void(0)" class="villa-card__like">
                                        <span class="fas fa-heart"></span>
                                    </a> --}}
                                        <!-- /.villa-card__like -->
                                        <div class="villa-card__flash">
                                            <p class="villa-card__flash__label">{{ $kamar->status }}</p>
                                        </div>
                                        <!-- /.villa-card__label -->
                                        <div class="villa-card__btns">
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
                                                {{-- {
                                                    "src": "{{ url('system/storage/app/public/' . $galeri->url_gambar) }}"
                                                },  --}} @endforeach
                                                ],
                                                "gallery": {
                                                "enabled": true
                                                },
                                                "type": "image"
                                            }'>
                                                <span class="icon-camera"></span>
                                                <span class="villa-card__btns__count">{{ $kamar->galeri->count() }}</span>
                                            </a>
                                            {{-- <a class="video-popup" href="https://www.youtube.com/watch?v=0MuL8fd3pb8">
                                            <span class="icon-video"></span>
                                        </a> --}}
                                        </div>
                                    </div><!-- /.villa-card__image -->
                                    <div class="villa-card__content">
                                        {{-- <div class="villa-card__ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div> --}}
                                        {{-- <p class="villa-card__address">Disle-Sur-Mer, Southwest, France</p> --}}
                                        <h3 class="villa-card__title">
                                            <a href="{{ url('detail-kamar/' . $kamar->id_kamar) }}">
                                                {{ $kamar->tipe_kamar }} - {{ $kamar->nomor_kamar }}
                                            </a>
                                        </h3>
                                        <!-- /.villa-card__title -->

                                        {{-- harga kamar --}}
                                        <div class="villa-card__price">Rp {{ $kamar->harga }} 
                                            <span class="villa-card__price__shift">/ Malam</span>
                                        </div>

                                        {{-- <div class="villa-card__price">Rp {{ number_format($kamar->harga,0,',','.') }} 
                                            <span class="villa-card__price__shift">/ Malam</span>
                                        </div> --}}
                                        
                                        {{-- end harga kamar --}}

                                        <ul class="list-unstyled villa-card__meta">
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
                                        </ul><!-- /.list-unstyled villa-card__meta -->
                                    </div><!-- /.villa-card__content -->
                                </div><!-- /.villa-card -->
                            </div><!-- /.item -->
                        @endforeach
                    </div><!-- /.row -->

                </div>
            </div>
        </div>
    </section>

@endsection
