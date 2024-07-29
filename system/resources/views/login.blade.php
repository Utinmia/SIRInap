@extends('layout.app')

@section('title', 'Sirehap - Login')

@section('content')

    <style>
        .auth-form {
            padding: 30px 50px 30px !important;
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
                <div class="col-md-4">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center">
                                        <img class="text-center" width="50%" src="{{ url('public') }}/logo/sirinap_2.png"
                                            alt="">
                                    </div>
                                    <h4 class="text-center mb-4">Masuk Akun Kamu</h4>
                                    <form method="POST" action="{{ url('prosesLogin') }}" autocomplete="off">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder="Masukkan Email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group password-container">
                                            <label><strong>Password</strong></label>
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password">
                                            <span id="togglePassword" class="toggle-password"><i class="fas fa-eye"></i></span>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <div class="form-check ml-2">
                                                <input class="form-check-input" type="checkbox" id="basic_checkbox_1">
                                                <label class="form-check-label" for="basic_checkbox_1">Remember
                                                    me</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="page-forgot-password.html">Forgot Password?</a>
                                        </div>
                                    </div> --}}
                                        <div class="text-center">
                                            <button type="submit" name="login"
                                                class="btn btn-primary btn-block">Masuk</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Belum punya akun ? <a class="text-primary" href="{{ url('register') }}">Daftar
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

    @if (session()->has('success'))
        <div>{{ session('success') }}</div>
    @endif

@endsection
@section('scripts')
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('email').setAttribute('autocomplete', 'off');
            document.getElementById('password').setAttribute('autocomplete', 'off');
        });
    </script> --}}
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
    </script>
@endsection
