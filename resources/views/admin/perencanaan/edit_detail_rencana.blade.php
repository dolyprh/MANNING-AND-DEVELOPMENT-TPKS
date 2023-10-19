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
        <div class="card border-left-dark mb-4 mr-2 col-6">
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
                                    <button class="show-detail btn-sm btn-info" data-id="{{ $detail->detail_id }}"><i class="fas fa-arrow-right"></i> </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
        <div class="card border-left-dark ml-4 mb-4 col-5">
            <div class="card-header mb-4">
                <h6 class="text-dark">Detail Alat</h6>
            </div>
            <table class="table table-bordered detail-table">
                <thead class="table-secondary text-center text-dark">
                    <tr>
                        <th>Alat</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_alat as $alat)
                        <tr>
                            <td>{{ $detail->nama_alat }} </td>
                            <td>{{ $detail->kd_alat }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const showDetailButtons = document.querySelectorAll('.show-detail');
        const detailTable = document.querySelector('.detail-table');

        showDetailButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = button.getAttribute('data-id');
                const detailRows = detailTable.querySelectorAll('tbody tr');
                // Sembunyikan semua baris detail sebelum menampilkan yang sesuai
                detailRows.forEach(row => {
                    row.style.display = 'none';
                });
                // Tampilkan baris detail yang sesuai
                detailTable.querySelector(`[data-id="${id}"]`).style.display = 'table-row';
                // Tampilkan tabel detail
                detailTable.style.display = 'table';
            });
        });
    });
</script>

    @endsection