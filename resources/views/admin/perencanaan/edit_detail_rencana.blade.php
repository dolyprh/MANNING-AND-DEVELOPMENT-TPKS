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

    <div class="card border-left-dark mb-4" style="width: 32rem;">
        <div class="card-header">
            <h6 class="m-0 text-dark">Detail Rencana Baru</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive text-dark">
                <table class="table table-bordered table-align-center" width="100%" cellspacing="0">
                    <thead class="table-secondary text-center text-dark">
                        <tr>
                            <th >Nama Shift</th>
                            <th >Waktu</th>
                            <th >Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-info" >
                                    <i class="fas fa-arrow-right"></i> 
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    @endsection