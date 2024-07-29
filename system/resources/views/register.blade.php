@extends('layout.app')

@section('title', 'Sirehap - Register')

@section('content')
    <style>
        .auth-form {
            padding: 0px 50px 30px !important;
        }
        .password-container {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 75%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-5">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center">
                                        <img class="text-center" width="40%" src="{{ url('public') }}/logo/sirinap_2.png"
                                            alt="">
                                    </div>
                                    <h4 class="text-center mb-4">Daftar Akun Kamu</h4>
                                    <form method="POST" action="{{ url('prosesRegister') }}" autocomplete="off">
                                        @csrf
                                        <h5>Data Personal</h5>
                                        <hr>
                                        <div class="form-group">
                                            <label><strong>Nama Lengkap</strong></label>
                                            <input type="text" name="nama" class="form-control"
                                                placeholder="Nama Lengkap">
                                            @error('nama')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Jenis Kelamin</strong></label>
                                            <select name="jenis_kelamin" class="form-control">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Tanggal Lahir</strong></label>
                                            <input type="date" name="tgl_lahir" class="form-control"
                                                placeholder="Tanggal Lahir">
                                            @error('tgl_lahir')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Telepon</strong></label>
                                            <input type="number" name="telepon" class="form-control" placeholder="Telepon">
                                            @error('telepon')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Alamat</strong></label>
                                            <textarea name="alamat" class="form-control" rows="3"></textarea>
                                            @error('alamat')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <h5>Data Akun</h5>
                                        <hr>
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Masukkan Email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group password-container">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
                                            <span id="togglePassword" class="toggle-password"><i class="fas fa-eye"></i></span>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Sudah punya akun ? <a class="text-primary" href="{{ url('login') }}">Masuk
                                                disini</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
    });
</script>
@endsection
