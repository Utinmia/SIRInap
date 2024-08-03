@extends('admin.template.base')

@section('title', 'SIRInap - Daftar Reservasi')

@section('content')

    @include('admin.reservasi.style')

    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Daftar Reservasi</h4>
                    {{-- <span class="ml-1">Mengelola pemesanan kamar oleh tamu.</span> --}}
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active"><a href="#">reservasi</a></li>
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
                        <h4 class="card-title">Data reservasi</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        {{-- <th style="width: 5%">No</th> --}}
                                        <th>ID Res.</th>
                                        <th>Konsumen</th>
                                        <th>Kamar</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_reservasi as $reservasi)
                                        <tr>
                                            <td>{{ $reservasi->id_reservasi }}</td>
                                            <td>{{ $reservasi->user->nama }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($reservasi->kamars as $kamar)
                                                        <li>{{ $kamar->nomor_kamar }} -
                                                            Rp {{ number_format($kamar->harga, 0, ',', '.') }} / malam</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>Check In : {{ $reservasi->tanggal_check_in }} <br> Check Out:
                                                {{ $reservasi->tanggal_check_out }}</td>
                                            <td><span
                                                    class="badge {{ $reservasi->getStatusBadgeClass() }}">{{ $reservasi->status }}</span>
                                            </td>

                                            <td>
                                                {{-- <div class="tooltip-container">
                                                    <a  href="{{ url('administrator/invoice/' . $reservasi->id_reservasi) }}"
                                                        target="_blank" class="btn btn-info btn-xs"><i
                                                            class="fas fa-file-invoice"></i></a>
                                                    <div class="tooltip-text">Unduh Invoice</div>
                                                </div> --}}

                                                <div class="tooltip-container">
                                                    <button type="button" class="btn btn-success btn-xs"
                                                        data-toggle="modal"
                                                        data-target="#detailModal{{ $reservasi->id_reservasi }}">
                                                        <i class="fas fa-book"></i>
                                                    </button>
                                                    <div class="tooltip-text">Detail Data</div>
                                                </div>

                                                <div class="tooltip-container">
                                                    <button type="button" class="btn btn-primary btn-xs"
                                                        data-toggle="modal" data-target="#editModal"
                                                        data-id_reservasi="{{ $reservasi->id_reservasi }}"
                                                        data-id_pelanggan="{{ $reservasi->id_pelanggan }}"
                                                        data-nama_pelanggan="{{ $reservasi->user->nama }}"
                                                        data-id_kamars="{{ $reservasi->id_kamar }}"
                                                        data-tanggal_check_in="{{ $reservasi->tanggal_check_in }}"
                                                        data-tanggal_check_out="{{ $reservasi->tanggal_check_out }}"
                                                        data-total_biaya="{{ $reservasi->total_biaya }}"
                                                        data-status="{{ $reservasi->status }}">
                                                        {{-- <span class="btn-icon-left text-primary"> --}}
                                                        <i class="fas fa-edit"></i>
                                                        {{-- </span> --}}
                                                    </button>
                                                    <div class="tooltip-text">Edit Data</div>
                                                </div>
                                                <div class="tooltip-container">
                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                                        data-target="#deleteModal"
                                                        data-id="{{ $reservasi->id_reservasi }}">
                                                        {{-- <span class="btn-icon-left text-danger"> --}}
                                                        <i class="fas fa-trash"></i>
                                                        {{-- </span>Hapus --}}
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
    @include('admin.reservasi.modalDetail')
    @include('admin.reservasi.modalCreate')
    @include('admin.reservasi.modalEdit')
    @include('admin.reservasi.modalDelete')
@endsection

@section('scripts')
    @include('admin.reservasi.scripts')
@endsection
