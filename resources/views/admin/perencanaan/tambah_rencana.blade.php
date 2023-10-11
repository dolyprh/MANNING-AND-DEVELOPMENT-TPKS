@extends('layouts.main')
@section('content')
    <div class="card border-left-dark mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-dark">Detail Rencana Baru</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive text-dark">
                <table class="table table-bordered table-align-center" width="100%" cellspacing="0">
                    <thead class="table-dark text-center">
                    <tr>
                        <th>Kapal</th>
                        <th>Voyage</th>
                        <th>Kode</th>
                        <th>Rencana Sandar</th>
                        <th>Rencana Kerja</th>
                        <th class="col-sm-2">NO RCN</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($rencana as $item)
                        <tr>
                            <td><b>{{$item->nama_kapal}} </b> <br/> {{$item->pelayaran}} </td>
                            <td> in {{$item->in_voyage}} <br/> out {{$item->out_voyage}}</td>
                            <td> {{$item->kd_awal}} - {{$item->kd_akhir}} </td>
                            <td>
                                Dari: {{date('d/m/Y', strtotime ($item->rcn_sandar))}} {{date('H:i', strtotime ($item->rcn_sandar))}}
                                <br/>
                                sampai: {{ date('d/m/Y', strtotime  ($item->rcn_berangkat)) }} {{date('H:i', strtotime ($item->rcn_berangkat))}}
                            </td>
                            <td>
                                Dari: {{date('d/m/Y', strtotime ($item->rcn_awal_kerja))}} {{date('H:i', strtotime ($item->rcn_awal_kerja))}}
                                <br/>
                                sampai: {{ date('d/m/Y', strtotime  ($item->rcn_akhir_kerja)) }} {{date('H:i', strtotime ($item->rcn_akhir_kerja))}}
                            </td>
                            <td class="text-center">
                                {{$item->rcn_no}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card border-left-dark mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-dark">Alat</h5>
        </div>
        <div class="p-6 mb-4 p-4">
            <div class="mb-2">
                <form action="rencana-baru" method="get" enctype="multipart/form-data">
                    <!-- @csrf -->
                    <div class="form-group">
                        <div class="mb-2">
                            <label for="valey" class="form-label">Pilih Alat (Bisa pilih alat lebih dari satu)</label>
                            <select class="js-example-basic-multiple" name="alat[]" multiple="multiple">
                            </select>
                            @error('pilih_alat')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success tombol-aksi float-left">Tambah</button>
                </form>
            </div>
            <!-- <a href="/rencana-baru/perencanaan-operasi" class="btn bg-primary text-white">
                Selanjutnya
            </a> -->
        </div>
    </div>
    <script>
        window.onload = function() {
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2({
                    data: <?= json_encode($alat) ?>,
                    theme: "bootstrap-5",
                    placeholder: "Pilih Alat",
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
                });
            });
        }
    </script>
@endsection
