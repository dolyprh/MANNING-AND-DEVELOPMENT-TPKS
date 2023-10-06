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
                        <tr>
                            <td> <b>ADVANCE</b> <br/> Internasional </td>
                            <td> 0239-057S - 0239-057N </td>
                            <td> 405 - 587 </td>
                            <td> Dari: 13/11/2021 13:00 <br/> sampai: 01/11/2021 01:00 </td>
                            <td> Dari: 13/11/2021 13:30 <br/> sampai: 01/11/2021 12:59</td>
                            <td class="text-center">RCN-ADVN01209112021</td>
                        </tr>
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