<!-- Modal Edit Admin -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel"><i class="fas fa-dollar-sign"></i> Edit Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Reservasi</label>
                        <select id="edit_id_reservasi" name="id_reservasi" class="single-select" required>
                            <option value="">Pilih Reservasi</option>   
                            @foreach ($list_reservasi as $reservasi)
                                <option value="{{ $reservasi->id_reservasi }}">{{ $reservasi->id_reservasi }} - {{ $reservasi->user->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" id="edit_jumlah" name="jumlah" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Metode Bayar</label>
                        <select name="metode_bayar" id="edit_metode_bayar" class="single-select">
                            <option value="">Pilih metode bayar</option>
                            <option value="Tunai">Tunai</option>
                            <option value="Transfer Bank">Transfer Bank</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Bayar</label>
                        <input type="date" id="edit_tgl_bayar" name="tgl_bayar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="edit_status">
                            <option value="Pending">Pending</option>
                            <option value="Success">Success</option>
                            <option value="Failed">Failed</option>
                            <option value="Refunded">Refunded</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
