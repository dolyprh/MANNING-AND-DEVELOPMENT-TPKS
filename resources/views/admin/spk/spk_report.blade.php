@extends('layouts.main')
@section('content')

<style>
    .row {
        font-size: 10px;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="row align-items-center text-center">
    <div class="col-xl-10">
        @foreach($group_shift as $item)
        <div class="align-items-center text-center justify-content-between mb-4">
            <h1 class="h5 mb-2 text-gray-800"><strong>{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->format('l - d F Y') }} {{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}</strong></h1>
            <h1 class="h5 mb-2 text-gray-800"><strong><u>MANNING & DEPLOYMENT TERMINAL PETIKEMAS SEMARANG</u></strong></h1>
            <h1 class="h5 mb-2 text-gray-800"><strong>{{ $item->nama_group }} - SHIFT {{ $item->no_shift }}</strong></h1>
        </div>
        @endforeach
    </div>
    <div class="col-xl-2">
        <img src="{{ asset('templates/img/qrcode.svg') }}" width="100px">
    </div>
   
</div>

<div class="card mb-4">
    <div class="card-header bg-info text-center text-light py-2" style="height: 2rem;">
        <h6 class="m-0 font-weight-bold text-light">P&C ON DUTY</h6>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card-body border-bottom-primary shadow">
                <div class="table-responsive table-sm">
                    <table class="table table-sm table-bordered table-align-center" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th>ASMAN OPERASI</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>DUTY OPERASI</th>
                                <td>-</td>
                            </tr>                 
                            <tr>
                                <th>SUPERVISI GRUP</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>DUTY PLANNER</th>
                                <td>-</td>
                            </tr>                 
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3">
            <div class="card-body shadow border-bottom-success">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered p table-align-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="2" class="align-middle">SHIP PLANNER</th>
                                <td colspan="2">
                                    @foreach($ship_planner as $item)
                                        {{ $item->nama }}
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>-</td>
                            </tr>

                            <tr>
                                <th rowspan="2" class="align-middle">YARD PLANNER</th>
                                <td colspan="2">
                                    @foreach($yard_planner as $item)
                                        {{ $item->nama }}
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>-</td>
                            </tr>
                        </thead>
                    </table>
                </div>  
            </div>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-xl-3">
            <div class="card-body border-bottom-info shadow">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-align-center" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th>BERTH ALLOCATION (BA)</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>MANNING & DEPLOYMENT</th>
                                <td>-</td>
                            </tr>                 
                            <tr>
                                <th>REPORTING</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>HSSE OFFICER</th>
                                <td>-</td>
                            </tr>                 
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3">
            <div class="card-body border-bottom-warning shadow">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                        <thead class="table-secondary text-dark">
                            <tr >
                                <th colspan="2">APPROVAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <strong>MANAGER PERENCANAAN OPERAS</strong><br><br>
                                    <span>{{ Auth::user()->name }}</span>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>
</div>

<!-- BERTH 01 -->
<div class="card mb-4">
    <div class="card-header bg-warning text-center text-light py-2"  style="height: 2rem;">
        <h6 class="m-0 font-weight-bold text-light">BERTH 01</h6>
    </div>
    <div class="row">
        <div class="col-xl-3 mb-4">
            <div class="card-body border-bottom-primary shadow">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-align-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center">VESSEL INFO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class='name-ht'>SHIP TALKER</th>
                                <th class='name-ht'>HT 42</th>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center">VESSEL 1(VESSEL TARGET)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class='name-ht'>VESSEL NAME</th>
                                <th class='name-ht'>
                                    @foreach($vessel_planner as $item)
                                        {{ $item->nama}}
                                    @endforeach
                                </th>
                            </tr>
                            <tr>
                                <th class='name-ht'>CLOSSING TIME</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ETB / ATB</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ETC/ATC</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ACTUAL DISCH/LOAD </th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>REMAINING DISC/LOAD </th>
                                <th class='name-ht'>-</th>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center">VESSEL 1</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class='name-ht'>VESSEL NAME</th>
                                <th class='name-ht'>
                                    @foreach($vessel_planner as $item)
                                        {{ $item->nama}}
                                    @endforeach
                                </th>
                            </tr>
                            <tr>
                                <th class='name-ht'>CLOSSING TIME</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ETB / ATB</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ETC/ATC</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ACTUAL DISCH/LOAD </th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>REMAINING DISC/LOAD </th>
                                <th class='name-ht'>-</th>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-xl-3 mb-4">
            <div class="card-body border-bottom-info shadow">
                <div class="table-responsive">
                    <table class="table table-sm text-center table-bordered table-align-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th colspan="4" class="text-center">QCC</th>
                            </tr>
                        </thead>
                        <!-- QCC 01 -->
                        <thead >
                            <tr>
                                <th rowspan="5" class="align-middle">QCC 01</th>
                                <th rowspan="2" class="align-middle">OPERATOR</td>
                                <td >ARIF BUDIMAN</td>
                                <th >08.00 - 16.00</th>
                            </tr>
                            <tr>
                                <td>RACHMAD HIDAYAT</td>
                                <th>08.00 - 16.00</th>
                            </tr>

                            <tr>
                                <th>SOA</th>
                                <td>HASAN</td>
                                <th rowspan="2">08.00 - 16.00</th>

                            </tr>

                            <tr>
                                <th>WOA</th>
                                <td>BAYU</td>
                            </tr>
                            <tr>
                                <th>TKBM / LASHER</th>
                                <td> - </td>
                                <th>08.00 - 16.00</th>

                            </tr>
                        </thead>

                        <!-- QCC 02 -->
                        <thead>
                            <tr>
                                <th rowspan="5" class="align-middle">QCC 02</th>
                                <th rowspan="2" class="align-middle">OPERATOR</td>
                                <td >ARIFIN</td>
                                <th >08.00 - 16.00</th>
                            </tr>
                            <tr>
                                <td>RACHMAD HIDAYAT</td>
                                <th>08.00 - 16.00</th>
                            </tr>

                            <tr>
                                <th>SOA</th>
                                <td>HASAN</td>
                                <th rowspan="2">08.00 - 16.00</th>

                            </tr>

                            <tr>
                                <th>WOA</th>
                                <td>JOKO</td>
                            </tr>
                            <tr>
                                <th>TKBM / LASHER</th>
                                <td> - </td>
                                <th>-</th>

                            </tr>
                        </thead>
                    </table>
                </div>  
            </div>
        </div>

        <!-- RTG / RMGC / RS / SL -->
        <div class="col-xl-3 mb-4">
            <div class="card-body shadow border-bottom-success">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered p table-align-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th colspan="4" class="text-center">RTG / RMGC / RS / SL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- RTG 05 -->
                            <tr>
                                <th rowspan="2">RTG 04</th>
                                <th>OPERATOR</th>
                                <td>BAIHAQI</td>
                                <th rowspan="15">08:00 - 16:00</th>
                            </tr>
                            <tr>
                                <th>YOA</th>
                                <td>-</td>
                            </tr>

                            <!-- RTG 05 -->
                            <tr>
                                <th rowspan="2">RTG 07</th>
                                <th>OPERATOR</th>
                                <td>HUTOMO</td>
                            </tr>
                            <tr>
                                <th>YOA</th>
                                <td>-</td>
                            </tr>

                            <!-- RTG 09 -->
                            <tr>
                                <th rowspan="2">RTG 07</th>
                                <th>OPERATOR</th>
                                <td>PURNA</td>
                            </tr>
                            <tr>
                                <th>YOA</th>
                                <td>-</td>
                            </tr>

                            <!-- RTG 09 -->
                            <tr>
                                <th rowspan="2">-</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>-</th>
                                <td>-</td>
                            </tr>

                            <!-- RTG 09 -->
                            <tr>
                                <th rowspan="2">-</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <!-- RTG - -->
                            <tr>
                                <th rowspan="2">-</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            
                            <!-- RTG -->
                            <tr>
                                <th rowspan="2">-</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <!-- RTG -->
                            <tr>
                                <th rowspan="1">-</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 mb-4">
            <div class="card-body border-bottom-warning shadow">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th colspan="3" class="head-truck">APPROVAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class='name-ht'>HT 41</th>
                                <td>-</td>
                                <td rowspan="15" class="jam-ht"></td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 42</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 43</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 44</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 45</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 46</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 47</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 48</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 49</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 50</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 51</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 52</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>-</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>-</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>-</th>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>
</div>

<!-- BERTH 02 -->
<div class="card mb-4">
    <div class="card-header bg-success text-center text-light py-2" style="height: 2rem;">
        <h6 class="m-0 font-weight-bold text-light">BERTH 02</h6>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card-body border-bottom-primary shadow">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-align-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th colspan="2" class="vesel-info">VESSEL INFO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class='name-ht'>SHIP TALKER</th>
                                <th class='name-ht'>HT 42</th>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="2" class="vesel-info-1">VESSEL 1(VESSEL TARGET)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class='name-ht'>VESSEL NAME</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>CLOSSING TIME</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ETB / ATB</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ETC/ATC</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ACTUAL DISCH/LOAD </th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>REMAINING DISC/LOAD </th>
                                <th class='name-ht'>-</th>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="2" class="vesel-1">VESSEL 1</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class='name-ht'>VESSEL NAME</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>CLOSSING TIME</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ETB / ATB</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ETC/ATC</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ACTUAL DISCH/LOAD </th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>REMAINING DISC/LOAD </th>
                                <th class='name-ht'>-</th>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-body shadow border-bottom-success">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered p table-align-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th colspan="4" class="qcc text-center">QCC</th>
                            </tr>
                        </thead>
                        <!-- QCC 01 -->
                        <thead>
                            <tr>
                                <th rowspan="5">QCC 01</th>
                                <th rowspan="2">OPERATOR</td>
                                <td >ARIF BUDIMAN</td>
                                <th >08.00 - 16.00</th>
                            </tr>
                            <tr>
                                <td>RACHMAD HIDAYAT</td>
                                <th>08.00 - 16.00</th>
                            </tr>

                            <tr>
                                <th>SOA</th>
                                <td>HASAN</td>
                                <th rowspan="2">08.00 - 16.00</th>

                            </tr>

                            <tr>
                                <th>WOA</th>
                                <td>BAYU</td>
                            </tr>
                            <tr>
                                <th>TKBM / LASHER</th>
                                <td> - </td>
                                <th>08.00 - 16.00</th>

                            </tr>
                        </thead>

                        <!-- QCC 02 -->
                        <thead>
                            <tr>
                                <th rowspan="5">QCC 02</th>
                                <th rowspan="2">OPERATOR</td>
                                <td >ARIFIN</td>
                                <th >08.00 - 16.00</th>
                            </tr>
                            <tr>
                                <td>RACHMAD HIDAYAT</td>
                                <th>08.00 - 16.00</th>
                            </tr>

                            <tr>
                                <th>SOA</th>
                                <td>HASAN</td>
                                <th rowspan="2">08.00 - 16.00</th>

                            </tr>

                            <tr>
                                <th>WOA</th>
                                <td>JOKO</td>
                            </tr>
                            <tr>
                                <th>TKBM / LASHER</th>
                                <td> - </td>
                                <th>-</th>

                            </tr>
                        </thead>
                    </table>
                </div>  
            </div>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-body border-bottom-info shadow">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-align-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th colspan="4" class="rtg">RTG / RMGC / RS / SL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- RTG 05 -->
                            <tr>
                                <th rowspan="2">RTG 04</th>
                                <th>OPERATOR</th>
                                <td>BAIHAQI</td>
                                <th rowspan="15">08:00 - 16:00</th>
                            </tr>
                            <tr>
                                <th>YOA</th>
                                <td>-</td>
                            </tr>

                            <!-- RTG 05 -->
                            <tr>
                                <th rowspan="2">RTG 07</th>
                                <th>OPERATOR</th>
                                <td>HUTOMO</td>
                            </tr>
                            <tr>
                                <th>YOA</th>
                                <td>-</td>
                            </tr>

                            <!-- RTG 09 -->
                            <tr>
                                <th rowspan="2">RTG 07</th>
                                <th>OPERATOR</th>
                                <td>PURNA</td>
                            </tr>
                            <tr>
                                <th>YOA</th>
                                <td>-</td>
                            </tr>

                            <!-- RTG 09 -->
                            <tr>
                                <th rowspan="2">-</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>-</th>
                                <td>-</td>
                            </tr>

                            <!-- RTG 09 -->
                            <tr>
                                <th rowspan="2">-</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <!-- RTG - -->
                            <tr>
                                <th rowspan="2">-</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            
                            <!-- RTG -->
                            <tr>
                                <th rowspan="2">-</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <!-- RTG -->
                            <tr>
                                <th rowspan="1">-</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-body border-bottom-warning shadow">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th colspan="3" class="head-truck">APPROVAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class='name-ht'>HT 41</th>
                                <td>-</td>
                                <td rowspan="12" class="jam-ht"></td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 42</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 43</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 44</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 45</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 46</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 47</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 48</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 49</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 50</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 51</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 52</th>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>
</div>

<!-- BERTH 03 -->
<div class="card mb-4">
    <div class="card-header bg-primary text-center text-light py-2" style="height: 2rem;">
        <h6 class="m-0 font-weight-bold text-light">BERTH 03</h6>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card-body border-bottom-primary shadow">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-align-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th colspan="2" class="vesel-info">VESSEL INFO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class='name-ht'>SHIP TALKER</th>
                                <th class='name-ht'>HT 42</th>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="2" class="vesel-info-1">VESSEL 1(VESSEL TARGET)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class='name-ht'>VESSEL NAME</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>CLOSSING TIME</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ETB / ATB</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ETC/ATC</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ACTUAL DISCH/LOAD </th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>REMAINING DISC/LOAD </th>
                                <th class='name-ht'>-</th>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="2" class="vesel-1">VESSEL 1</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class='name-ht'>VESSEL NAME</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>CLOSSING TIME</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ETB / ATB</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ETC/ATC</th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>ACTUAL DISCH/LOAD </th>
                                <th class='name-ht'>-</th>
                            </tr>
                            <tr>
                                <th class='name-ht'>REMAINING DISC/LOAD </th>
                                <th class='name-ht'>-</th>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-body shadow border-bottom-success">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered p table-align-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th colspan="4" class="qcc text-center">QCC</th>
                            </tr>
                        </thead>
                        <!-- QCC 01 -->
                        <thead>
                            <tr>
                                <th rowspan="5">QCC 01</th>
                                <th rowspan="2">OPERATOR</td>
                                <td >ARIF BUDIMAN</td>
                                <th >08.00 - 16.00</th>
                            </tr>
                            <tr>
                                <td>RACHMAD HIDAYAT</td>
                                <th>08.00 - 16.00</th>
                            </tr>

                            <tr>
                                <th>SOA</th>
                                <td>HASAN</td>
                                <th rowspan="2">08.00 - 16.00</th>

                            </tr>

                            <tr>
                                <th>WOA</th>
                                <td>BAYU</td>
                            </tr>
                            <tr>
                                <th>TKBM / LASHER</th>
                                <td> - </td>
                                <th>08.00 - 16.00</th>

                            </tr>
                        </thead>

                        <!-- QCC 02 -->
                        <thead>
                            <tr>
                                <th rowspan="5">QCC 02</th>
                                <th rowspan="2">OPERATOR</td>
                                <td >ARIFIN</td>
                                <th >08.00 - 16.00</th>
                            </tr>
                            <tr>
                                <td>RACHMAD HIDAYAT</td>
                                <th>08.00 - 16.00</th>
                            </tr>

                            <tr>
                                <th>SOA</th>
                                <td>HASAN</td>
                                <th rowspan="2">08.00 - 16.00</th>

                            </tr>

                            <tr>
                                <th>WOA</th>
                                <td>JOKO</td>
                            </tr>
                            <tr>
                                <th>TKBM / LASHER</th>
                                <td> - </td>
                                <th>-</th>

                            </tr>
                        </thead>
                    </table>
                </div>  
            </div>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-body border-bottom-info shadow">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-align-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th colspan="4" class="rtg">RTG / RMGC / RS / SL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- RTG 05 -->
                            <tr>
                                <th rowspan="2">RTG 04</th>
                                <th>OPERATOR</th>
                                <td>BAIHAQI</td>
                                <th rowspan="15">08:00 - 16:00</th>
                            </tr>
                            <tr>
                                <th>YOA</th>
                                <td>-</td>
                            </tr>

                            <!-- RTG 05 -->
                            <tr>
                                <th rowspan="2">RTG 07</th>
                                <th>OPERATOR</th>
                                <td>HUTOMO</td>
                            </tr>
                            <tr>
                                <th>YOA</th>
                                <td>-</td>
                            </tr>

                            <!-- RTG 09 -->
                            <tr>
                                <th rowspan="2">RTG 07</th>
                                <th>OPERATOR</th>
                                <td>PURNA</td>
                            </tr>
                            <tr>
                                <th>YOA</th>
                                <td>-</td>
                            </tr>

                            <!-- RTG 09 -->
                            <tr>
                                <th rowspan="2">-</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>-</th>
                                <td>-</td>
                            </tr>

                            <!-- RTG 09 -->
                            <tr>
                                <th rowspan="2">-</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <!-- RTG - -->
                            <tr>
                                <th rowspan="2">-</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            
                            <!-- RTG -->
                            <tr>
                                <th rowspan="2">-</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                            <!-- RTG -->
                            <tr>
                                <th rowspan="1">-</th>
                                <th>-</th>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-body border-bottom-warning shadow">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th colspan="3" class="head-truck">APPROVAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class='name-ht'>HT 41</th>
                                <td>-</td>
                                <td rowspan="12" class="jam-ht"></td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 42</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 43</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 44</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 45</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 46</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 47</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 48</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 49</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 50</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 51</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th class='name-ht'>HT 52</th>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>
</div>

<!-- YARD OPERATION -->
<div class="card mb-4">
    <div class="card-header bg-success bg-gradient text-center text-light py-2" style="height: 2rem;">
        <h6 class="m-0 font-weight-bold text-light">YARD OPERATION</h6>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="header-table" rowspan="2">YARD TALKER</th>
                        <td colspan="1">DANI</td>
                    </tr>
                    <tr>
                        <td>-</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-xl-3">
            <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="header-table" rowspan="2">REEFER MAN</th>
                        <td>DANI</td>

                    </tr>
                    <tr>
                        <td>-</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-xl-3">
            <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="header-table">BILLING SUPPORT</th>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th class="header-table">EQUIPMENT SUPPORT</th>
                        <td>-</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-xl-3">
            <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="header-table">RADIO OFFICER</th>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th class="header-table">IT SUPPORT</th>
                        <td>YUSUF / RIDWAN</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                <thead>
                    <tr class="bg-light">
                        <th>RTG / RMGC/RS</th>
                        <th>OPERATOR</td>
                        <th>YOA</td>
                        <th>TIME</td>
                        <th>REMARK</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>RTG 01</td>
                        <td>SULASONO</td>
                        <td>-</td>
                        <td>08:00-16:00</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-xl-6">
            <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                <thead>
                    <tr class="bg-light">
                        <th>STANDBY EQUIPMENT</th>
                        <th>REASON</td>
                        <th>STATUS</td>
                        <th>REMARK</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- GATE OPERATION -->
<div class="card mb-4">
    <div class="card-header bg-danger bg-gradient text-center text-light py-2" style="height: 2rem;">
        <h6 class="m-0 font-weight-bold text-light">GATE OPERATION</h6>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="bg-light" rowspan="3">GATE IN OFFICER</th>
                        <td>DANI</td>
                    </tr>
                    <tr>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>-</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-xl-4">
            <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="bg-light" rowspan="3">GATE OUT OFFICER</th>
                        <td>DANI</td>
                    </tr>
                    <tr>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>-</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-xl-4">
            <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="bg-light" rowspan="2">GATE INSPECTOR</th>
                        <td>NORMAN</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>-</td>
                    </tr>
                </tbody>

                <thead>
                    <tr>
                        <th class="header-table" rowspan="1">POST GATE OFFICER</th>
                        <td>DWI ASRA</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- LEAVE & STANDBY PERSONIL -->
<div class="card mb-4">
    <div class="card-header bg-info bg-gradient text-center text-light py-2" style="height: 2rem;">
        <h6 class="m-0 font-weight-bold text-light">LEAVE & STANDBY PERSONIL</h6>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th colspan="5">EMPLOYEES PLAN TO PERMIT/LEAVE</th>
                    </tr>
                </thead>
                <thead>
                    <tr class="header-table">
                        <th>NAME</th>
                        <th>POSITION</td>
                        <th>START</td>
                        <th>END</td>
                        <th>REMARK</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>M. IIN SAMPURNO</td>
                        <td>SHIIP PLANNER</td>
                        <td>5/7/2023</td>
                        <td>06/07/202</td>
                        <td>CUTI TAHUNAN</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-xl-6">
            <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th colspan="4">STANDBY EMPLOYEES</th>
                    </tr>
                </thead>
                <thead>
                    <tr class="header-table">
                        <th>NAME</th>
                        <th>POSITION</td>
                        <th>NOTE</td>
                        <th>CONTACT</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- KETIDAKSIAPAN ALAT -->
<div class="card mb-4">
    <div class="card-header bg-warning bg-gradient text-center text-light py-2" style="height: 2rem;">
        <h6 class="m-0 font-weight-bold text-light">KETIDAKSIAPAN ALAT</h6>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th colspan="5">EQUIPMENT READINESS</th>
                    </tr>
                </thead>
                <thead>
                    <tr class="header-table">
                        <th>EQUIPMENT</th>
                        <th>STATUS</td>
                        <th>START</td>
                        <th>END</td>
                        <th>KERUSAKAN</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-xl-6">
            <table class="table table-sm table-bordered text-center table-align-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th colspan="3">EQUIPORT / BIMA / JPPI / PMP SUPPORT</th>
                    </tr>
                </thead>
                <thead>
                    <tr class="header-table">
                        <th>ENGINEER</th>
                        <th>POSITION</td>
                        <th>REMARK</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection