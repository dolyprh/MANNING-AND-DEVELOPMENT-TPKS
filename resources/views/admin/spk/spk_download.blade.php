<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .container {
            text-align: center;
        }

        .header-title {
            padding: 4px 0;
            font-size: 8px;
            font-weight: bold;
            color:#000;
            text-align:center;
        }

        .card-berth-01 {
            margin-top: 60px;
        }
        .card-berth-02 {
            margin-top: 220px;
        }

        .card-yard-operation{
            margin-top:230px;
        }

        .card-gate-operation{
            margin-top:10px;
        }

        .card-leave-standby{
            margin-top:40px;
        }
        .card-ketidaksiapan-alat{
            margin-top:20px;
        }

        .card-header {
            background-color: #c8f6c8;
            text-align: center;
            margin-right: -10px;
            margin-left: -10px;
        }

        .card-header-berth1{
            background-color: #c8f6c8;
            text-align: center;
            margin-right: -10px;
            margin-left: -10px;
        }

        .table {
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
            border: 1px solid #000;
            width: 100%;
        }

        th,
        td {
            padding: 0.15rem;
            vertical-align: top;
            font-size: 6px;
            text-align: center;
            border: 1px solid #000;
        }

        .head-truck{
            background-color: #90ee90;
        }

        .name-ht{
            background: none;
            border: 1px solid #000;
        }

        .jam-ht{
            border: 1px solid #000;

        }

        .qcc {
            background-color: #ff9900;
        }
        .rtg {
            background-color: #ffeda6;
        }
        .vesel-info {
            background-color: #87CEFA;
        }
        .vesel-info-1{
            background-color: #ff5959;
        }
        .vesel-1{
            background-color: #ffd426;
        }

        .header-table{
            background-color: #87CEFA;
        }

        .flex-container {
            justify-content: space-between;
            width:100%;
            margin-right: -10px;
            margin-left: -10px;

        }

        .content-container{
            justify-content: space-between;
            width:100%;
            margin-top:-20px;
            margin-right: -10px;
            margin-left: -10px;
        }

        .flex-item{
            max-width: 100%;
            min-width: 25%;
            float: left;
            margin-left: 4px ;
        }

        .content-item{
            max-width: 100%;
            min-width: 51%;
            float: left;
            margin-left: 4px ;
        }
        .gate-item{
            max-width: 100%;
            min-width: 33.5%;
            float: left;
            margin-left: 4px ;
        }

    </style>
</head>

