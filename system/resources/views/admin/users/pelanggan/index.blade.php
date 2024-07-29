@extends('admin.template.base')

@section('title', 'Sirehap - Konsumen')

@section('content')
    <style>
        .btn-icon-left {
            margin-right: .5rem !important;
        }
    </style>

    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Daftar Konsumen</h4>
                    {{-- <span class="ml-1">Data akun konsumen</span> --}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active"><a href="#">pelanggan</a></li>
                </ol> --}}
                <button type="button" class="btn btn-rounded btn-primary" data-toggle="modal" data-target="#createModal">
                    <span class="btn-icon-left text-primary">
                        <i class="fa fa-plus"></i>
                    </span>Tambah Data
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">Data pelanggan</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 30%">Nama</th>
                                        <th style="width: 25%">Email</th>
                                        <th style="width: 5%">Telepon</th>
                                        <th style="width: 20%">Jenis Kelamin</th>
                                        <th style="width: 20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_pelanggan as $pelanggan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $pelanggan->nama }} <br>
                                                Alamat: {{ $pelanggan->alamat }}
                                            </td>
                                            <td>{{ $pelanggan->email }}</td>
                                            <td>{{ $pelanggan->telepon }}</td>
                                            <td>{{ $pelanggan->jenis_kelamin }}</td>
                                            <td>
                                                <div class="tooltip-container">
                                                    <button type="button"
                                                        class="btn btn-primary btn-xs"
                                                        data-toggle="modal" data-target="#editModal"
                                                        data-id="{{ $pelanggan->id }}" data-nama="{{ $pelanggan->nama }}"
                                                        data-email="{{ $pelanggan->email }}"
                                                        data-telepon="{{ $pelanggan->telepon }}"
                                                        data-alamat="{{ $pelanggan->alamat }}"
                                                        data-tgl="{{ $pelanggan->tgl_lahir }}"
                                                        data-jk="{{ $pelanggan->jenis_kelamin }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <div class="tooltip-text">Edit Data</div>
                                                </div>
                                                <div class="tooltip-container">
                                                    <button type="button" class="btn btn-danger btn-xs"
                                                        data-toggle="modal" data-target="#deleteModal"
                                                        data-id="{{ $pelanggan->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <div class="tooltip-text">Hapus Data</div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.users.pelanggan.modalCreate')
    @include('admin.users.pelanggan.modalEdit')
    @include('admin.users.pelanggan.modalDelete')
@endsection

@section('scripts')
    @include('admin.users.pelanggan.scripts')
@endsection