@extends('layout.landing')

@section('title', 'SIRInap - Sistem Informasi Reservasi Penginapan')

@section('content')

    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <ul class="villoz-breadcrumb list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>Hubungi Kami</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
            <h2 class="page-header__title">Hubungi Kami</h2>
        </div><!-- /.container -->
        <div class="banner-form__position wow fadeInUp" data-wow-delay="300ms">
            <div class="container">

                @include('layout.filter')

            </div>
        </div>
    </section><!-- /.page-header -->

    {{-- Content --}}
    <section class="contact-map">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.7517392063123!2d109.97928807311534!3d-1.8441916364864999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e05184448de2413%3A0x1298cdf7147a4dd4!2s%22Nur%20Aini%22!5e0!3m2!1sen!2sid!4v1720832433766!5m2!1sen!2sid"
                        width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!4v1720832735255!6m8!1m7!1sDl7MRuGFGSidc-fs_ThvVA!2m2!1d-1.844076196540858!2d109.981831454699!3f140.87848976914879!4f-3.0934843168551254!5f0.4000000000000002"
                        width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <!-- /.google-map -->
        </div><!-- /.container-fluid -->
    </section><!-- /.contact-map -->

    <section class="feature-two" style="background-image: url(assets/images/shapes/feature-two-bg.jpg);">
        <div class="container">
            <div class="row gutter-y-30">
                <div class="col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="100ms"
                    style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                    <div class="feature-two__item">
                        <div class="feature-two__item__icon"><span class="icon-phone-call-1"></span></div>
                        <h3 class="feature-two__item__title">Telepon Penginapan</h3>
                        <p class="feature-two__item__text">Telp. +62 821-4309-2226</p>
                    </div><!-- feature-item -->
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="200ms"
                    style="visibility: visible; animation-delay: 200ms; animation-name: fadeInUp;">
                    <div class="feature-two__item">
                        <div class="feature-two__item__icon"><span class="icon-at"></span></div>
                        <h3 class="feature-two__item__title">Email Penginapan</h3>
                        <p class="feature-two__item__text">penginapan_nur_aini@gmail.com</p>
                    </div><!-- feature-item -->
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp animated" data-wow-delay="300ms"
                    style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="feature-two__item">
                        <div class="feature-two__item__icon"><span class="icon-villa"></span></div>
                        <h3 class="feature-two__item__title">Alamat Penginapan</h3>
                        <p class="feature-two__item__text" style="line-height: 1.3">Jl. Panembahan Bandala, Mulia Baru, Delta Pawan, Kabupaten Ketapang, Kalimantan Barat 78813</p>
                    </div><!-- feature-item -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

@endsection
