@extends('layouts.main')
@section('content')

<div class="card card-primary card-tabs" width="50%">
    @foreach ($group_shift as $item)
        <div class="pt-2 h4 p-3 text-white bg-primary font-weight-bold">Operator {{ $item->nama_group }}</div>
    @endforeach
    <div class="card-header">
        <ul class="nav nav-tabs h5 ml-1" id="custom-tabs-two-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-two-cc-tab" data-toggle="pill" href="#custom-tabs-two-cc" role="tab" aria-controls="custom-tabs-two-cc" aria-selected="true">CC</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-two-rtg-tab" data-toggle="pill" href="#custom-tabs-two-rtg" role="tab" aria-controls="custom-tabs-two-rtg" aria-selected="false">RTG & ARTG</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-two-rs-tab" data-toggle="pill" href="#custom-tabs-two-rs" role="tab" aria-controls="custom-tabs-two-rs" aria-selected="false">RS/LS</a>
            </li>
        </ul>
    </div>

    <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">
        <div class="tab-pane fade show active" id="custom-tabs-two-cc" role="tabpanel" aria-labelledby="custom-tabs-two-cc-tab">
            <form action="/spk-baru/insert-alat-operator/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="table-responsive table-sm ">
                <table class="table table-sm table-bordered table-align-center" cellspacing="0">
                    <thead class="table-secondary text-center text-dark">
                        <tr>
                            <th>ID</th>
                            <th class="col-sm-3">Nama Operator</th>
                            <th class="col-sm-2">Jobdesk</th>
                            <th class="col-sm-3">Pilih Alat</th>
                            <th class="col-sm-2">Status</th>
                        </tr>
                    </thead>
                    <tbody id="table-body-spk" class="align-middle">
                        <?php $temp_alat = [] ;
                            foreach($detail_alat_spk as $das) {
                                if(explode('-', $das->kd_alat)[0]=='CC') {
                                    array_push($temp_alat, $das->nama_alat) ;
                                } 
                            }
                        ?>
                        @foreach ($operator_cc as $item)
                        <tr>
                            @foreach ($detail_rcn as $waktu)
                                <input type="text" name="waktu_mulai{{$item->id}}" value="{{ $waktu->waktu_mulai }}" hidden>                            
                                <input type="text" name="waktu_selesai{{$item->id}}" value="{{ $waktu->waktu_selesai }}" hidden>                            
                                <input type="text" name="vesid{{$item->id}}" value="{{ $waktu->ves_id }}" hidden>                            
                            @endforeach
                            <input type="text" name="id_group" value="{{ $id_group }}" hidden>                            
                            <input type="text" name="nipp{{$item->id}}" value="{{ $item->nipp }}" hidden>
                            <td class="align-middle"> {{ $item->id }} </td>
                            <td class="align-middle"> <input type="text" name="nama{{$item->id}}" value="{{ $item->nama }}" hidden> {{ $item->nama }}</td>
                            <td class="align-middle"> <input type="text" name="jobdesk{{$item->id}}" value="{{ $item->jobdesk }}" hidden > {{ $item->jobdesk }}</td>
                            <td class="align-middle"> 
                                <select class="form-select form-select-sm js-example-basic-multiple-cc" name="tambah_alat_cc_{{$item->id}}[]" multiple="multiple">
                                    @if(in_array($item->jobdesk, $temp_alat))
                                        @foreach ($alat_cc as $alat)  
                                                <option <?php if(in_array($alat->text, $temp_alat) && $item->jobdesk == $alat->text) { echo 'selected'; } ?> value="{{ $alat->id }}" >{{ $alat->text }}</option>
                                        @endforeach
                                    @else 
                                        @foreach ($alat_cc as $alat)    
                                            <option value="{{ $alat->id }}" >{{ $alat->text }}</option>
                                        @endforeach
                                    @endif                                  
                                </select>
                            </td>
                            <td class="align-middle text-center" style="display:none">
                                <select name="tambah_dermaga_cc{{$item->id}}[]" multiple="multiple" hidden>
                                @if(in_array($item->jobdesk, $temp_alat))
                                    @foreach ($dermaga as $der)
                                        <option <?php if(in_array($item->jobdesk, $temp_alat) && in_array($der->text, $detail_rcn_array)) { echo 'selected'; } ?> value="{{ $der->text }}">{{ $der->dermaga }}</option>
                                    @endforeach
                                @endif
                                </select>
                            </td>
                            <td class="align-middle">
                                <select class="form-control form-control-sm" aria-label="Default select example" name="status_absen{{$item->id}}" id="jenis_absen">
                                    @if(in_array($item->jobdesk, $temp_alat))    
                                        @foreach ($jenis_absen as $item)
                                            <option value="{{ $item->nama }}" {{ $item->nama === 'Masuk' ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    @else
                                        @foreach ($jenis_absen as $item)
                                            <option value="{{ $item->nama }}" {{ $item->nama === 'Stand by' ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="custom-tabs-two-rtg" role="tabpanel" aria-labelledby="custom-tabs-two-rtg-tab">
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-align-center" cellspacing="0">
                    <thead class="table-secondary text-center text-dark">
                        <tr>
                            <th>ID</th>
                            <th class="col-sm-3">Nama Operator</th>
                            <th class="col-sm-2">Jobdesk</th>
                            <th class="col-sm-2">Pilih Alat</th>
                            <th class="col-sm-3">Dermaga</th>
                            <th class="col-sm-2">Status</th>
                        </tr>
                    </thead>
                    <tbody id="table-body-spk">
                        <?php $temp_alat = [] ;
                            foreach($detail_alat_spk as $das) {
                                if(explode('-', $das->kd_alat)[0]=='A') {
                                    array_push($temp_alat, $das->nama_alat);
                                } 
                            }
                        ?>
                        @foreach ($operator_rtg as $item)
                        <tr>
                            @foreach ($detail_rcn as $waktu)
                                <input type="text" name="waktu_mulai{{$item->id}}" value="{{ $waktu->waktu_mulai }}" hidden>                            
                                <input type="text" name="waktu_selesai{{$item->id}}" value="{{ $waktu->waktu_selesai }}" hidden>                            
                                <input type="text" name="vesid{{$item->id}}" value="{{ $waktu->ves_id }}" hidden>                            
                            @endforeach
                            <input type="text" name="id_group" value="{{ $id_group }}" hidden>                            
                            <input type="text" name="nipp" value="{{ $item->nipp }}" hidden>
                            <td class="align-middle text-center"> {{ $item->id }} </td>
                            <td class="align-middle text-center"> <input type="text" name="nama{{ $item->id}}" value="{{ $item->jobdesk }}" hidden > {{ $item->nama }}</td>
                            <td class="align-middle text-center"> <input type="text" name="jobdesk{{ $item->id}}" value="{{ $item->jobdesk }}" hidden > {{ $item->jobdesk }}</td>
                            <td class="align-middle text-center"> 
                                @if($item->jobdesk == 'RTG')
                                    <select class="form-control form-control-sm" aria-label="Default select example" name="tambah_alat_rtg_{{$item->id}}">
                                        @foreach ($alat_rtg as $alat)    
                                            <option value="{{ $alat->id }}" >{{ $alat->text }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input class="form-control form-control-sm " type="text" value="ARTG" disabled> 
                                    <input class="form-control " type="text" name="tambah_alat_rtg_{{$item->id}}" value="0,ARTG,ARTG" hidden> 
                                @endif                           

                            </td>
                            <td class="align-middle text-center">
                                <select class="form-select form-select-sm align-middle js-example-basic-multiple-berth" name="tambah_dermaga{{$item->id}}[]" multiple="multiple">
                                    @foreach ($dermaga as $item)
                                        <option value="{{ $item->id }}" >{{ $item->dermaga }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="align-middle text-center">
                                <select class="form-control form-control-sm" aria-label="Default select example" name="status_absen{{$item->id}}" id="jenis_absen">
                                    @foreach ($jenis_absen as $item)
                                        <option value="{{ $item->nama }}" {{ $item->nama === 'Stand by' ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>   
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 
                        
        </div>

        <div class="tab-pane fade" id="custom-tabs-two-rs" role="tabpanel" aria-labelledby="custom-tabs-two-rs-tab">
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-align-center" cellspacing="0">
                    <thead class="table-secondary text-center text-dark">
                        <tr>
                            <th>ID</th>
                            <th class="col-sm-3">Nama Operator</th>
                            <th class="col-sm-2">Jobdesk</th>
                            <th class="col-sm-2">Pilih Alat</th>
                            <th class="col-sm-3">Dermaga</th>
                            <th class="col-sm-2">Status</th>
                        </tr>
                    </thead>
                    <tbody id="table-body-spk">
                        <?php $temp_alat = [] ;
                            foreach($detail_alat_spk as $das) {
                                if(explode('-', $das->kd_alat)[0]=='RS') {
                                    array_push($temp_alat, $das->nama_alat) ;
                                } 
                            }
                        ?>
                        @foreach ($operator_rs as $item)
                        <tr>
                            @foreach ($detail_rcn as $waktu)
                                <input type="text" name="waktu_mulai{{$item->id}}" value="{{ $waktu->waktu_mulai }}" hidden>                            
                                <input type="text" name="waktu_selesai{{$item->id}}" value="{{ $waktu->waktu_selesai }}" hidden>                            
                                <input type="text" name="vesid{{$item->id}}" value="{{ $waktu->ves_id }}" hidden>                            
                            @endforeach
                            <input type="text" name="id_group" value="{{ $id_group }}" hidden>                            
                            <input type="text" name="nipp" value="{{ $item->nipp }}" hidden>
                            <td> {{ $item->id }} </td>
                            <td> <input type="text" name="nama{{ $item->id}}" value="{{ $item->jobdesk }}" hidden > {{ $item->nama }}</td>
                            <td> <input type="text" name="jobdesk{{ $item->id}}" value="{{ $item->jobdesk }}" hidden > {{ $item->jobdesk }}</td>
                            <td> 
                                <select class="form-control form-control-sm" name="tambah_alat_rs_{{$item->id}}">
                                    @foreach ($alat_rs as $alat)    
                                        <option value="{{ $alat->id }}" >{{ $alat->text }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="align-middle text-center">
                                <select class="form-select form-select-sm align-middle js-example-basic-multiple-berth" name="tambah_dermaga_rs{{$item->id}}[]" multiple="multiple">
                                    @foreach ($dermaga as $item)
                                        <option value="{{ $item->text }}" >{{ $item->dermaga }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control form-control-sm" aria-label="Default select example" name="status_absen{{$item->id}}" id="jenis_absen">
                                    @foreach ($jenis_absen as $item)
                                        <option value="{{ $item->nama }}" {{ $item->nama === 'Stand by' ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>                                       
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
            <button type="submit" class="btn btn-success float-right mb-4">Submit</button>
            </form>         
        </div>
    </div>
    <button type="submit" class="btn btn-outline-primary mb-4" id="btnSelanjutnya">
        Selanjutnya <i class="pr-2 fas fa-arrow-right"></i> 
    </button>
</div>
</div>

<script>
    window.onload = function() {
        $(document).ready(function() {
            $('.js-example-basic-multiple-cc').select2({
                theme: "bootstrap-5",
                placeholder: "Pilih Alat CC",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
            });
        });

        $(document).ready(function() {
            $('.js-example-basic-multiple-rtg').select2({
                theme: "bootstrap-5",
                placeholder: "Pilih Alat RTG",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
            });
        });

        $(document).ready(function() {
            $('.js-example-basic-multiple-berth').select2({
                theme: "bootstrap-5",
                placeholder: "Pilih Dermaga",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
            });
        });

        
        // $(document).ready(function () {
            // Tambahkan event listener pada tombol "Selanjutnya"
            // $('#btnSelanjutnya').on('click', function () {
                // Pindahkan fokus ke tab RTG setelah mengklik tombol
        //         $('#custom-tabs-two-rtg-tab').tab('show');
        //     });
        // });

        $(document).ready(function () {
        // Tambahkan event listener pada tombol "Selanjutnya"
        $('#btnSelanjutnya').on('click', function () {
            // Periksa tab yang aktif saat ini
            var currentTab = $('.nav-tabs .active');

            // Periksa id tab yang aktif saat ini
            if (currentTab.attr('id') === 'custom-tabs-two-cc-tab') {
                // Pindahkan fokus ke tab RTG jika sekarang berada di tab CC
                $('#custom-tabs-two-rtg-tab').tab('show');
            } else if (currentTab.attr('id') === 'custom-tabs-two-rtg-tab') {
                // Pindahkan fokus ke tab RS jika sekarang berada di tab RTG
                $('#custom-tabs-two-rs-tab').tab('show');
            }
        });
    });
}
</script>

@endsection