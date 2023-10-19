@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="h3 mb-0 text-gray-800">Perencanaan Operasi</h4>
    </div>
    <div class="card border-left-secondary p-6 mb-4 p-4">
        <form action="/rencana-baru" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="mb-2">
                <label for="valey" class="form-label">Input Vassel </label>
                <select class="form-control form-multi-select" aria-label="Default select example" name="valey" id="valey">
                    <option selected>Pilih Vassel</option>
                    @foreach ($rencana_kapal as $item)
                        <option value="{{ $item->ves_id}} ">{{ $item->ves_name }}
                                ( {{ $item->in_voyage}} - {{ $item->out_voyage}} )
                                ( {{ date('d/m/Y H-i-s', strtotime ($item->rcn_awal_kerja)) }} - {{ date('d/m/Y H-i-s', strtotime ($item->rcn_akhir_kerja)) }} )
                        </option>
                    @endforeach
                </select>
                @error('valey')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
            <button  type="submit" class="btn btn-success tombol-aksi float-left">Selanjutnya</button>
        </form>
    </div>

    <div class="card border-left-dark mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-dark">Data Rencana Baru</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive text-dark">
                <table class="table table-bordered table-align-center" width="100%" cellspacing="0">
                    <thead class="table-dark text-center">
                        <tr>
                            <th >Kapal</th>
                            <th class="col-2">Voyage</th>
                            <th class="col-sm-2">Kode</th>
                            <th class="col-sm-2">Rencana Sandar</th>
                            <th class="col-sm-2">Rencana Kerja</th>
                            <th class="col-sm-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rencana as $item)
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
                                    {{$item->rcn_no}} <br/>
                                    <a href="/rencana-baru/update/{{ $item->rcn_no }}" class="btn btn-sm bg-primary text-white">
                                        edit
                                    </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
