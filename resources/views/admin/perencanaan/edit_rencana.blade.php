@extends('layouts.main')
@section('content')
    <a href="/rencana-baru" class="btn bg-dark text-white mb-4">
        Kembali
    </a>

    <div class="card border-left-dark mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-dark">Edit Rencana</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive text-dark">
                <table class="table table-bordered table-align-center" width="100%" cellspacing="0">
                    <thead class="table-dark text-center">
                        <tr>
                            <th >Kapal</th>
                            <th >Voyage</th>
                            <th >Kode</th>
                            <th >Rencana Sandar</th>
                            <th >Rencana Kerja</th>
                            <th class="col-sm-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rencana as $item)
                        <tr>
                            <td> <b>{{$item->nama_kapal}} </b>  <br/> {{$item->pelayaran}} </td>
                            <td> {{$item->in_voyage}} - {{$item->out_voyage}}</td>
                            <td> {{$item->kd_awal}} - {{$item->kd_akhir}} </td>
                            <td> Dari: {{date('d/m/Y', strtotime ($item->rcn_sandar))}} {{date('H:i', strtotime ($item->rcn_sandar))}}
                                <br/> 
                                 sampai: {{ date('d/m/Y', strtotime  ($item->rcn_berangkat)) }} {{date('H:i', strtotime ($item->rcn_berangkat))}} 
                            </td>
                            <td> Dari: {{date('d/m/Y', strtotime ($item->rcn_awal_kerja))}} {{date('H:i', strtotime ($item->rcn_awal_kerja))}}
                                <br/> 
                                 sampai: {{ date('d/m/Y', strtotime  ($item->rcn_akhir_kerja)) }} {{date('H:i', strtotime ($item->rcn_akhir_kerja))}} </td>
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
        <div class="card-body p-6 mb-4 p-4">
            <div class="mb-4">
                <form input="id" method="get" enctype="multipart/form-data">
                    <!-- @csrf -->
                    <div class="form-group">
                        <div class="mb-2">
                            <label for="valey" class="form-label">Ganti Alat (Bisa pilih alat lebih dari satu)</label>
                            <select class="js-example-basic-multiple" name="edit_alat[]" multiple="multiple">
                            </select>
                            @error('edit_alat')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- <button type="submit" class="btn btn-success tombol-aksi float-left">Selanjutnya</button> -->
                    @foreach ($rencana as $item)
                    <a href="/rencana-baru/update/detail/{{ $item->rcn_no }}/{{ $item->ves_id }}" class="btn bg-success text-white">
                        Selanjutnya
                    </a>
                    @endforeach
                </form>
                <!-- <a href="/rencana-baru/perencanaan-operasi" class="btn bg-primary text-white">
                    Selanjutnya
                </a> -->
            </div>
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