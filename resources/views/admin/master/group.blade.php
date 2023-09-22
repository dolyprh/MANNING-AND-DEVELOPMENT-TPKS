@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Group</h1>
    </div>

    <div class="card p-6 col-xl-6 mb-4 p-4">
        <form action="/alat" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="nama_group" class="form-label">Nama Group</label>
                <input type="text" class="form-control" name="nama_group" id="nama_group" placeholder="kode alat">
            </div>
            <div class="mb-2">
                <label for="nama_alat" class="form-label">Nama Alat</label>
                <input type="text" class="form-control" name="nama_alat" id="nama_alat" placeholder="nama alat">
            </div>
            <div class="mb-2">
                <label for="jenis_alat" class="form-label">Jenis</label>
                <input type="text" class="form-control" name="jenis_alat" id="jenis_alat" placeholder="jenis alat">
            </div>
            <div class="mb-2">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="keterangan">
            </div>
            <button type="submit" class="btn btn-small btn-primary tombol-aksi float-right">Tambah</button>
        </form>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Group</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive table-center text-dark">
                <table class="table table-bordered table-align-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Group</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>SDM</td>
                                <td>Sumber Daya Manusia</td>
                                <td class="text-center">
                                    <button class="btn btn-sm bg-warning text-white" data-toggle="modal" data-target="#editGroup">
                                        <i class="fas fa-edit fa-primary"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target='#deleteGroup'>
                                        <i class="fas fa-trash fa-danger"></i> 
                                    </button>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
@endsection