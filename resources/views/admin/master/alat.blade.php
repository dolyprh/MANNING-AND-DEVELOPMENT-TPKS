@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Master Alat</h1>
    </div>

    <div class="card p-6 col-xl-6 mb-4 p-4">
        <form action="/alat" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="kode_alat" class="form-label">Kode Alat</label>
                <input type="text" class="form-control" name="kode_alat" id="kode_alat" value="{{ old('kode_alat') }}">
                @error('kode_alat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="nama_alat" class="form-label">Nama Alat</label>
                <input type="text" class="form-control" name="nama_alat" id="nama_alat" value="{{ old('nama_alat') }}">
                @error('nama_alat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="jenis_alat" class="form-label">Jenis</label>
                <input type="text" class="form-control" name="jenis_alat" id="jenis_alat" value="{{ old('jenis_alat') }}">
                @error('jenis_alat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" id="keterangan" value="{{ old('keterangan') }}">
                @error('keterangan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-small btn-primary tombol-aksi float-right">Tambah</button>
        </form>
    </div>

    <!-- DataTales Example -->
    <div class="card mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Alat</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive table-center text-dark">
                <table class="table table-bordered table-align-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Alat</th>
                            <th>Nama Alat</th>
                            <th>Jenis</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alat as $item)
                            <tr>
                                <td>{{ $item->kode_alat }}</td>
                                <td>{{ $item->nama_alat}}</td>
                                <td>{{ $item->jenis_alat}}</td>
                                <td>{{ $item->keterangan}}</td>
                                <td class="text-center">
                                    <a href="{{ url('/alat/edit_alat/' .$item->id) }}" class="btn btn-sm bg-warning text-white">
                                        <i class="fas fa-edit fa-primary"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target='#deleteAlat{{ $item->id }}'>
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

    @include('admin.modal.m_alat_delete')
    @include('sweetalert::alert')

@endsection