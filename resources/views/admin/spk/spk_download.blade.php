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
            align-items: center;
            text-align: center;
            justify-content: space-between;
        }
        .header-title {
            padding: 4px 0;
            font-size: 10px;
            font-weight: bold;
            color:#000;

        }
        /* .card {
            margin-bottom: 20px;
        } */
        .card-berth-01 {
            margin-top: 50px;
        }
        .card-berth-02 {
            margin-top: 220px;
        }
        .card-header {
            background-color: #c8f6c8;
            text-align: center;
            color: #fff;
        }
        .card-header-berth1{
            background-color: #c8f6c8;
            text-align: center;
            color: #000;
            margin-right: -10px;
            margin-left: -10px;
        }

        .card-header-berth2{
            background-color: #c8f6c8;
            text-align: center;
            color: #000;
            margin-right: -10px;
            margin-left: -10px;
        }
        .card-header-berth3{
            background-color: #c8f6c8;
            text-align: center;
            color: #000;
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
            border-top: 1px solid #000;
        }

        th {
            /* background-color: #87CEFA; */
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

        .flex-container {
            justify-content: space-between;
            width:100%;
            margin-right: -10px;
            margin-left: -10px;

        }

        .flex-item{
            max-width: 100%;
            min-width: 25%;
            float: left;
            margin-left: 4px ;
        }
    </style>
</head>

<body>
    @foreach($group_shift as $item)
    <div class="container">
        <h5 > {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->format('l - d F Y') }} {{ $item->waktu_mulai }} - {{ $item->waktu_selesai }} <br>
            <u>MANNING & DEPLOYMENT TERMINAL PETIKEMAS NILAM</u> <br>
            {{ $item->nama_group }} - SHIFT {{ $item->no_shift }}
        </h5>
    </div>
    @endforeach
    <div class="card">
        <div class="card-header">
            <h5 class="header-title">P&C ON DUTY</h5>
        </div>
        <div class="flex-container">
            <div class="flex-item">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ASMAN OPERASI</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>DUTY OPERASI</th>
                            <td>ARDIKA. P</td>
                        </tr>
                        <tr>
                            <th>SUPERVISI GRUP</th>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>DUTY PLANNER</th>
                            <td>ARDIKA. P</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex-item">
                <table class="table">
                    <thead>
                        <tr>
                            <th rowspan="2">SHIP PLANNER</th>
                            <td colspan="1">KRISHNA</td>
                        </tr>
                        <tr>
                            <td>-</td>
                        </tr>

                        <tr>
                            <th rowspan="2">YARD PLANNER</th>
                            <td colspan="1">ARDIKA. P</td>
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
                            <th>BERTH ALLOCATION (BA)</th>
                            <td>BALYA EL ANAM</td>
                        </tr>
                        <tr>
                            <th>MANNING & DEPLOYMENT</th>
                            <td>ARDIKA. P</td>
                        </tr>
                        <tr>
                            <th>REPORTING</th>
                            <td>DIKA</td>
                        </tr>
                        <tr>
                            <th>HSSE OFFICER</th>
                            <td>PIPIT</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex-item">
                <table class="table">
                    <thead>
                        <tr>
                            <th>APPROVAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>MANAGER PERENCANAAN OPERASI</strong><br><br>
                                <span>LASIARA</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card-berth-01">
        <div class="card-header-berth1">
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

    <div class="card-berth-02">
        <div class="card-header-berth2">
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

    <div class="card-berth-02">
        <div class="card-header-berth3">
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
</body>

</html>