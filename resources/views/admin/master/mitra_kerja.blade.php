@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Master Mitra Kerja</h1>
    </div>

    <div class="card p-6 col-xl-6 mb-4 p-4">
        <form action="/mitra-kerja" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="jenis_mitra" class="form-label">Jenis Mitra</label>
                <input type="text" class="form-control" name="jenis_mitra" id="jenis_mitra">
                @error('jenis_mitra')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan">
                @error('nama_perusahaan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-small btn-primary tombol-aksi float-right">Tambah</button>
        </form>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mitra Kerja</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive table-center text-dark">
                <table class="table table-bordered table-align-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Mitra</th>
                            <th>Perusahaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($mitra as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->jenis_mitra }}</td>
                            <td>{{ $item->nama_perusahaan }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm bg-warning text-white" data-toggle="modal" data-target="#editParam">
                                    <i class="fas fa-edit fa-primary"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target='#deleteMitra{{ $item->id }}'>
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
    
    @include('admin.modal.m_mitra_delete')
    @include('sweetalert::alert')
@endsection