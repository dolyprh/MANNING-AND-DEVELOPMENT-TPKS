<div class="modal fade" id="editGroup" tabindex="-1" aria-labelledby="editGroup" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Form Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!--FORM TAMBAH-->
                <form action="/menu" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="edit_group"><b>Edit Group</b></label>
                        <input type="text" class="form-control" id="edit_group"
                            name="edit_group">
                        @error('edit_group')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary tombol-aksi float-right">Ajukan</button>
                    <button class="btn btn-danger tombol-aksi float-right" type="button"
                        data-bs-dismiss="modal">Batal</button>
                </form>
                <!--END FORM TAMBAH-->
            </div>

        </div>
    </div>
</div>
