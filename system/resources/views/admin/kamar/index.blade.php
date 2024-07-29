@extends('admin.template.base')

@section('title', 'SIRInap - Daftar Kamar')

@section('content')
    <style>
        .btn-icon-left {
            margin-right: .5rem !important;
        }

        .border-danger {
            border-color: #dc3545 !important;
        }

        .invalid-feedback {
            display: block;
            color: #dc3545;
        }
    </style>

    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Daftar Kamar</h4>
                    {{-- <span class="ml-1">Mengelola data kamar (penambahan, pengeditan, dan penghapusan)</span> --}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active"><a href="#">kamar</a></li>
                </ol> --}}
                <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#createModal">
                    <span class="btn-icon-left text-success">
                        <i class="fa fa-plus"></i>
                    </span>Tambah Data
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">Data kamar</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 20%">Nomor Kamar</th>
                                        <th style="width: 20%">Tipe Kamar</th>
                                        <th style="width: 20%">Harga</th>
                                        <th style="width: 10%">Status</th>
                                        <th style="width: 15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_kamar as $kamar)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kamar->nomor_kamar }}</td>
                                            <td>{{ $kamar->tipe_kamar }}</td>
                                            <td>Rp {{ number_format($kamar->harga, 0, ',', '.') }}</td>
                                            <td><span
                                                    class="badge badge-pill {{ $kamar->getStatusBadgeClass() }}">{{ $kamar->status }}</span>
                                            </td>
                                            <td>
                                                <div class="tooltip-container">
                                                    <button type="button" class="btn btn-primary btn-xs"
                                                        data-toggle="modal" data-target="#editModal"
                                                        data-id="{{ $kamar->id_kamar }}"
                                                        data-nomorkamar="{{ $kamar->nomor_kamar }}"
                                                        data-tipekamar="{{ $kamar->tipe_kamar }}"
                                                        data-harga="{{ $kamar->harga }}"
                                                        data-status="{{ $kamar->status }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <div class="tooltip-text">Edit Data</div>
                                                </div>
                                                <div class="tooltip-container">
                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                                        data-target="#deleteModal" data-id="{{ $kamar->id_kamar }}">
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
    @include('admin.kamar.modalCreate')
    @include('admin.kamar.modalEdit')
    @include('admin.kamar.modalDelete')
@endsection

@section('scripts')
    @include('admin.kamar.scripts')
@endsection
