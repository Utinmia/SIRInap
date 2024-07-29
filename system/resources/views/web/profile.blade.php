@extends('layout.landing')

@section('title', 'SIRInap - Sistem Informasi Reservasi Penginapan')

@section('content')

    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <ul class="villoz-breadcrumb list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>Profile</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
            <h2 class="page-header__title">Profile</h2>
        </div><!-- /.container -->
        <div class="banner-form__position wow fadeInUp" data-wow-delay="300ms">
            <div class="container">

                @include('layout.filter')

            </div>
        </div>
    </section><!-- /.page-header -->

    <section class="team-details">
        <div class="container">
            <div class="team-details__inner">
                <div class="row">
                    <div class="col-lg-4">
                        <div
                            style="background-image: url({{ url('public/landing') }}/assets/images/shapes/team-d-bg.jpg); padding: 50px;">
                            <h3 class="team-details__title">{{ session('user')->nama }}</h3><!-- /.team-details__title -->
                            <p><i
                                    class="fas @if (session('user')->jenis_kelamin == 'Laki-Laki') fa-mars @elseif(session('user')->jenis_kelamin == 'Perempuan') fa-venus @endif"></i>
                                {{ session('user')->jenis_kelamin }}</p>
                            <p><i class="fas fa-envelope"></i> {{ session('user')->email }}</p>
                            <p><i class="fas fa-phone"></i> {{ session('user')->telepon }}</p>
                            <p><i class="fas fa-map-marker-alt"></i> {{ session('user')->alamat }}</p>

                            <div class="team-details__social mb-0">
                                <a href="https://twitter.com">
                                    <i class="fab fa-twitter" aria-hidden="true"></i>
                                    <span class="sr-only">Twitter</span>
                                </a>
                                <a href="https://facebook.com">
                                    <i class="fab fa-facebook" aria-hidden="true"></i>
                                    <span class="sr-only">Facebook</span>
                                </a>
                                <a href="https://pinterest.com">
                                    <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                                    <span class="sr-only">Pinterest</span>
                                </a>
                                <a href="https://instagram.com">
                                    <i class="fab fa-instagram" aria-hidden="true"></i>
                                    <span class="sr-only">Instagram</span>
                                </a>
                            </div><!-- /.team-details__social -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="btn btn-danger btn-sm mt-4">
                                <i class="fas fa-sign-out-alt"></i> Keluar
                            </a>
                            {{-- <a href="{{ route('logout') }}" class="btn btn-danger btn-sm mt-4"><i
                                    class="fas fa-sign-out-alt"></i> Keluar</a> --}}
                            <!-- /.team-details__text -->
                        </div><!-- /.team-details__content -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST"
                                    action="{{ route('profile.update', ['profile' => session('user')->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>INFORMASI PERSONAL</h5>
                                            <hr>
                                            {{-- <input type="text" name="nama" value="{{ session('user')->id }}" hidden> --}}
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="nama" value="{{ session('user')->nama }}"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select name="jenis_kelamin" class="form-control" required>
                                                    <option value="Laki-Laki"
                                                        @if (session('user')->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                                    <option value="Perempuan"
                                                        @if (session('user')->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" name="tgl_lahir"
                                                    value="{{ session('user')->tgl_lahir }}" class="form-control"
                                                    placeholder="Tanggal Lahir">
                                            </div>
                                            <div class="form-group">
                                                <label>Telepon</label>
                                                <input type="number" name="telepon" value="{{ session('user')->telepon }}"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea name="alamat" class="form-control" rows="3">{{ session('user')->alamat }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>PENGATURAN AKUN</h5>
                                            <hr>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" value="{{ session('user')->email }}"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Konfirmasi Password</label>
                                                <input type="password" name="password_confirmation" class="form-control">
                                            </div>
                                            <div class="mt-4" style="text-align: right;">
                                                <button type="submit" class="btn btn-primary btn-sm float-right">
                                                    <i class="fas fa-edit"></i> Update
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.team-details__inner -->
        </div><!-- /.container -->
    </section><!-- /.team-details -->

    {{-- @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif --}}

@endsection
@section('script')
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
