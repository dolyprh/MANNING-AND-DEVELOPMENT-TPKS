<!-- Modal Hapus -->
@foreach ($tspk_header as $item)
    <div class="modal fade" id="updateTspk{{ $item->id_h }}" tabindex="-1" role="dialog"
        aria-labelledby="updateTspk" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="updateTspk">Approve Pengajuan SPK</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    Approve pengajuan SPK dari {{ $item->created_nama }} dengan no spk <b>{{ $item->spk_no }}</b> ?
                </div>
                <form action="/surat-perintah-kerja/{{ $item->id_h }}" method="POST">
                    @csrf
                    @method('PUT')
                     {{-- Jenis input untuk memisahkan jenis update berdasarkan jenis --}}
                    <input name="created_nipp" type="text" value="{{ Auth::user()->nipp }}" hidden>
                    {{-- value untuk ubah status peminjaman. update ke table peminjaman --}}
                    <input name="nama_approval" type="text" value="{{ Auth::user()->name }}" hidden>

                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Approve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
