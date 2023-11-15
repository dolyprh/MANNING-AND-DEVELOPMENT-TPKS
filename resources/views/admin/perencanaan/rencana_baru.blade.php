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
                                ( {{ date('d/m/Y H-i-s', strtotime ($item->rcn_sandar)) }} - {{ date('d/m/Y H-i-s', strtotime ($item->rcn_berangkat)) }} )
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
            <div class="table-responsive">
                <table class="table table-bordered table-align-center" width="100%" cellspacing="0">
                    <thead class="table-secondary text-dark text-center">
                        <tr>
                            <th class="col-sm-2">Kapal</th>
                            <th >Voyage</th>
                            <th >Kode</th>
                            <th class="col-sm-2">Rencana Sandar</th>
                            <th class="col-sm-2">Rencana Kerja</th>
                            <th class="col-sm-2">NO-RCN</th>
                            <th >Aksi</th>
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
                                    {{$item->rcn_no}}
                            </td>
                            <td class="text-center">
                                <a href="/rencana-baru/update/{{ $item->rcn_no }}" class="btn btn-sm bg-primary text-white">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="/rencana-kapal/{{ $item->rcn_no }}/1" class="btn btn-sm bg-info text-white">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection
    @include('sweetalert::alert')