<body>
    @foreach($group_shift as $item)
        <div class="container">
            <h6> {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->format('l - d F Y') }} {{ $item->waktu_mulai }} - {{ $item->waktu_selesai }} <br>
                <u>MANNING & DEPLOYMENT TERMINAL PETIKEMAS SEMARANG</u> <br>
                {{ $item->nama_group }} - SHIFT {{ $item->no_shift }}
            </h6>
        </div>
    @endforeach

    <!-- P&C ON DUTY -->
    <div class="card-duty">
        <div class="card-header">
            <h5 class="header-title">P&C ON DUTY</h5>
        </div>
        <div class="flex-container">
            <div class="flex-item">
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="header-table">ASMAN OPERASI</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th class="header-table">DUTY OPERASI</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th class="header-table">SUPERVISI GRUP</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th class="header-table">DUTY PLANNER</th>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex-item">
                <table class="table">
                    <thead>
                        <tr>
                            <th rowspan="2" class="header-table">SHIP PLANNER</th>
                            
                            <td colspan="1">
                                @foreach($ship_planner as $item)
                                    {{ $item->nama }}
                                @endforeach  
                            </td>
                                                  
                        </tr>
                        <tr>
                            <td>-</td>
                        </tr>

                        <tr>
                            <th rowspan="2" class="header-table">YARD PLANNER</th>
                            @foreach($group_shift as $item)
                            <td colspan="1">{{ $item->nama }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>-</td>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="flex-item">
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="header-table">BERTH ALLOCATION (BA)</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th class="header-table">MANNING & DEPLOYMENT</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th class="header-table">REPORTING</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th class="header-table">HSSE OFFICER</th>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex-item">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="header-table">APPROVAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>MANAGER PERENCANAAN OPERASI</strong><br><br>
                                <span>{{ Auth::user()->name }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- BERTH 01 -->
    <div class="card-berth-01">
        <div class="card-header">
            <h5 class="header-title">BERTH 01</h5>
        </div>

        <div class="flex-container">
            <div class="flex-item">
                <table class="table">
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

            <div class="flex-item">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="4" class="qcc">QCC</th>
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

                    <!-- QCC 03 -->
                    <thead>
                        <tr>
                            <th rowspan="5">-</th>
                            <th rowspan="2">-</td>
                            <td >-</td>
                            <th >-</th>
                        </tr>
                        <tr>
                            <td>- -</td>
                            <th>-</th>
                        </tr>

                        <tr>
                            <th>-</th>
                            <td>-</td>
                            <th rowspan="2">-</th>

                        </tr>

                        <tr>
                            <th>-</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>-</th>
                            <td> -</td>
                            <th>-</th>

                        </tr>
                    </thead>
                </table>
            </div>

            <div class="flex-item">
                <table class="table">
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

            <div class="flex-item">
                <table class="table">
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

    <!-- BERTH 02 -->
    <div class="card-berth-02">
        <div class="card-header">
            <h5 class="header-title">BERTH 02</h5>
        </div>

        <div class="flex-container">
            <div class="flex-item">
                <table class="table">
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

            <div class="flex-item">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="4" class="qcc">QCC</th>
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

                    <!-- QCC 03 -->
                    <thead>
                        <tr>
                            <th rowspan="5">-</th>
                            <th rowspan="2">-</td>
                            <td >-</td>
                            <th >-</th>
                        </tr>
                        <tr>
                            <td>- -</td>
                            <th>-</th>
                        </tr>

                        <tr>
                            <th>-</th>
                            <td>-</td>
                            <th rowspan="2">-</th>

                        </tr>

                        <tr>
                            <th>-</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>-</th>
                            <td> -</td>
                            <th>-</th>

                        </tr>
                    </thead>
                </table>
            </div>

            <div class="flex-item">
                <table class="table">
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

            <div class="flex-item">
                <table class="table">
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

    <!-- BERTH 03 -->
    <div class="card-berth-02">
        <div class="card-header">
            <h5 class="header-title">BERTH 03</h5>
        </div>

        <div class="flex-container">
            <div class="flex-item">
                <table class="table">
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

            <div class="flex-item">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="4" class="qcc">QCC</th>
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

                    <!-- QCC 03 -->
                    <thead>
                        <tr>
                            <th rowspan="5">-</th>
                            <th rowspan="2">-</td>
                            <td >-</td>
                            <th >-</th>
                        </tr>
                        <tr>
                            <td>- -</td>
                            <th>-</th>
                        </tr>

                        <tr>
                            <th>-</th>
                            <td>-</td>
                            <th rowspan="2">-</th>

                        </tr>

                        <tr>
                            <th>-</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>-</th>
                            <td> -</td>
                            <th>-</th>

                        </tr>
                    </thead>
                </table>
            </div>

            <div class="flex-item">
                <table class="table">
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

            <div class="flex-item">
                <table class="table">
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

    <div></div>
    <!-- YARD OPERATION -->
    <div class="card-yard-operation">
        <div class="card-header">
            <h5 class="header-title">YARD OPERATION</h5>
        </div>
        <div class="flex-container">
            <div class="flex-item">
                <table class="table">
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
            <div class="flex-item">
                <table class="table">
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
            <div class="flex-item">
                <table class="table">
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
            <div class="flex-item">
                <table class="table">
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
        <br><br><br>

        <div class="content-container">
            <div class="content-item">
                <table class="table">
                    <thead>
                        <tr class="header-table">
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

            <div class="content-item">
                <table class="table">
                    <thead>
                        <tr class="header-table">
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
    <div class="card-gate-operation">
        <div class="card-header">
            <h5 class="header-title">GATE OPERATION</h5>
        </div>
        <div class="flex-container">
            <div class="gate-item">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="header-table" rowspan="3">GATE IN OFFICER</th>
                            <td>DANI</td>
                        </tr>
                        <tr>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>-</td>
                        </tr>
                    </thead>
                    <!-- <thead>
                        <tr>
                            <td rowspan="3">DANI</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    </thead> -->
                </table>
            </div>
            <div class="gate-item">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="header-table" rowspan="3">GATE OUT OFFICER</th>
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
            <div class="gate-item">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="header-table" rowspan="2">GATE INSPECTOR</th>
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
    <div class="card-leave-standby">
        <div class="card-header">
            <h5 class="header-title">LEAVE & STANDBY PERSONIL</h5>
        </div><br>
        <div class="content-container">
            <div class="content-item">
                <table class="table">
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

            <div class="content-item">
                <table class="table">
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
    <div class="card-ketidaksiapan-alat">
        <div class="card-header">
            <h5 class="header-title">KETIDAKSIAPAN ALAT</h5>
        </div><br>
        <div class="content-container">
            <div class="content-item">
                <table class="table">
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

            <div class="content-item">
                <table class="table">
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

    <!-- TOTAL EMPLOYE ON DUTY -->
    <br><br>
    <div class="card-ketidaksiapan-alat">
        <div class="content-container">
            <div class="content-item">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="header-table">TOTAL EMPLOYEE ON DUTY</th>
                            <td>-</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>

</html>