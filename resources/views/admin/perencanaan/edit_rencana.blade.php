@extends('layouts.main')
@section('content')
    <a href="/rencana-baru" class="btn text-primary mb-4"> 
        <i class="pr-2 fas fa-arrow-left"></i> Kembali
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
                <form action="/rencana-baru/update-alat/{{ $item->rcn_no }}/1" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="mb-2">
                            <label for="valey" class="form-label">Ganti Alat (Bisa pilih alat lebih dari satu)</label>
                            <input type="text" name="waktuAwal" value="{{$rencana[0]->rcn_sandar}}" hidden>
                            <input type="text" name="waktuAkhir" value="{{$rencana[0]->rcn_berangkat}}" hidden>
                            <input type="text" name="rcnNo" value="{{$rencana[0]->rcn_no}}" hidden>
                            <input type="text" name="vesId" value="{{$rencana[0]->ves_id}}" hidden>
                            <div class="container">
                                <div class="row text-center">
                                    <div class="card-body mb-2 col-4">
                                        <div class="card-header py-3">
                                            <h6 class="font-weight-bold text-dark">Porttainer or Quay Crane</h6>
                                        </div>
                                        <div class="text-center mb-2">
                                            <img src="{{ asset('templates/img/craine_Images/cc.png') }}" width="220px" class="rounded" alt="...">
                                        </div>
                                        <select class="js-example-basic-multiple-ccr" name="edit_alat_ccr[]" multiple="multiple">
                                        </select>
                                        @error('edit_alat_ccr')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="card-body mb-2 col-4">
                                        <div class="card-header py-3">
                                            <h6 class="font-weight-bold text-dark">ARTG & RTG</h6>
                                        </div>
                                        <div class="text-center mb-2">
                                            <img src="{{ asset('templates/img/artg_Images/artg_ImgID1.png') }}" width="150px" class="rounded" alt="...">
                                        </div>
                                        <select class="js-example-basic-multiple-artg" name="edit_alat_artg[]" multiple="multiple">
                                        </select>
                                        @error('edit_alat_artg')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="card-body mb-2 col-4">
                                        <div class="card-header py-3">
                                            <h6 class="font-weight-bold text-dark">Reach Stacker</h6>
                                        </div>
                                        <div class="text-center mb-2">
                                            <img src="{{ asset('templates/img/sr_images/sr.png') }}" width="280px" class="rounded" alt="...">
                                        </div>
                                        <select class="js-example-basic-multiple-artg" name="[]" multiple="multiple">
                                        </select>
                                        
                                    </div>
                                </div>  
                                <button type="submit" name="submit" class="btn bg-success float-right mr-2 mb-4 text-white">
                                    Selanjutnya
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            $(document).ready(function() {
                $('.js-example-basic-multiple-ccr').select2({
                    data: <?= json_encode($alat_ccr) ?>,
                    theme: "bootstrap-5",
                    placeholder: "Pilih Alat",
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
                });
                $('.js-example-basic-multiple-artg').select2({
                    data: <?= json_encode($alat_artg) ?>,
                    theme: "bootstrap-5",
                    placeholder: "Pilih Alat",
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
                });
            });
        }
    </script>
    @endsection
    @include('sweetalert::alert')

