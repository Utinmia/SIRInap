@extends('admin.template.base')

@section('title', 'SIRInap - Sistem Informasi Reserfasi Penginapan')

@section('content')

    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Informasi Akun (Profile)</h4>
                    <span class="ml-1">Mengelola data kamar (penambahan, pengeditan, dan penghapusan)</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2>{{ session('admin')->nama }}</h2>
                        <p>Hak Akses : <span class="badge badge-pill {{ $admin->getRoleBadgeClass() }}">{{ session('admin')->role }} </span></p>
                        <p>Status : <span class="badge badge-pill {{ $admin->getStatusBadgeClass() }}">{{ session('admin')->status }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ url('administrator/update-profile/'.session('admin')->id) }}">
                            @csrf
                            {{-- @method('PUT') --}}
                            {{-- <div class="row"> --}}
                                {{-- <div class="col-md-12"> --}}
                                    <h5>PENGATURAN AKUN</h5>
                                    <hr>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{ session('admin')->email }}"
                                            class="form-control" readonly style="background-color: rgb(207, 207, 207)">
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

                                {{-- </div> --}}
                            {{-- </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
