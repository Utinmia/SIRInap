@extends('layout.landing')

@section('title', 'SIRInap - Riwayat Pemesanan')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        /* .banner-form__control {
            position: relative;
            padding: 0px 0px 10px 0px;
            border-right: 0px solid var(--villoz-border-color, #d6e2f0);
        }

        .banner-form__control i {
            right: 0px;
        } */

        .banner-form__wrapper {
            position: relative;
            background-color: var(--villoz-white, #fff);
            padding: 5px 0;
        }

        .villa-card-list__image img {
            min-height: 0px;
        }

        .villa-card-list__flash {
            left: 10px;
            top: 10px;
        }

        .villa-detail {
            position: relative;
            border: 1px solid var(--villoz-border-color, #d6e2f0);
            padding: 20px 20px 20px 50px;
        }

        .villa-detail__title {
            font-size: 18px;
            /* margin: 0 20px 20px; */
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgb(0 0 0);
        }
    </style>

    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <ul class="villoz-breadcrumb list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>Riwayat</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
            <h2 class="page-header__title">Riwayat Pemesanan</h2>
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <section class="villa-page" style="padding-bottom: 200px; padding-top: 50px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="villa-sidebar ">
                        <h3 class="villa-sidebar__title">RIWAYAT PEMESANAN</h3>
                        <hr>
                        <table id="tables" class="table table-striped table-hover">
                            <thead>
                                <tr style="border-bottom: 1px solid #d6e2f0;">
                                    <td>#</td>
                                    <td>Detail Kamar</td>
                                    <td class="text-center">Status Pesanan</td>
                                    <td class="text-center">Status Pembayaran</td>
                                    <td style="text-align: right;">Total</td>
                                    <td>Bukti Pembayaran</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_pesanan as $pesanan)
                                    <tr>
                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @foreach ($pesanan->kamars as $kamar)
                                                {{ $kamar->tipe_kamar }} {{ $kamar->nomor_kamar }} -
                                                Rp {{ number_format($kamar->harga, 0, ',', '.') }} / malam
                                            @endforeach
                                            <br>
                                            <strong>Tanggal Check In - Check Out:</strong> <br>
                                            {{-- <div style="display: flex; justify-content: space-between;"> --}}
                                            {{-- <strong>Check In:</strong> --}}
                                            {{ \Carbon\Carbon::parse($pesanan->tanggal_check_in)->translatedFormat('l, d F Y') }}
                                            -
                                            {{-- </div> --}}
                                            {{-- <div style="display: flex; justify-content: space-between;"> --}}
                                            {{-- <strong>Check Out:</strong> --}}
                                            {{ \Carbon\Carbon::parse($pesanan->tanggal_check_out)->translatedFormat('l, d F Y') }}
                                            {{-- </div> --}}
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge {{ $pesanan->getStatusBadgeClass() }}">{{ $pesanan->status }}</span>
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $pembayaran = $pesanan->pembayarans->first();
                                            @endphp

                                            @if ($pembayaran)
                                                <strong> Tanggal Bayar : </strong> <br>
                                                {{ \Carbon\Carbon::parse($pembayaran->tgl_bayar)->translatedFormat('l, d F Y') }}
                                                <br>
                                                <span class="badge {{ $pembayaran->getStatusBadgeClass() }}">
                                                    {{ $pembayaran->status }}
                                                </span>
                                            @else
                                                <span class="badge badge-secondary">Belum konfirmasi pembayaran</span>
                                            @endif
                                        </td>
                                        <td style="text-align: right;">
                                            Rp {{ number_format($pesanan->total_biaya, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            @if ($pembayaran)
                                                <a href="{{ url('system/storage/app/public/' . $pembayaran->bukti_bayar) }}"
                                                    target="_blank" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-download"></i> Bukti Pembayaran
                                                </a>
                                            @else
                                                <span class="badge badge-secondary">Belum konfirmasi pembayaran</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @include('layout.modalDelete')
                                @endforeach
                            </tbody>
                            {{-- tes --}}
                            {{-- <hr> --}}
                            {{-- <tfoot>
                                @php
                                    $totalBiayaKeseluruhan = $list_pesanan->sum('total_biaya');
                                @endphp
                                <tr
                                    style="text-align: right; font-weight: bold; border-top: 1px solid #d6e2f0; border-bottom: 1px solid #d6e2f0;">
                                    <td colspan="4">Total Bayar</td>
                                    <td>Rp {{ number_format($totalBiayaKeseluruhan, 0, ',', '.') }}</td>
                                </tr>
                            </tfoot> --}}
                        </table>

                    </div>
                    {{-- </div>  --}}
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tables').DataTable();
        });
    </script>

@endsection
