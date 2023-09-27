<!-- Modal Hapus -->
@foreach ($jadwal_group as $item)
    <div class="modal fade" id="deleteJGroup{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="deleteJGroup" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="nama_jadwal_group">Hapus Jadwal Group</h5>
                    <button type="button" class="close text-white" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                        Yakin Ingin Menghapus Jadwal Group?
                </div>
                <form action="/jadwal-group/{{ $item->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-success" type="submit">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
