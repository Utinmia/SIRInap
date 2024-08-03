<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $about->id_about }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-images"></i> Edit Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" action="{{ route('about.update', $about->id_about) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input name="nama" id="nama" class="form-control" value="{{$about->nama}}"></input>
                    </div>
                    <div class="form-group">
                        <label for="kelaas">Kelas</label>
                        <input name="kelas" id="kelas" class="form-control" value="{{$about->kelas}}"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
