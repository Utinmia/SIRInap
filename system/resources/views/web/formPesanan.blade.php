@extends('layout.landing')

@section('title', 'SIRInap - Sistem Informasi Reservasi Penginapan')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .banner-form__control {
            position: relative;
            padding: 0px 0px 10px 0px;
            border-right: 0px solid var(--villoz-border-color, #d6e2f0);
        }

        .banner-form__control i {
            right: 0px;
        }

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

        .text-muted {
            color: red !important;
        }

        /* .villa-card-list__content {
                                                                                                                                                            padding: 11px 30px;
                                                                                                                                                        } */

        /* .
                                                                                                                                                         */
    </style>

    <section class="page-header">
        <div class="page-header__bg"></div>
        <!-- /.page-header__bg -->
        <div class="container">
            <ul class="villoz-breadcrumb list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>Form Pesanan</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
            <h2 class="page-header__title">Pemesanan</h2>
        </div><!-- /.container -->
        {{-- <div class="banner-form__position wow fadeInUp" data-wow-delay="300ms">
            <div class="container">



            </div>
        </div> --}}
    </section><!-- /.page-header -->

    <section class="villa-page" style="padding-bottom: 200px; padding-top: 50px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="villa-sidebar ">
                        <h3 class="villa-sidebar__title">FORM PESANAN</h3>
                        <hr>
                        <form id="formPesanan" class="banner-form__wrapper wow fadeInUp" action="{{ route('pesan.store') }}"
                            method="POST" data-wow-delay="400ms">
                            @csrf
                            {{-- <div class="card-body"> --}}
                            <div class="banner-form__control">
                                <label for="checkin">Checkin</label>
                                <input class="villoz-datepicker" id="checkin" type="text" name="checkin"
                                    placeholder="Masukkan Tanggal">
                                <small id="checkinHelp" class="form-text text-muted"></small>
                                <i class="icon-calendar"></i>
                            </div>
                            <div class="banner-form__control">
                                <label for="checkout">Checkout</label>
                                <input class="villoz-datepicker" id="checkout" type="text" name="checkout"
                                    placeholder="Masukkan Tanggal">
                                <small id="checkoutHelp" class="form-text text-muted"></small>
                                <i class="icon-calendar"></i>
                            </div>
                            <div class="banner-form__control">
                                <label for="tipe_kamar">Tipe Kamar</label>
                                <select name="id_kamars" class="selectpicker" id="id_kamars">
                                    <option value="">Pilih Tipe Kamar</option>
                                    @foreach ($list_kamar as $kamar)
                                        <option value="{{ $kamar->id_kamar }}" data-harga="{{ $kamar->harga }}">
                                            {{ $kamar->tipe_kamar }}
                                            {{ $kamar->nomor_kamar }}
                                        </option>
                                    @endforeach
                                </select>
                                <small id="idkamarHelp" class="form-text text-muted"></small>
                                <i class="icon-bed"></i>
                            </div>
                            <hr>
                            <div style="display: flex; justify-content: space-between;">
                                Total <span id="total_biaya">0</span>
                            </div>
                            <hr>
                            {{-- </div> --}}
                            <button type="submit" aria-label="search submit" class="btn btn-success form-control">
                                {{-- <i class="fas fa-plus"></i> --}}
                                <span><i class="fas fa-plus"></i> Pesan Sekarang</span>
                            </button>
                            {{-- </div> --}}
                        </form>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="villa-sidebar ">
                        <h3 class="villa-sidebar__title">DETAIL PESANAN</h3>
                        <hr>
                        @if ($list_pesanan->isEmpty())
                            <p>Belum ada pesanan.</p>
                        @else
                            @php
                                $totalBiayaKeseluruhan = 0;
                            @endphp
                            <table style="width: 100%;">
                                <thead>
                                    <tr style="border-bottom: 1px solid #d6e2f0;">
                                        <td>#</td>
                                        <td>Detail Kamar</td>
                                        <td class="text-center">Status Pesanan</td>
                                        <td class="text-center">Status Pembayaran</td>
                                        <td style="text-align: right;">Total</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($list_pesanan as $pesanan)
                                        <tr style="border-bottom: 1px solid #d6e2f0;">
                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                            <td>
                                                <a href="#" type="button" class="btn btn-outline-danger btn-sm"
                                                    data-toggle="modal" data-target="#deleteModal"
                                                    data-id="{{ $pesanan->id_reservasi }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
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
                                                    <span class="badge {{ $pembayaran->getStatusBadgeClass() }}">
                                                        {{ $pembayaran->status }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-secondary">Belum konfirmasi pembayaran</span>
                                                @endif
                                            </td>
                                            <td style="text-align: right;">Rp
                                                {{ number_format($pesanan->total_biaya, 0, ',', '.') }}</td>
                                        </tr>
                                        @include('layout.modalDelete')
                                        @php
                                            $totalBiayaKeseluruhan += $pesanan->total_biaya; // Menambahkan total biaya pesanan
                                        @endphp
                                    @endforeach
                                </tbody>
                                {{-- <hr> --}}
                                <tfoot>
                                    <tr
                                        style="text-align: right; font-weight: bold; border-top: 1px solid #d6e2f0; border-bottom: 1px solid #d6e2f0;">
                                        <td colspan="4">Total Bayar</td>
                                        <td>Rp {{ number_format($totalBiayaKeseluruhan, 0, ',', '.') }}</td>
                                    </tr>
                                </tfoot>

                            </table>
                            {{-- <hr> --}}
                            <br>
                            @if (!$pembayaran)
                                <div style="display: flex; justify-content: flex-end;">
                                    <button type="submit" class="btn btn-success" data-toggle="modal"
                                        data-target="#modalBayar">
                                        <i class="fas fa-credit-card pr-2"></i> Bayar Sekarang
                                    </button>
                                </div>
                            @endif

                            {{-- Modal Bayar --}}
                            <div class="modal fade" id="modalBayar" tabindex="-1" role="dialog"
                                aria-labelledby="modalBayarLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalBayarLabel">Detail Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('pembayaran.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <!-- Form fields for payment -->
                                                {{-- <input type="hidden" id="id_reservasi" name="id_reservasi[]" value="{{ $id_reservasi }}"> --}}
                                                <div class="form-group">
                                                    <label for="jumlah_pembayaran">Jumlah Pembayaran</label>
                                                    <h2>Rp {{ number_format($totalBiayaKeseluruhan, 0, ',', '.') }}</h2>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jumlah_pembayaran">Metode Pembayaran</label><br>
                                                    <div class="row mb-4">
                                                        <div class="col-md-3">
                                                            <img src="{{ url('public/logo') }}/bri_v.png" width="90%"
                                                                alt="">
                                                        </div>
                                                        <div class="col-md-7 mb-4">
                                                            <span>Transfer Bank</span><br>
                                                            <span class="fw-bold">No. Rek : 620213213123213213 <br> Nama :
                                                                Nur Aini</span>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <img src="{{ url('public/logo') }}/bsi.png" width="90%"
                                                                alt="">
                                                        </div>
                                                        <div class="col-md-7">
                                                            <span>Transfer Bank</span><br>
                                                            <span class="fw-bold">No. Rek : 78889898676 <br> Nama : Nur
                                                                Aini</span>
                                                        </div>
                                                    </div>
                                                    <label for="jumlah_pembayaran">Bukti Pembayaran</label>
                                                    <input type="file" name="bukti_bayar" id="bukti_bayar"
                                                        class="form-control">
                                                </div>
                                                <div class="alert alert-primary" role="alert">
                                                    Pembayaran anda akan di proses maksimal 2 jam setelah melakukan pemesanan, jika belum di proses silahkan hubungi kami.
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Konfirmasi
                                                    Pembayaran</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal Bayar --}}

                        @endif
                    </div>
                    {{-- </div>  --}}
                </div>
            </div>
        </div>

        </div>
    </section>

    {{-- Modal Bayar --}}


@endsection
@section('scripts')

    <script>
        $(document).ready(function() {
            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button yang memicu modal
                var id = button.data('id'); // Ambil ID dari atribut data-id
                var action = '{{ route('form-pesanan.delete', ['id' => ':id']) }}';
                action = action.replace(':id', id);
                $('#deleteForm').attr('action', action);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            function calculateTotal() {
                var checkin = $('#checkin').val();
                var checkout = $('#checkout').val();
                var kamar = $('#id_kamars').find(':selected').data('harga');

                if (checkin && checkout && kamar) {
                    var checkinDate = new Date(checkin);
                    var checkoutDate = new Date(checkout);
                    var timeDifference = checkoutDate - checkinDate;
                    var dayDifference = timeDifference / (1000 * 3600 * 24);

                    if (dayDifference > 0) {
                        var total = dayDifference * kamar;
                        $('#total_biaya').text('Rp ' + total.toLocaleString('id-ID'));
                    } else {
                        $('#total_biaya').text('Rp 0');
                    }
                } else {
                    $('#total_biaya').text('Rp 0');
                }
            }

            $('#checkin, #checkout, #id_kamars').on('change', calculateTotal);

            $('#formPesanan').on('submit', function(event) {
                var checkinInput = $('#checkin');
                var checkoutInput = $('#checkout');
                var checkinHelp = $('#checkinHelp');
                var checkoutHelp = $('#checkoutHelp');
                var kamarHelp = $('#id_kamarsHelp');
                var isValid = true;

                checkinHelp.text('');
                checkoutHelp.text('');
                kamarHelp.text('');

                if (!checkinInput.val()) {
                    isValid = false;
                    checkinHelp.text('Pilih tanggal checkin');
                    // checkinHelp.addClass('text-danger');
                }

                if (!checkoutInput.val()) {
                    isValid = false;
                    checkoutHelp.text('Pilih tanggal checkout');
                    // checkoutHelp.addClass('text-danger');
                }

                if ($('#id_kamars').val() == "") {
                    isValid = false;
                    kamarHelp.text('Pilih tipe kamar');
                    // kamarHelp.addClass('text-danger');
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });
    </script>


    {{-- <script>
        $(document).ready(function() {
            function hitungTotalBiaya() {
                var checkin = $('#checkin').datepicker('getDate');
                var checkout = $('#checkout').datepicker('getDate');
                var id_kamar = $('#id_kamars').val();

                // Menghitung selisih hari
                var oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                var selisihHari = Math.round(Math.abs((checkin - checkout) / oneDay));

                // Mengambil harga per malam dari option terpilih
                var hargaPerMalam = $('#id_kamars option:selected').data('harga');

                // Menghitung total biaya
                var totalBiaya = selisihHari * hargaPerMalam;

                // Menetapkan nilai total biaya ke input
                $('#total_biaya').text('Rp ' + formatRupiah(totalBiaya));


            }

            // Inisialisasi datepicker untuk elemen dengan kelas 'villoz-datepicker'
            $(".villoz-datepicker").datepicker({
                dateFormat: 'yy-mm-dd', // Format tanggal yang diinginkan
                onSelect: hitungTotalBiaya // Panggil fungsi hitungTotalBiaya saat tanggal dipilih
            });

            // Panggil fungsi hitungTotalBiaya saat nilai selectbox 'id_kamars' berubah
            // $('#id_kamars').on('change',hitungTotalBiaya);
            $('#id_kamars').on('change', function() {
                // alert("tes");

                hitungTotalBiaya(); // Panggil fungsi hitungTotalBiaya di sini
            });


            $('#formPesanan').on('submit', function(event) {
                var checkinInput = $('#checkin');
                var checkoutInput = $('#checkout');
                var idkamarInput = $('#id_kamars');
                var checkinHelp = $('#checkinHelp');
                var checkoutHelp = $('#checkoutHelp');
                var idkamarHelp = $('#id_kamars');
                var isValid = true;

                checkinHelp.text('');
                checkoutHelp.text('');
                idkamarHelp.text('');

                if (!checkinInput.val()) {
                    isValid = false;
                    checkinHelp.text('Pilih tanggal checkin');
                    // checkinHelp.addClass('text-danger');
                }

                if (!checkoutInput.val()) {
                    isValid = false;
                    checkoutHelp.text('Pilih tanggal checkout');
                    // checkoutHelp.addClass('text-danger');
                }

                if (!idkamarInput.val()) {
                    isValid = false;
                    idkamarHelp.text('Pilih tipe kamar');
                    // idkamarHelp.addClass('text-danger');
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });
    </script> --}}
@endsection
