@extends('layouts.main')
@section('content')
<div class="card mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Data Dermaga</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive text-dark">
            <table class="table table-bordered stripe" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode Dermaga</th>
                        <th>Nama Dermaga</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dermaga as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->kode_dermaga }}</td>
                            <td>{{ $item->nama_dermaga}}</td>
                            <td>{{ $item->keterangan}}</td>
                            <td class="text-center">
                                <a href="{{ url('/dermaga/'.$item->id.'/edit') }}" class="btn btn-sm bg-warning text-white">
                                    <i class="fas fa-edit fa-primary"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target='#deleteDermaga{{ $item->id }}'>
                                    <i class="fas fa-trash fa-danger"></i> 
                                </button>
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