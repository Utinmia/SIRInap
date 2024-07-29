@extends('admin.template.base')

@section('title', 'SIRInap - Daftar Pembayaran')

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
                    <h4>Daftar Pembayaran</h4>
                    {{-- <span class="ml-1">Pembayaran tambahan seperti sarapan, laundry, atau pembayaran lainnya.</span> --}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active"><a href="#">pembayaran</a></li>
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
                        <h4 class="card-title">Data pembayaran</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 20%">ID Reservasi</th>
                                        <th style="width: 40%">Detail Pembayaran</th>
                                        <th style="width: 20%">Bukti Pembayaran</th>
                                        <th style="width: 10%">Status</th>
                                        <th style="width: 15%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_pembayaran as $pembayaran)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pembayaran->id_reservasi }} - {{ $pembayaran->reservasi->user->nama }}
                                            </td>
                                            <td>
                                                Metode Pembayaran : {{ $pembayaran->metode_bayar }} <br> 
                                                Total Pembayaran : Rp {{ number_format($pembayaran->jumlah,0,',','.') }} <br>
                                                Tanggal Pembayaran : {{ $pembayaran->tgl_bayar }}
                                            </td>
                                            <td><a href="{{ url('system/storage/app/public/' . $pembayaran->bukti_bayar) }}" target="_blank" class="btn btn-primary btn-xs"><i class="fas fa-download"></i> Bukti Pembayaran</a></td>
                                            <td><span
                                                    class="badge {{ $pembayaran->getStatusBadgeClass() }}">{{ $pembayaran->status }}</span>
                                            </td>
                                            <td>
                                                {{-- <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Primary</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void()">Dropdown link</a>
                                                        <a class="dropdown-item" href="javascript:void()">Dropdown link</a>
                                                    </div>
                                                </div> --}}

                                                <div class="tooltip-container">
                                                    <button type="button" class="btn btn-primary btn-xs mb-1"
                                                        data-toggle="modal" data-target="#editModal"
                                                        data-id="{{ $pembayaran->id_pembayaran }}"
                                                        data-id_reservasi="{{ $pembayaran->id_reservasi }}"
                                                        data-jumlah="{{ $pembayaran->jumlah }}"
                                                        data-metode_bayar="{{ $pembayaran->metode_bayar }}"
                                                        data-tgl_bayar="{{ $pembayaran->tgl_bayar }}"
                                                        data-status="{{ $pembayaran->status }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <div class="tooltip-text">Edit Data</div>
                                                </div>
                                                <div class="tooltip-container">
                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                                        data-target="#deleteModal"
                                                        data-id="{{ $pembayaran->id_pembayaran }}">
                                                        <i class="fas fa-trash"></i>
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
    @include('admin.pembayaran.modalCreate')
    @include('admin.pembayaran.modalEdit')
    @include('admin.pembayaran.modalDelete')
@endsection

@section('scripts')
    @include('admin.pembayaran.scripts')
@endsection