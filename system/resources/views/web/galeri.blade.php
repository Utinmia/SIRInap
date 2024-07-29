@extends('layout.landing')

@section('title', 'SIRInap - Sistem Informasi Reservasi Penginapan')

@section('content')

    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <ul class="villoz-breadcrumb list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>Galeri</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
            <h2 class="page-header__title">Galeri</h2>
        </div><!-- /.container -->
        <div class="banner-form__position wow fadeInUp" data-wow-delay="300ms">
            <div class="container">

                @include('layout.filter')

            </div>
        </div>
    </section><!-- /.page-header -->

    <section class="gallery-one gallery-one--page">
        <div class="container">
            <div class="text-center">
                <ul class="list-unstyled post-filter gallery-one__filter__list">
                    <li class="active" data-filter=".filter-item"><span>all</span></li>
                    <li data-filter=".single-bed"><span>Single Bed</span></li>
                    <li data-filter=".double-bed"><span>Double Bed</span></li>
                    <li data-filter=".lain-lain"><span>Lain-lain</span></li>
                </ul><!-- /.list-unstyledf -->
            </div><!-- /.text-center -->
            <div class="row filter-layout">
                @foreach($list_galeri as $galeri)
                @php
                    $tipe_kamar = strtolower(str_replace(' ', '-', $galeri->kamar->tipe_kamar));
                @endphp
                <div class="col-md-6 col-lg-3 filter-item {{$tipe_kamar}}">
                    <div class="gallery-one__card">
                        <img src="{{ url('system/storage/app/public/' . $galeri->url_gambar) }}" alt="">
                        <div class="gallery-one__card__hover">
                            <a href="{{ url('system/storage/app/public/' . $galeri->url_gambar) }}" class="img-popup">
                                <span class="gallery-one__card__icon"></span>
                            </a>
                        </div><!-- /.gallery-one__card__hover -->
                    </div><!-- /.gallery-one__card -->
                </div><!-- /.col-md-6 col-lg-4 -->
                @endforeach
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.gallery-one -->
@endsection
