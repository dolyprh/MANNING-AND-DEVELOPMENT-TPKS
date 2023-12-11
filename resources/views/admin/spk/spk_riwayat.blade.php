@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat SPK</h1>
    </div>

    <div class="card border-left-dark mb-4">
        <div class="card-body">
            <div class="table-responsive card-left-dark text-dark">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-secondary text-dark text-center">
                        <tr>
                            <th class="col-sm-2">NO SPK</th>
                            <th class="col-sm-2">Nama Shift</th>
                            <th class="col-sm-2">Nama Group</th>
                            <th class="col-sm-2">Tanggal Dibuat</th>
                            <th class="col-sm-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="table-body-spk" class="text-center">
                        @foreach ($tspk_header as $item)
                        <tr>
                            <td>{{ $item->spk_no }}</td>
                            <td>{{ $item->nama_shift }}</td>
                            <td>{{ $item->nama_group }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_date)->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <a href="riwayat-spk/update/{{ $item->id_h }}/{{ $item->spk_no }}" class="text-bold">
                                    <button type="button" class="btn btn-sm btn-outline-primary">Revisi</i></button>
                                </a>
                                @if($item->status == '')
                                    <button type="button" class="btn btn-sm btn-secondary btn-lg" disabled>Menunggu Approval</button>
                                @else
                                <a href="spk-download/{{ $item->id_h }}/{{ $item->spk_no }}" target="_blank" class="text-bold">
                                    <button type="button" class="btn btn-sm btn-success"><i class="fa fa-download" aria-hidden="true"></i></button>
                                </a>
                                @endif
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