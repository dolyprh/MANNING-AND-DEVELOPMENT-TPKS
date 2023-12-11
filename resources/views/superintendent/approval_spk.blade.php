@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Approval Surat Perintah Kerja</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data SPK</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive text-dark">
                <table class="table table-bordered stripe" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-dark text-center">
                        <tr>
                            <th class="col-sm-3">NO SPK</th>
                            <th class="col-sm-2">Nama Shift</th>
                            <th class="col-sm-2">Nama Group</th>
                            <th class="col-sm-2">Tanggal Dibuat</th>
                            <th class="col-sm-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tspk_header as $item)
                        <tr>
                            <td>{{ $item->spk_no }}</td>
                            <td>{{ $item->nama_shift }}</td>
                            <td>{{ $item->nama_group }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_date)->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <a href="spk-view/{{ $item->id_h }}/{{ $item->spk_no }}" target="_blank" class="text-bold">
                                    <button type="button" class="btn btn-sm btn-outline-success">View</button>
                                </a>
                                @if($item->status == 3)

                                @else
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target='#updateTspk{{ $item->id_h }}'>
                                    Approve <i class="fa fa-check" aria-hidden="true"></i> 
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('superintendent.modal.approve_tspk')
    @include('sweetalert::alert')

@endsection