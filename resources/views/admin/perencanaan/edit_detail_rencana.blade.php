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

    <div class="row mx-auto">
        <div class="card mb-4 mr-5 col-6">
            <div class="card-header">
                <h6 class="text-dark">Detail Rencana Baru</h6>
            </div>
            <div class="container card-body">
                <div class="table-responsive text-dark">
                    <table class="table table-bordered " >
                        <thead class="table-secondary text-center text-dark">
                            <tr>
                                <th >Nama Shift</th>
                                <th >Waktu</th>
                                <th >Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_rcn as $detail)
                            <tr>
                                <td> {{ $detail->nama_shift }} </td>
                                <td> 
                                    Dari: {{date('d/m/Y', strtotime ($detail->waktu_mulai))}} {{date('H:i', strtotime ($detail->waktu_mulai))}}
                                    <br/> 
                                    sampai: {{ date('d/m/Y', strtotime  ($detail->waktu_selesai)) }} {{date('H:i', strtotime ($detail->waktu_selesai))}} 
                                </td>
                                <td class="text-center">
                                    <a href="/rencana-kapal/{{ $detail->rcn_no }}/{{ $detail->detail_id }}" >
                                        <button class="show-alat btn-sm btn-info" ><i class="fas fa-arrow-right"></i> </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="/rencana-baru" class="mb-4">
                <button type="submit" name="submit" class="btn bg-success float-left ml-3 text-white">
                    Selanjutnya
                </button>
            </a>
        </div>
    
        <div class="card px-4 ml-2 mb-4 col-5 w-100" >
            <div class="card-header mb-4">
                <h6 class="text-dark">Detail Alat</h6>
            </div>
            <table class="table table-bordered detail-table">
                <thead class="table-secondary text-center text-dark">
                    <tr>
                        <th>No</th>
                        <th>Alat</th>
                        <th>Kode alat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @foreach ($detail_alat as $alat)
                <tbody id="alat-table-{{ $detail->detail_id }}">
                    <tr>
                        <td>{{$alat->detail_id }}</td>
                        <td>{{$alat->nama_alat}}</td>
                        <td>{{$alat->kd_alat}}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target='#deleteRcnAlat{{ $alat->seq_id }}' >
                                <i class="fas fa-window-close"></i> 
                            </button>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    
    <script>

        $(document).ready(function() {
            $('.show-alat').click(function() {
                var detailId = $(this).data('detail-id');
                var alatTable = $('#alat-table-' + detailId);

                // Toggle tabel alat berdasarkan detail_id yang sesuai
                alatTable.toggle();
            });
        });

        // function myFunction() {
        // var x = document.getElementById("myAlat");
        //     if (x.style.display === "none") {
        //         x.style.display = "block";
        //     } else {
        //         x.style.display = "none";
        //     }
        // }
        
    </script>


    @include('admin.modal.m_rcnalat_delete')
    @include('sweetalert::alert')
    @endsection