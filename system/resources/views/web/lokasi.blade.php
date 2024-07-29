@extends('layout.landing')

@section('title', 'SIRInap - Sistem Informasi Reservasi Penginapan')

@section('content')

    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <ul class="villoz-breadcrumb list-unstyled">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><span>Lokasi</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
            <h2 class="page-header__title">Lokasi Penginapan</h2>
        </div><!-- /.container -->
        <div class="banner-form__position wow fadeInUp" data-wow-delay="300ms">
            <div class="container">

                @include('layout.filter')
                
            </div>
        </div>
    </section><!-- /.page-header -->
    <section class="villa-page">
        <div class="container tabs-box">
            <div class="villa-page__info-top">
                <div class="villa-page__showing-text">Showing 1–9 of 12 Results</div><!-- villa-show-item -->
                <ul class="villa-page__nav tab-buttons list-unstyled">
                    <li data-tab="#list" class="tab-btn"><span class="icon-list"></span></li>
                    <li data-tab="#grid" class="tab-btn active-btn"><span class="icon-grid"></span></li>
                </ul><!-- villa-tab -->
                <div class="villa-page__showing-sort">
                    <select class="selectpicker" aria-label="Sort by ratings">
                        <option selected>Sort by ratings</option>
                        <option value="1">Sort by popular</option>
                        <option value="1">Sort by view</option>
                        <option value="2">Sort by price</option>
                    </select>
                </div><!-- villa-sorting -->
            </div>
            <div class="tabs-content">
                <div class="tab" id="list">
                    <div class="row gutter-y-30">
                        <div class="col-lg-12">
                            <div class="villa-card-list villa-card-list--full-width wow fadeInUp" data-wow-delay="100ms">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-5">
                                        <div class="villa-card-list__image">
                                            <img src="assets/images/villa/villa-list-1-big.jpg" alt="villoz">
                                            <a href="javascript:void(0)" class="villa-card-list__like"><span
                                                    class="fas fa-heart"></span></a><!-- /.villa-card-list__like -->
                                            <div class="villa-card-list__flash">
                                                <p class="villa-card-list__flash__label feature">Featured</p>
                                            </div><!-- /.villa-card-list__label -->
                                        </div><!-- /.villa-card-list__image -->
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="villa-card-list__content">
                                            <div class="villa-card-list__btns">
                                                <a class="villoz-image-popup" href="#"
                                                    data-gallery-options='{
                                        "items": [
                                          {
                                            "src": "assets/images/villa/villa-list-1-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-2-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-3-big.jpg"
                                          }
                                        ],
                                        "gallery": {
                                          "enabled": true
                                        },
                                        "type": "image"
                                    }'><span
                                                        class="icon-camera"></span><span
                                                        class="villa-card-list__btns__count">3</span></a>
                                                <a class="video-popup"
                                                    href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                        class="icon-video"></span></a>
                                            </div>
                                            <div class="villa-card-list__ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p class="villa-card-list__address">Disle-Sur-Mer, Southwest, France</p>
                                            <h3 class="villa-card-list__title"><a href="villa-details.html">The Lake
                                                    House</a></h3><!-- /.villa-card-list__title -->
                                            <div class="villa-card-list__price">$160 <span
                                                    class="villa-card-list__price__shift">/ Night</span></div>
                                            <ul class="list-unstyled villa-card-list__meta">
                                                <li><span class="icon-bed"></span>3 beds</li>
                                                <li><span class="icon-bath"></span>2 baths</li>
                                                <li><span class="icon-users"></span>12 guests</li>
                                            </ul><!-- /.list-unstyled villa-card-list__meta -->
                                        </div><!-- /.villa-card-list__content -->
                                    </div>
                                </div>
                            </div><!-- /.villa-card-list -->
                        </div>
                        <div class="col-lg-12">
                            <div class="villa-card-list villa-card-list--full-width wow fadeInUp" data-wow-delay="150ms">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-5">
                                        <div class="villa-card-list__image">
                                            <img src="assets/images/villa/villa-list-2-big.jpg" alt="villoz">
                                            <a href="javascript:void(0)" class="villa-card-list__like"><span
                                                    class="fas fa-heart"></span></a><!-- /.villa-card-list__like -->
                                            <div class="villa-card-list__flash">
                                                <p class="villa-card-list__flash__label off">10% Off</p>
                                            </div><!-- /.villa-card-list__label -->
                                        </div><!-- /.villa-card-list__image -->
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="villa-card-list__content">
                                            <div class="villa-card-list__btns">
                                                <a class="villoz-image-popup" href="#"
                                                    data-gallery-options='{
                                        "items": [
                                          {
                                            "src": "assets/images/villa/villa-list-2-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-2-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-3-big.jpg"
                                          }
                                        ],
                                        "gallery": {
                                          "enabled": true
                                        },
                                        "type": "image"
                                    }'><span
                                                        class="icon-camera"></span><span
                                                        class="villa-card-list__btns__count">3</span></a>
                                                <a class="video-popup"
                                                    href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                        class="icon-video"></span></a>
                                            </div>
                                            <div class="villa-card-list__ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p class="villa-card-list__address">Disle-Sur-Mer, Southwest, France</p>
                                            <h3 class="villa-card-list__title"><a href="villa-details.html">Restore the
                                                    Chateau</a></h3><!-- /.villa-card-list__title -->
                                            <div class="villa-card-list__price"><span
                                                    class="villa-card-list__price__disable">$230</span> $200 <span
                                                    class="villa-card-list__price__shift">/ Night</span></div>
                                            <ul class="list-unstyled villa-card-list__meta">
                                                <li><span class="icon-bed"></span>3 beds</li>
                                                <li><span class="icon-bath"></span>2 baths</li>
                                                <li><span class="icon-users"></span>12 guests</li>
                                            </ul><!-- /.list-unstyled villa-card-list__meta -->
                                        </div><!-- /.villa-card-list__content -->
                                    </div>
                                </div>
                            </div><!-- /.villa-card-list -->
                        </div>
                        <div class="col-lg-12">
                            <div class="villa-card-list villa-card-list--full-width wow fadeInUp" data-wow-delay="200ms">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-5">
                                        <div class="villa-card-list__image">
                                            <img src="assets/images/villa/villa-list-3-big.jpg" alt="villoz">
                                            <a href="javascript:void(0)" class="villa-card-list__like"><span
                                                    class="fas fa-heart"></span></a><!-- /.villa-card-list__like -->
                                            <div class="villa-card-list__flash">
                                                <p class="villa-card-list__flash__label feature">Featured</p>
                                                <p class="villa-card-list__flash__label off">10% Off</p>
                                            </div><!-- /.villa-card-list__label -->
                                        </div><!-- /.villa-card-list__image -->
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="villa-card-list__content">
                                            <div class="villa-card-list__btns">
                                                <a class="villoz-image-popup" href="#"
                                                    data-gallery-options='{
                                        "items": [
                                          {
                                            "src": "assets/images/villa/villa-list-3-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-2-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-3-big.jpg"
                                          }
                                        ],
                                        "gallery": {
                                          "enabled": true
                                        },
                                        "type": "image"
                                    }'><span
                                                        class="icon-camera"></span><span
                                                        class="villa-card-list__btns__count">3</span></a>
                                                <a class="video-popup"
                                                    href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                        class="icon-video"></span></a>
                                            </div>
                                            <div class="villa-card-list__ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p class="villa-card-list__address">Disle-Sur-Mer, Southwest, France</p>
                                            <h3 class="villa-card-list__title"><a href="villa-details.html">Maison
                                                    Terranova</a></h3><!-- /.villa-card-list__title -->
                                            <div class="villa-card-list__price"><span
                                                    class="villa-card-list__price__disable">$180</span> $140 <span
                                                    class="villa-card-list__price__shift">/ Night</span></div>
                                            <ul class="list-unstyled villa-card-list__meta">
                                                <li><span class="icon-bed"></span>3 beds</li>
                                                <li><span class="icon-bath"></span>2 baths</li>
                                                <li><span class="icon-users"></span>12 guests</li>
                                            </ul><!-- /.list-unstyled villa-card-list__meta -->
                                        </div><!-- /.villa-card-list__content -->
                                    </div>
                                </div>
                            </div><!-- /.villa-card-list -->
                        </div>
                        <div class="col-lg-12">
                            <div class="villa-card-list villa-card-list--full-width wow fadeInUp" data-wow-delay="250ms">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-5">
                                        <div class="villa-card-list__image">
                                            <img src="assets/images/villa/villa-list-4-big.jpg" alt="villoz">
                                            <a href="javascript:void(0)" class="villa-card-list__like"><span
                                                    class="fas fa-heart"></span></a><!-- /.villa-card-list__like -->
                                        </div><!-- /.villa-card-list__image -->
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="villa-card-list__content">
                                            <div class="villa-card-list__btns">
                                                <a class="villoz-image-popup" href="#"
                                                    data-gallery-options='{
                                        "items": [
                                          {
                                            "src": "assets/images/villa/villa-list-4-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-2-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-3-big.jpg"
                                          }
                                        ],
                                        "gallery": {
                                          "enabled": true
                                        },
                                        "type": "image"
                                    }'><span
                                                        class="icon-camera"></span><span
                                                        class="villa-card-list__btns__count">3</span></a>
                                                <a class="video-popup"
                                                    href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                        class="icon-video"></span></a>
                                            </div>
                                            <div class="villa-card-list__ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p class="villa-card-list__address">Disle-Sur-Mer, Southwest, France</p>
                                            <h3 class="villa-card-list__title"><a href="villa-details.html">Villa
                                                    Enchantment</a></h3><!-- /.villa-card-list__title -->
                                            <div class="villa-card-list__price">$120 <span
                                                    class="villa-card-list__price__shift">/ Night</span></div>
                                            <ul class="list-unstyled villa-card-list__meta">
                                                <li><span class="icon-bed"></span>3 beds</li>
                                                <li><span class="icon-bath"></span>2 baths</li>
                                                <li><span class="icon-users"></span>12 guests</li>
                                            </ul><!-- /.list-unstyled villa-card-list__meta -->
                                        </div><!-- /.villa-card-list__content -->
                                    </div>
                                </div>
                            </div><!-- /.villa-card-list -->
                        </div>
                        <div class="col-lg-12">
                            <div class="villa-card-list villa-card-list--full-width wow fadeInUp" data-wow-delay="300ms">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-5">
                                        <div class="villa-card-list__image">
                                            <img src="assets/images/villa/villa-list-5-big.jpg" alt="villoz">
                                            <a href="javascript:void(0)" class="villa-card-list__like"><span
                                                    class="fas fa-heart"></span></a><!-- /.villa-card-list__like -->
                                        </div><!-- /.villa-card-list__image -->
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="villa-card-list__content">
                                            <div class="villa-card-list__btns">
                                                <a class="villoz-image-popup" href="#"
                                                    data-gallery-options='{
                                        "items": [
                                          {
                                            "src": "assets/images/villa/villa-list-5-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-2-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-3-big.jpg"
                                          }
                                        ],
                                        "gallery": {
                                          "enabled": true
                                        },
                                        "type": "image"
                                    }'><span
                                                        class="icon-camera"></span><span
                                                        class="villa-card-list__btns__count">3</span></a>
                                                <a class="video-popup"
                                                    href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                        class="icon-video"></span></a>
                                            </div>
                                            <div class="villa-card-list__ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p class="villa-card-list__address">Disle-Sur-Mer, Southwest, France</p>
                                            <h3 class="villa-card-list__title"><a href="villa-details.html">Villa Belle
                                                    Vue</a></h3><!-- /.villa-card-list__title -->
                                            <div class="villa-card-list__price">$90 <span
                                                    class="villa-card-list__price__shift">/ Night</span></div>
                                            <ul class="list-unstyled villa-card-list__meta">
                                                <li><span class="icon-bed"></span>3 beds</li>
                                                <li><span class="icon-bath"></span>2 baths</li>
                                                <li><span class="icon-users"></span>12 guests</li>
                                            </ul><!-- /.list-unstyled villa-card-list__meta -->
                                        </div><!-- /.villa-card-list__content -->
                                    </div>
                                </div>
                            </div><!-- /.villa-card-list -->
                        </div>
                        <div class="col-lg-12">
                            <div class="villa-card-list villa-card-list--full-width wow fadeInUp" data-wow-delay="350ms">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-5">
                                        <div class="villa-card-list__image">
                                            <img src="assets/images/villa/villa-list-6-big.jpg" alt="villoz">
                                            <a href="javascript:void(0)" class="villa-card-list__like"><span
                                                    class="fas fa-heart"></span></a><!-- /.villa-card-list__like -->
                                            <div class="villa-card-list__flash">
                                                <p class="villa-card-list__flash__label off">10% Off</p>
                                            </div><!-- /.villa-card-list__label -->
                                        </div><!-- /.villa-card-list__image -->
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="villa-card-list__content">
                                            <div class="villa-card-list__btns">
                                                <a class="villoz-image-popup" href="#"
                                                    data-gallery-options='{
                                        "items": [
                                          {
                                            "src": "assets/images/villa/villa-list-6-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-2-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-3-big.jpg"
                                          }
                                        ],
                                        "gallery": {
                                          "enabled": true
                                        },
                                        "type": "image"
                                    }'><span
                                                        class="icon-camera"></span><span
                                                        class="villa-card-list__btns__count">3</span></a>
                                                <a class="video-popup"
                                                    href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                        class="icon-video"></span></a>
                                            </div>
                                            <div class="villa-card-list__ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p class="villa-card-list__address">Disle-Sur-Mer, Southwest, France</p>
                                            <h3 class="villa-card-list__title"><a href="villa-details.html">Villa
                                                    Magnificence</a></h3><!-- /.villa-card-list__title -->
                                            <div class="villa-card-list__price"><span
                                                    class="villa-card-list__price__disable">$180</span> $140 <span
                                                    class="villa-card-list__price__shift">/ Night</span></div>
                                            <ul class="list-unstyled villa-card-list__meta">
                                                <li><span class="icon-bed"></span>3 beds</li>
                                                <li><span class="icon-bath"></span>2 baths</li>
                                                <li><span class="icon-users"></span>12 guests</li>
                                            </ul><!-- /.list-unstyled villa-card-list__meta -->
                                        </div><!-- /.villa-card-list__content -->
                                    </div>
                                </div>
                            </div><!-- /.villa-card-list -->
                        </div>
                        <div class="col-lg-12">
                            <div class="villa-card-list villa-card-list--full-width wow fadeInUp" data-wow-delay="400ms">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-5">
                                        <div class="villa-card-list__image">
                                            <img src="assets/images/villa/villa-list-7-big.jpg" alt="villoz">
                                            <a href="javascript:void(0)" class="villa-card-list__like"><span
                                                    class="fas fa-heart"></span></a><!-- /.villa-card-list__like -->
                                            <div class="villa-card-list__flash">
                                                <p class="villa-card-list__flash__label feature">Featured</p>
                                                <p class="villa-card-list__flash__label off">10% Off</p>
                                            </div><!-- /.villa-card-list__label -->
                                        </div><!-- /.villa-card-list__image -->
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="villa-card-list__content">
                                            <div class="villa-card-list__btns">
                                                <a class="villoz-image-popup" href="#"
                                                    data-gallery-options='{
                                        "items": [
                                          {
                                            "src": "assets/images/villa/villa-list-7-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-2-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-3-big.jpg"
                                          }
                                        ],
                                        "gallery": {
                                          "enabled": true
                                        },
                                        "type": "image"
                                    }'><span
                                                        class="icon-camera"></span><span
                                                        class="villa-card-list__btns__count">3</span></a>
                                                <a class="video-popup"
                                                    href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                        class="icon-video"></span></a>
                                            </div>
                                            <div class="villa-card-list__ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p class="villa-card-list__address">Disle-Sur-Mer, Southwest, France</p>
                                            <h3 class="villa-card-list__title"><a href="villa-details.html">Casa
                                                    Palmera</a></h3><!-- /.villa-card-list__title -->
                                            <div class="villa-card-list__price"><span
                                                    class="villa-card-list__price__disable">$320</span> $290 <span
                                                    class="villa-card-list__price__shift">/ Night</span></div>
                                            <ul class="list-unstyled villa-card-list__meta">
                                                <li><span class="icon-bed"></span>3 beds</li>
                                                <li><span class="icon-bath"></span>2 baths</li>
                                                <li><span class="icon-users"></span>12 guests</li>
                                            </ul><!-- /.list-unstyled villa-card-list__meta -->
                                        </div><!-- /.villa-card-list__content -->
                                    </div>
                                </div>
                            </div><!-- /.villa-card-list -->
                        </div>
                        <div class="col-lg-12">
                            <div class="villa-card-list villa-card-list--full-width wow fadeInUp" data-wow-delay="450ms">
                                <div class="row d-flex align-items-center">
                                    <div class="col-lg-5">
                                        <div class="villa-card-list__image">
                                            <img src="assets/images/villa/villa-list-8-big.jpg" alt="villoz">
                                            <a href="javascript:void(0)" class="villa-card-list__like"><span
                                                    class="fas fa-heart"></span></a><!-- /.villa-card-list__like -->
                                        </div><!-- /.villa-card-list__image -->
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="villa-card-list__content">
                                            <div class="villa-card-list__btns">
                                                <a class="villoz-image-popup" href="#"
                                                    data-gallery-options='{
                                        "items": [
                                          {
                                            "src": "assets/images/villa/villa-list-8-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-2-big.jpg"
                                          },
                                          {
                                            "src": "assets/images/villa/villa-list-3-big.jpg"
                                          }
                                        ],
                                        "gallery": {
                                          "enabled": true
                                        },
                                        "type": "image"
                                    }'><span
                                                        class="icon-camera"></span><span
                                                        class="villa-card-list__btns__count">3</span></a>
                                                <a class="video-popup"
                                                    href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                        class="icon-video"></span></a>
                                            </div>
                                            <div class="villa-card-list__ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p class="villa-card-list__address">Disle-Sur-Mer, Southwest, France</p>
                                            <h3 class="villa-card-list__title"><a href="villa-details.html">Driftwood
                                                    Villa</a></h3><!-- /.villa-card-list__title -->
                                            <div class="villa-card-list__price">$150 <span
                                                    class="villa-card-list__price__shift">/ Night</span></div>
                                            <ul class="list-unstyled villa-card-list__meta">
                                                <li><span class="icon-bed"></span>3 beds</li>
                                                <li><span class="icon-bath"></span>2 baths</li>
                                                <li><span class="icon-users"></span>12 guests</li>
                                            </ul><!-- /.list-unstyled villa-card-list__meta -->
                                        </div><!-- /.villa-card-list__content -->
                                    </div>
                                </div>
                            </div><!-- /.villa-card-list -->
                        </div>
                    </div>
                </div>
                <div class="tab active-tab" id="grid">
                    <div class="row gutter-y-30">
                        <div class="col-lg-4 col-md-6">
                            <div class="villa-card wow fadeInUp" data-wow-delay="100ms">
                                <div class="villa-card__image">
                                    <img src="assets/images/villa/villa-1-1.jpg" alt="villoz">
                                    <a href="javascript:void(0)" class="villa-card__like"><span
                                            class="fas fa-heart"></span></a><!-- /.villa-card__like -->
                                    <div class="villa-card__flash">
                                        <p class="villa-card__flash__label feature">Featured</p>
                                    </div><!-- /.villa-card__label -->
                                    <div class="villa-card__btns">
                                        <a class="villoz-image-popup" href="#"
                                            data-gallery-options='{
                                "items": [
                                  {
                                    "src": "assets/images/villa/villa-1-1.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-2.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-3.jpg"
                                  }
                                ],
                                "gallery": {
                                  "enabled": true
                                },
                                "type": "image"
                            }'><span
                                                class="icon-camera"></span><span
                                                class="villa-card__btns__count">3</span></a>
                                        <a class="video-popup" href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                class="icon-video"></span></a>
                                    </div>
                                </div><!-- /.villa-card__image -->
                                <div class="villa-card__content">
                                    <div class="villa-card__ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p class="villa-card__address">Disle-Sur-Mer, Southwest, France</p>
                                    <h3 class="villa-card__title"><a href="villa-details.html">The Lake House</a></h3>
                                    <!-- /.villa-card__title -->
                                    <div class="villa-card__price">$160 <span class="villa-card__price__shift">/
                                            Night</span></div>
                                    <ul class="list-unstyled villa-card__meta">
                                        <li><span class="icon-bed"></span>3 beds</li>
                                        <li><span class="icon-bath"></span>2 baths</li>
                                        <li><span class="icon-users"></span>12 guests</li>
                                    </ul><!-- /.list-unstyled villa-card__meta -->
                                </div><!-- /.villa-card__content -->
                            </div><!-- /.villa-card -->
                        </div><!-- /.item -->
                        <div class="col-lg-4 col-md-6">
                            <div class="villa-card wow fadeInUp" data-wow-delay="150ms">
                                <div class="villa-card__image">
                                    <img src="assets/images/villa/villa-1-2.jpg" alt="villoz">
                                    <a href="javascript:void(0)" class="villa-card__like"><span
                                            class="fas fa-heart"></span></a><!-- /.villa-card__like -->
                                    <div class="villa-card__flash">
                                        <p class="villa-card__flash__label off">10% Off</p>
                                    </div><!-- /.villa-card__label -->
                                    <div class="villa-card__btns">
                                        <a class="villoz-image-popup" href="#"
                                            data-gallery-options='{
                                "items": [
                                  {
                                    "src": "assets/images/villa/villa-1-2.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-3.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-1.jpg"
                                  }
                                ],
                                "gallery": {
                                  "enabled": true
                                },
                                "type": "image"
                            }'><span
                                                class="icon-camera"></span><span
                                                class="villa-card__btns__count">3</span></a>
                                        <a class="video-popup" href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                class="icon-video"></span></a>
                                    </div>
                                </div><!-- /.villa-card__image -->
                                <div class="villa-card__content">
                                    <div class="villa-card__ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p class="villa-card__address">Disle-Sur-Mer, Southwest, France</p>
                                    <h3 class="villa-card__title"><a href="villa-details.html">Restore the Chateau</a>
                                    </h3><!-- /.villa-card__title -->
                                    <div class="villa-card__price"><span class="villa-card__price__disable">$230</span>
                                        $200 <span class="villa-card__price__shift">/ Night</span></div>
                                    <ul class="list-unstyled villa-card__meta">
                                        <li><span class="icon-bed"></span>3 beds</li>
                                        <li><span class="icon-bath"></span>2 baths</li>
                                        <li><span class="icon-users"></span>12 guests</li>
                                    </ul><!-- /.list-unstyled villa-card__meta -->
                                </div><!-- /.villa-card__content -->
                            </div><!-- /.villa-card -->
                        </div><!-- /.item -->
                        <div class="col-lg-4 col-md-6">
                            <div class="villa-card wow fadeInUp" data-wow-delay="200ms">
                                <div class="villa-card__image">
                                    <img src="assets/images/villa/villa-1-3.jpg" alt="villoz">
                                    <a href="javascript:void(0)" class="villa-card__like"><span
                                            class="fas fa-heart"></span></a><!-- /.villa-card__like -->
                                    <div class="villa-card__flash">
                                        <p class="villa-card__flash__label feature">Featured</p>
                                        <p class="villa-card__flash__label off">10% Off</p>
                                    </div><!-- /.villa-card__label -->
                                    <div class="villa-card__btns">
                                        <a class="villoz-image-popup" href="#"
                                            data-gallery-options='{
                                "items": [
                                  {
                                    "src": "assets/images/villa/villa-1-3.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-2.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-1.jpg"
                                  }
                                ],
                                "gallery": {
                                  "enabled": true
                                },
                                "type": "image"
                            }'><span
                                                class="icon-camera"></span><span
                                                class="villa-card__btns__count">3</span></a>
                                        <a class="video-popup" href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                class="icon-video"></span></a>
                                    </div>
                                </div><!-- /.villa-card__image -->
                                <div class="villa-card__content">
                                    <div class="villa-card__ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p class="villa-card__address">Disle-Sur-Mer, Southwest, France</p>
                                    <h3 class="villa-card__title"><a href="villa-details.html">Maison Terranova</a></h3>
                                    <!-- /.villa-card__title -->
                                    <div class="villa-card__price"><span class="villa-card__price__disable">$180</span>
                                        $140 <span class="villa-card__price__shift">/ Night</span></div>
                                    <ul class="list-unstyled villa-card__meta">
                                        <li><span class="icon-bed"></span>3 beds</li>
                                        <li><span class="icon-bath"></span>2 baths</li>
                                        <li><span class="icon-users"></span>12 guests</li>
                                    </ul><!-- /.list-unstyled villa-card__meta -->
                                </div><!-- /.villa-card__content -->
                            </div><!-- /.villa-card -->
                        </div><!-- /.item -->
                        <div class="col-lg-4 col-md-6">
                            <div class="villa-card wow fadeInUp" data-wow-delay="250ms">
                                <div class="villa-card__image">
                                    <img src="assets/images/villa/villa-1-4.jpg" alt="villoz">
                                    <a href="javascript:void(0)" class="villa-card__like"><span
                                            class="fas fa-heart"></span></a><!-- /.villa-card__like -->
                                    <div class="villa-card__btns">
                                        <a class="villoz-image-popup" href="#"
                                            data-gallery-options='{
                                "items": [
                                  {
                                    "src": "assets/images/villa/villa-1-4.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-5.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-6.jpg"
                                  }
                                ],
                                "gallery": {
                                  "enabled": true
                                },
                                "type": "image"
                            }'><span
                                                class="icon-camera"></span><span
                                                class="villa-card__btns__count">3</span></a>
                                        <a class="video-popup" href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                class="icon-video"></span></a>
                                    </div>
                                </div><!-- /.villa-card__image -->
                                <div class="villa-card__content">
                                    <div class="villa-card__ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p class="villa-card__address">Disle-Sur-Mer, Southwest, France</p>
                                    <h3 class="villa-card__title"><a href="villa-details.html">Villa Enchantment</a></h3>
                                    <!-- /.villa-card__title -->
                                    <div class="villa-card__price">$120 <span class="villa-card__price__shift">/
                                            Night</span></div>
                                    <ul class="list-unstyled villa-card__meta">
                                        <li><span class="icon-bed"></span>3 beds</li>
                                        <li><span class="icon-bath"></span>2 baths</li>
                                        <li><span class="icon-users"></span>12 guests</li>
                                    </ul><!-- /.list-unstyled villa-card__meta -->
                                </div><!-- /.villa-card__content -->
                            </div><!-- /.villa-card -->
                        </div><!-- /.item -->
                        <div class="col-lg-4 col-md-6">
                            <div class="villa-card wow fadeInUp" data-wow-delay="300ms">
                                <div class="villa-card__image">
                                    <img src="assets/images/villa/villa-1-5.jpg" alt="villoz">
                                    <a href="javascript:void(0)" class="villa-card__like"><span
                                            class="fas fa-heart"></span></a><!-- /.villa-card__like -->
                                    <div class="villa-card__btns">
                                        <a class="villoz-image-popup" href="#"
                                            data-gallery-options='{
                                "items": [
                                  {
                                    "src": "assets/images/villa/villa-1-5.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-4.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-6.jpg"
                                  }
                                ],
                                "gallery": {
                                  "enabled": true
                                },
                                "type": "image"
                            }'><span
                                                class="icon-camera"></span><span
                                                class="villa-card__btns__count">3</span></a>
                                        <a class="video-popup" href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                class="icon-video"></span></a>
                                    </div>
                                </div><!-- /.villa-card__image -->
                                <div class="villa-card__content">
                                    <div class="villa-card__ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p class="villa-card__address">Disle-Sur-Mer, Southwest, France</p>
                                    <h3 class="villa-card__title"><a href="villa-details.html">Villa Belle Vue</a></h3>
                                    <!-- /.villa-card__title -->
                                    <div class="villa-card__price">$90 <span class="villa-card__price__shift">/
                                            Night</span></div>
                                    <ul class="list-unstyled villa-card__meta">
                                        <li><span class="icon-bed"></span>3 beds</li>
                                        <li><span class="icon-bath"></span>2 baths</li>
                                        <li><span class="icon-users"></span>12 guests</li>
                                    </ul><!-- /.list-unstyled villa-card__meta -->
                                </div><!-- /.villa-card__content -->
                            </div><!-- /.villa-card -->
                        </div><!-- /.item -->
                        <div class="col-lg-4 col-md-6">
                            <div class="villa-card wow fadeInUp" data-wow-delay="350ms">
                                <div class="villa-card__image">
                                    <img src="assets/images/villa/villa-1-6.jpg" alt="villoz">
                                    <a href="javascript:void(0)" class="villa-card__like"><span
                                            class="fas fa-heart"></span></a><!-- /.villa-card__like -->
                                    <div class="villa-card__flash">
                                        <p class="villa-card__flash__label off">10% Off</p>
                                    </div><!-- /.villa-card__label -->
                                    <div class="villa-card__btns">
                                        <a class="villoz-image-popup" href="#"
                                            data-gallery-options='{
                                "items": [
                                  {
                                    "src": "assets/images/villa/villa-1-6.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-4.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-5.jpg"
                                  }
                                ],
                                "gallery": {
                                  "enabled": true
                                },
                                "type": "image"
                            }'><span
                                                class="icon-camera"></span><span
                                                class="villa-card__btns__count">3</span></a>
                                        <a class="video-popup" href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                class="icon-video"></span></a>
                                    </div>
                                </div><!-- /.villa-card__image -->
                                <div class="villa-card__content">
                                    <div class="villa-card__ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p class="villa-card__address">Disle-Sur-Mer, Southwest, France</p>
                                    <h3 class="villa-card__title"><a href="villa-details.html">Villa Magnificence</a></h3>
                                    <!-- /.villa-card__title -->
                                    <div class="villa-card__price"><span class="villa-card__price__disable">$180</span>
                                        $140 <span class="villa-card__price__shift">/ Night</span></div>
                                    <ul class="list-unstyled villa-card__meta">
                                        <li><span class="icon-bed"></span>3 beds</li>
                                        <li><span class="icon-bath"></span>2 baths</li>
                                        <li><span class="icon-users"></span>12 guests</li>
                                    </ul><!-- /.list-unstyled villa-card__meta -->
                                </div><!-- /.villa-card__content -->
                            </div><!-- /.villa-card -->
                        </div><!-- /.item -->
                        <div class="col-lg-4 col-md-6">
                            <div class="villa-card wow fadeInUp" data-wow-delay="450ms">
                                <div class="villa-card__image">
                                    <img src="assets/images/villa/villa-1-7.jpg" alt="villoz">
                                    <a href="javascript:void(0)" class="villa-card__like"><span
                                            class="fas fa-heart"></span></a><!-- /.villa-card__like -->
                                    <div class="villa-card__flash">
                                        <p class="villa-card__flash__label feature">Featured</p>
                                        <p class="villa-card__flash__label off">10% Off</p>
                                    </div><!-- /.villa-card__label -->
                                    <div class="villa-card__btns">
                                        <a class="villoz-image-popup" href="#"
                                            data-gallery-options='{
                                "items": [
                                  {
                                    "src": "assets/images/villa/villa-1-7.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-8.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-9.jpg"
                                  }
                                ],
                                "gallery": {
                                  "enabled": true
                                },
                                "type": "image"
                            }'><span
                                                class="icon-camera"></span><span
                                                class="villa-card__btns__count">3</span></a>
                                        <a class="video-popup" href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                class="icon-video"></span></a>
                                    </div>
                                </div><!-- /.villa-card__image -->
                                <div class="villa-card__content">
                                    <div class="villa-card__ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p class="villa-card__address">Disle-Sur-Mer, Southwest, France</p>
                                    <h3 class="villa-card__title"><a href="villa-details.html">Casa Palmera</a></h3>
                                    <!-- /.villa-card__title -->
                                    <div class="villa-card__price"><span class="villa-card__price__disable">$320</span>
                                        $290 <span class="villa-card__price__shift">/ Night</span></div>
                                    <ul class="list-unstyled villa-card__meta">
                                        <li><span class="icon-bed"></span>3 beds</li>
                                        <li><span class="icon-bath"></span>2 baths</li>
                                        <li><span class="icon-users"></span>12 guests</li>
                                    </ul><!-- /.list-unstyled villa-card__meta -->
                                </div><!-- /.villa-card__content -->
                            </div><!-- /.villa-card -->
                        </div><!-- /.item -->
                        <div class="col-lg-4 col-md-6">
                            <div class="villa-card wow fadeInUp" data-wow-delay="500ms">
                                <div class="villa-card__image">
                                    <img src="assets/images/villa/villa-1-8.jpg" alt="villoz">
                                    <a href="javascript:void(0)" class="villa-card__like"><span
                                            class="fas fa-heart"></span></a><!-- /.villa-card__like -->
                                    <div class="villa-card__btns">
                                        <a class="villoz-image-popup" href="#"
                                            data-gallery-options='{
                                "items": [
                                  {
                                    "src": "assets/images/villa/villa-1-8.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-7.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-9.jpg"
                                  }
                                ],
                                "gallery": {
                                  "enabled": true
                                },
                                "type": "image"
                            }'><span
                                                class="icon-camera"></span><span
                                                class="villa-card__btns__count">3</span></a>
                                        <a class="video-popup" href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                class="icon-video"></span></a>
                                    </div>
                                </div><!-- /.villa-card__image -->
                                <div class="villa-card__content">
                                    <div class="villa-card__ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p class="villa-card__address">Disle-Sur-Mer, Southwest, France</p>
                                    <h3 class="villa-card__title"><a href="villa-details.html">Driftwood Villa</a></h3>
                                    <!-- /.villa-card__title -->
                                    <div class="villa-card__price">$150 <span class="villa-card__price__shift">/
                                            Night</span></div>
                                    <ul class="list-unstyled villa-card__meta">
                                        <li><span class="icon-bed"></span>3 beds</li>
                                        <li><span class="icon-bath"></span>2 baths</li>
                                        <li><span class="icon-users"></span>12 guests</li>
                                    </ul><!-- /.list-unstyled villa-card__meta -->
                                </div><!-- /.villa-card__content -->
                            </div><!-- /.villa-card -->
                        </div><!-- /.item -->
                        <div class="col-lg-4 col-md-6">
                            <div class="villa-card wow fadeInUp" data-wow-delay="550ms">
                                <div class="villa-card__image">
                                    <img src="assets/images/villa/villa-1-9.jpg" alt="villoz">
                                    <a href="javascript:void(0)" class="villa-card__like"><span
                                            class="fas fa-heart"></span></a><!-- /.villa-card__like -->
                                    <div class="villa-card__flash">
                                        <p class="villa-card__flash__label feature">Featured</p>
                                    </div><!-- /.villa-card__label -->
                                    <div class="villa-card__btns">
                                        <a class="villoz-image-popup" href="#"
                                            data-gallery-options='{
                                "items": [
                                  {
                                    "src": "assets/images/villa/villa-1-9.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-8.jpg"
                                  },
                                  {
                                    "src": "assets/images/villa/villa-1-7.jpg"
                                  }
                                ],
                                "gallery": {
                                  "enabled": true
                                },
                                "type": "image"
                            }'><span
                                                class="icon-camera"></span><span
                                                class="villa-card__btns__count">3</span></a>
                                        <a class="video-popup" href="https://www.youtube.com/watch?v=0MuL8fd3pb8"><span
                                                class="icon-video"></span></a>
                                    </div>
                                </div><!-- /.villa-card__image -->
                                <div class="villa-card__content">
                                    <div class="villa-card__ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <p class="villa-card__address">Disle-Sur-Mer, Southwest, France</p>
                                    <h3 class="villa-card__title"><a href="villa-details.html">Villa Bellissimo</a></h3>
                                    <!-- /.villa-card__title -->
                                    <div class="villa-card__price">$230 <span class="villa-card__price__shift">/
                                            Night</span></div>
                                    <ul class="list-unstyled villa-card__meta">
                                        <li><span class="icon-bed"></span>3 beds</li>
                                        <li><span class="icon-bath"></span>2 baths</li>
                                        <li><span class="icon-users"></span>12 guests</li>
                                    </ul><!-- /.list-unstyled villa-card__meta -->
                                </div><!-- /.villa-card__content -->
                            </div><!-- /.villa-card -->
                        </div><!-- /.item -->
                    </div><!-- /.row -->
                </div>
            </div>
        </div>
    </section>

@endsection
