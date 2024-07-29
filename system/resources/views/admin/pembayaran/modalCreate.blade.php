<!-- Modal Tambah Admin -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="createForm" action="{{ url('administrator/pembayaran') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel"><i class="fas fa-dollar-sign"></i> Tambah Data Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Reservasi</label>
                        <select id="id_reservasi" name="id_reservasi" class="single-select" required>
                            <option value="">Pilih Reservasi</option>
                            @foreach ($list_reservasi as $reservasi)
                                <option value="{{ $reservasi->id_reservasi }}" data-jumlah="{{$reservasi->total_biaya}}">{{ $reservasi->id_reservasi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" id="jumlah" name="jumlah" class="form-control" style="background-color: rgb(229, 229, 229)" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Metode Bayar</label>
                        <select name="metode_bayar" id="metode_bayar" class="single-select" required>
                            {{-- <option value="">Pilih metode bayar</option> --}}
                            {{-- <option value="Tunai">Tunai</option> --}}
                            <option value="Transfer Bank">Transfer Bank</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Bayar</label>
                        <input type="date" id="tgl_bayar" name="tgl_bayar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Bukti Pembayaran</label>
                        <input type="file" id="bukti_bayar" name="bukti_bayar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="edit_status" required>
                            <option value="Pending">Pending</option>
                            <option value="Success">Success</option>
                            <option value="Failed">Failed</option>
                            <option value="Refunded">Refunded</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
