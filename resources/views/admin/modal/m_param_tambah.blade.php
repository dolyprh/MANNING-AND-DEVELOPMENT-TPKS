<div class="modal fade" id="tambahParam" tabindex="-1" aria-labelledby="tambahParam" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!--FORM TAMBAH-->
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_param"><b>Nama Parameter</b></label>
                        <input type="text" class="form-control" id="nama_param"
                            name="nama_param">
                        @error('nama_param')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="keterangan"><b>Keterangan</b></label>
                        <input type="text" class="form-control" id="keterangan"
                            name="keterangan">
                        @error('keterangan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nilai1"><b>Nilai 1</b></label>
                        <input type="text" class="form-control" id="nilai1"
                            name="nilai1">
                        @error('nilai1')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nilai2"><b>Nilai 2</b></label>
                        <input type="text" class="form-control" id="nilai2"
                            name="nama_param">
                        @error('nilai2')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nilai3"><b>Nilai 3</b></label>
                        <input type="text" class="form-control" id="nilai3"
                            name="nilai3">
                        @error('nilai3')
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
