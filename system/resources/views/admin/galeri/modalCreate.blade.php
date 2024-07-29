<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel"><i class="fas fa-images"></i> Tambah Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="createForm" action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_kamar">Tag</label>
                        <select name="id_kamar" id="id_kamar" class="form-control" required>
                            <option value="">Pilih Tag</option>
                            @foreach ($list_kamar as $kamar)
                                <option value="{{ $kamar->id_kamar }}">{{ $kamar->tipe_kamar }} {{ $kamar->nomor_kamar }}</option>
                            @endforeach
                            <option value="999">Lain-lain</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="url_gambar">Foto</label>
                        <input type="file" name="gambar" id="gambar" class="form-control-file" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_gambar">Deskripsi</label>
                        <textarea name="deskripsi_gambar" id="deskripsi_gambar" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
