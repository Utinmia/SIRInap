<!-- Modal Tambah Admin -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="createForm" action="{{ url('administrator/reservasi') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel"><i class="fas fa-calendar-check"></i> Tambah Reservasi
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Konsumen</label>
                        <select id="id_pelanggan" name="id_pelanggan" class="single-select" required>
                            <option value="">Pilih Konsumen</option>
                            @foreach ($list_pelanggan as $pelanggan)
                            <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kamar</label>
                        <select id="id_kamars" name="id_kamars" class="single-select" required>
                            <option value="">Pilih Kamar</option>
                            @foreach ($list_kamar as $kamar)
                                <option value="{{ $kamar->id_kamar }}" data-harga="{{ $kamar->harga }}">
                                    {{ $kamar->nomor_kamar }} - Rp {{ number_format( $kamar->harga, 0) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Check In</label>
                        <input type="date" id="tanggal_check_in" name="tanggal_check_in" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Check Out</label>
                        <input type="date" id="tanggal_check_out" name="tanggal_check_out" class="form-control"
                            required>
                    </div>
                    <div class="form-group" hidden>
                        <label>Total Biaya</label>
                        <input type="text" name="total_biaya" id="total_biaya" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Booked">Booked</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="Checked-in">Checked-in</option>
                            <option value="Checked-out">Checked-out</option>
                            <option value="Canceled">Canceled</option>
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