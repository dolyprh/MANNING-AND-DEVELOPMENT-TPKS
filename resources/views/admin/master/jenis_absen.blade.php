@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Group</h1>
    </div>

    <div class="card p-6 col-xl-6 mb-4 p-4">
        <form action="/jenis-absen" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="nama" class="form-label">Nama Jenis Absen</label>
                <input type="text" class="form-control" name="nama" id="nama">
            </div>
            <div class="mb-2">
                <label for="jenis_absen" class="form-label">Kode</label>
                <input type="text" class="form-control" name="jenis_absen" id="jenis_absen" >
            </div>
            
            <button type="submit" class="btn btn-small btn-primary tombol-aksi float-right">Tambah</button>
        </form>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jenis Absen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive table-center text-dark">
                <table class="table table-bordered table-align-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Absen</th>
                            <th>Kode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($absen as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kode }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm bg-warning text-white" data-toggle="modal" data-target="#editGroup">
                                        <i class="fas fa-edit fa-primary"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target='#deleteAbsen{{ $item->id }}'>
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

    @include('admin.modal.m_absen_delete')
    @include('sweetalert::alert')
@endsection