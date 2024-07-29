<!-- Modal Edit Admin -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel"><i class="fas fa-calendar-check"></i> Edit Reservasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Konsumen</label>
                        <input type="text" id="edit_id_pelanggan" name="id_pelanggan" hidden>
                        <input type="text" id="edit_nama_pelanggan" name="nama_pelanggan" class="form-control" style="background-color: rgb(229, 229, 229)" readonly>
                        {{-- <select id="edit_id_pelanggan" name="id_pelanggan" class="single-select" disabled>
                            <option value="">Pilih Konsumen</option>
                            @foreach ($list_pelanggan as $pelanggan)
                                <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                            @endforeach
                        </select> --}}
                    </div>
                    {{-- <div class="form-group">
                        <label>Kamar</label>
                        <select id="edit_id_kamars" name="id_kamars" class="single-select" disabled>
                            @foreach ($list_kamar as $kamar)
                                <option value="{{ $kamar->id_kamar }}" data-harga="{{ $kamar->harga }}">
                                    {{ $kamar->nomor_kamar }} - Rp {{ number_format( $kamar->harga, 0) }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}
                    {{-- <div class="form-group">
                        <label>Layanan</label>
                        <select id="edit_id_layanans" name="id_layanans[]" class="multi-select" multiple="multiple">
                            @foreach ($list_layanan as $layanan)
                                <option value="{{ $layanan->id_layanan }}" data-harga="{{ $layanan->harga }}">
                                    {{ $layanan->nama_layanan }} - Rp {{ number_format($layanan->harga, 2) }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label>Tanggal Check In</label>
                        <input type="date" id="edit_tanggal_check_in" name="tanggal_check_in" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Check Out</label>
                        <input type="date" id="edit_tanggal_check_out" name="tanggal_check_out" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Total Biaya</label>
                        <input type="text" name="total_biaya" id="edit_total_biaya" class="form-control" style="background-color: rgb(229, 229, 229)" readonly>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="edit_status">
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
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
