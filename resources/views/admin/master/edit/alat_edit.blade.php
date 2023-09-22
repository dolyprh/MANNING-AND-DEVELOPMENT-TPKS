@extends('layouts.main')
@section('content')  

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Alat</h1>
    </div>

    <div class="card p-6 col-xl-6 mb-4 p-4">
        <form action="/alat" method="post" enctype="multipart/form-data">
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
            <button type="submit" class="btn btn-small btn-primary tombol-aksi float-right">Tambah</button>
        </form>
    </div>

    @include('sweetalert::alert')

@endsection