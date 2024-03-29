@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pegawai Mitra</h1>
    </div>

    <div class="card p-6 col-xl-6 mb-4 p-4">
        <form action="/pegawai-mitra" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="kode_alat" class="form-label">Kode Alat</label>
                <input type="text" class="form-control" name="kode_alat" id="kode_alat" placeholder="kode alat">
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
            <button type="submit" class="btn btn-sm mt-3 btn-success tombol-aksi float-left">Tambah</button>
        </form>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive table-center text-dark">
                <table class="table table-bordered table-align-center" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th>Kode</th>
                            <th>Keterangan</th>
                            <th>Nilai 1</th>
                            <th>Nilai 2</th>
                            <th>Nilai 3</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SDM262</td>
                            <td>Non organik</td>
                            <td>A23</td>
                            <td>C5</td>
                            <td>95</td>
                            <td class="text-center">
                                <button class="btn btn-sm bg-warning text-white" data-toggle="modal" data-target="#editParam">
                                    <i class="fas fa-edit fa-primary"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target='#deleteParam'>
                                    <i class="fas fa-trash fa-danger"></i> 
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection