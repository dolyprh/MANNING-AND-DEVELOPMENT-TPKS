@extends('layouts.main')
@section('content')

        <div class="card px-4 ml-5 mb-4 col-5" id="myAlat">
            <div class="card-header mb-4">
                <h6 class="text-dark">Detail Alat</h6>
            </div>
            <table class="table table-bordered detail-table">
                <thead class="table-secondary text-center text-dark">
                    <tr>
                        <th>No</th>
                        <th>Alat</th>
                        <th>Kode alat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_alat as $alat)
                    <tr>
                        <td>{{ $alat->detail_id }}</td>
                        <td>{{$alat->nama_alat}}</td>
                        <td>{{$alat->kd_alat}}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target='#deleteRcnAlat{{ $alat->seq_id }}' >
                                <i class="fas fa-window-close"></i> 
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
@include('admin.modal.m_rcnalat_delete')
@include('sweetalert::alert')
