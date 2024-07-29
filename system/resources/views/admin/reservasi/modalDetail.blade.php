<!-- Modal Tambah Admin -->
@foreach ($list_reservasi as $reservasi)
    <div class="modal fade" id="detailModal{{ $reservasi->id_reservasi }}" tabindex="-1" role="dialog"
        aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <form id="detailReservasiForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel"><i class="fas fa-calendar-check"></i> Detail Reservasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h6 class="title">Info Konsumen</h6>
                                <hr class="mt-0">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Nama</td>
                                            <td style="width: 20px; text-align:center;">:</td>
                                            <td>{{ $reservasi->user->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td style="width: 20px; text-align:center;">:</td>
                                            <td>{{ $reservasi->user->jenis_kelamin }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td style="width: 20px; text-align:center;">:</td>
                                            <td>{{ $reservasi->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td style="width: 20px; text-align:center;">:</td>
                                            <td>{{ $reservasi->user->telepon }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td style="width: 20px; text-align:center;">:</td>
                                            <td>{{ $reservasi->user->alamat }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-3">
                                <h6 class="title">Info Kamar</h6>
                                <hr class="mt-0">
                                @foreach ($reservasi->kamars as $kamar)
                                    <table class="mb-4">
                                        <tbody>
                                            <tr>
                                                <td>Nomor Kamar</td>
                                                <td style="width: 20px; text-align:center;">:</td>
                                                <td>{{ $kamar->nomor_kamar }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tipe Kamar</td>
                                                <td style="width: 20px; text-align:center;">:</td>
                                                <td>{{ $kamar->tipe_kamar }}</td>
                                            </tr>
                                            <tr>
                                                <td>Harga</td>
                                                <td style="width: 20px; text-align:center;">:</td>
                                                <td>Rp {{ number_format($kamar->harga, 0, ',', '.') }} / malam</td>
                                            </tr>
                                            <tr>
                                                <td>Status Kamar</td>
                                                <td style="width: 20px; text-align:center;">:</td>
                                                <td><span
                                                        class="badge {{ $kamar->getStatusBadgeClass() }}">{{ $kamar->status }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endforeach
                            </div>
                            <div class="col-md-5">
                                <h6 class="title">Info Reservasi dan Pembayaran</h6>
                                <hr class="mt-0">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Tanggal Check In</td>
                                            <td style="width: 20px; text-align:center;">:</td>
                                            <td>{{ $reservasi->tanggal_check_in }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Check Out</td>
                                            <td style="width: 20px; text-align:center;">:</td>
                                            <td>{{ $reservasi->tanggal_check_out }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Biaya</td>
                                            <td style="width: 20px; text-align:center;">:</td>
                                            <td>Rp {{ number_format($reservasi->total_biaya, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status Reservasi</td>
                                            <td style="width: 20px; text-align:center;">:</td>
                                            <td><span
                                                    class="badge {{ $reservasi->getStatusBadgeClass() }}">{{ $reservasi->status }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Bayar</td>
                                            <td style="width: 20px; text-align:center;">:</td>
                                            <td>
                                                {{ optional($reservasi->pembayaran)->tgl_bayar ?? 'Belum ada data pembayaran' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Metode Pembayaran</td>
                                            <td style="width: 20px; text-align:center;">:</td>
                                            <td>
                                                {{ optional($reservasi->pembayaran)->metode_bayar ?? 'Belum ada data pembayaran' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pembayaran</td>
                                            <td style="width: 20px; text-align:center;">:</td>
                                            <td>
                                                {{ optional($reservasi->pembayaran)->jumlah ? 'Rp' . number_format(optional($reservasi->pembayaran)->jumlah, 0, ',', '.') : 'Belum ada data pembayaran' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status Pembayaran</td>
                                            <td style="width: 20px; text-align:center;">:</td>
                                            <td>
                                                {{-- {{ optional($reservasi->pembayaran)->status ?? 'Belum ada data pembayaran' }} --}}
                                                @if ($reservasi->pembayaran)
                                                    <span
                                                        class="badge {{ $reservasi->pembayaran->getStatusBadgeClass() }}">{{ $reservasi->pembayaran->status }}</span>
                                                @else
                                                    <span class="badge badge-secondary">Belum ada data pembayaran</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach
