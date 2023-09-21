<div class="modal fade" id="editAlat" tabindex="-1" aria-labelledby="editAlat" aria-hidden="true">
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
                        <label for="nama_menu"><b>Nama Menu</b></label>
                        <input type="text" class="form-control" id="nama_menu"
                            name="nama_submenu">
                        @error('nama_menu')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_menu"><b>Jenis Menu</b></label>
                        <select class="form-control" name="jenis_menu" id="jenis_menu">
                            <option selected disabled>Pilih Jenis Menu</option>
                            <option value="1" @if (old('jenis_menu') == 'Terbuka') selected @endif>Master</option>
                            <option value="2" @if (old('jenis_menu') == 'Terbatas') selected @endif>Perencanaan</option>
                            <option value="3" @if (old('jenis_menu') == 'Terbatas') selected @endif>Surat Perintah Kerja</option>
                            <option value="4" @if (old('jenis_menu') == 'Terbatas') selected @endif>Extra Fooding</option>
                            <option value="5" @if (old('jenis_menu') == 'Terbatas') selected @endif>Laporan</option>
                        </select>
                        @error('jenis_dokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="add_menu"><b>URL Menu</b></label>
                        <input type="text" class="form-control" id="url_submenu"
                            name="url_submenu">
                        @error('url_submenu')
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
