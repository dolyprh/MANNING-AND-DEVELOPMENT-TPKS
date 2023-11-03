@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark-800">Buat SPK</h1>
    </div>

    <div class="card border-left-secondary p-6 mb-4 p-4">
        <form action="/spk-baru" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="">
                <div class="md-form md-outline input-with-post-icon datepicker">

                    <label for="jadwal_tanggal" class="form-label">Tanggal</label>
                    <input placeholder="Select date" value="{{ $old_date ?? '' }}" type="date" onchange="this.form.submit()" name="tanggal_spk" id="spk" class="form-control form-control">
                    @error('tanggal_spk')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        </form>
    </div>

    <div class="card border-left-dark mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-dark">Tabel SPK</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-align-center" width="100%" cellspacing="0">
                    <thead class="table-secondary text-center text-dark">
                        <tr>
                            <th class="col-sm-2">Kapal</th>
                            <th >Voyage</th>
                            <th >Kode</th>
                            <th class="col-sm-2">Rencana Sandar</th>
                            <th class="col-sm-2">Rencana Kerja</th>
                            <th class="col-sm-2">NO-RCN</th>
                        </tr>
                    </thead>
                    <tbody id="table-body-spk">
                        @foreach ($spk as $item)
                        <tr>
                            <td> <b>{{$item->nama_kapal}} </b> <br/> {{$item->pelayaran}} </td>
                            <td> in {{$item->in_voyage}} <br/> out {{$item->out_voyage}}</td>
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
        <div class="card-body">
            <div class="table-responsive card-left-dark text-dark">
                <table class="table table-bordered table-align-center" width="100%" cellspacing="0">
                    <thead class="table-secondary text-dark text-center">
                        <tr>
                            <th class="col-sm-3">Shift</th>
                            <th class="col-sm-3">Group</th>
                            <th class="col-sm-3">SPK</th>
                        </tr>
                    </thead>
                    <tbody id="table-body-spk">
                        @foreach ($shift as $item)
                        <tr>
                            <td>{{ $item->nama_shift }}</td>
                            <td>{{ $item->nama_group }}</td>
                            <td class="text-center">
                            <a href="/spk-baru/{{ $item->id }}">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <input type="text" name="kode_group" value="{{$item->kode}}" hidden> 
                                </form>
                                <button class="btn btn-sm btn-primary">
                                    <i class="fa fa-plus mr-2" aria-hidden="true"></i> Buat SPK 
                                </button>
                            </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#spk').on('change', function() {
                var tanggal = $(this).val();

                // Mengirim permintaan AJAX
                $.ajax({
                    type: "POST",
                    url: '/spk-baru',
                    data: {tanggal: tanggal},
                    success: function(data) {
                        // Mengosongkan tabel sebelum menambahkan data baru
                        var tableBody = $('#table-body-spk');
                        tableBody.empty();

                        $.each(data, function(index, item) {
                            var row = '<tr>' +
                                '<td><b>' + item.nama_kapal + '</b><br>' + item.pelayaran + '</td>' +
                                '<td>in ' + item.in_voyage + '<br>out ' + item.out_voyage + '</td>' +
                                '<td>' + item.kd_awal + ' - ' + item.kd_akhir + '</td>' +
                                '<td>Dari: ' + item.rcn_sandar + '<br>sampai: ' + item.rcn_berangkat + '</td>' +
                                '<td>Dari: ' + item.rcn_awal_kerja + '<br>sampai: ' + item.rcn_akhir_kerja + '</td>' +
                                '<td class="text-center">' + item.rcn_no + '</td>' +
                                '</tr>';
                            tableBody.append(row);
                        });
                    }
                });
            });
        });
    </script> -->


@endsection