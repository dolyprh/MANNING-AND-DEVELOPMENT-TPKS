@extends('layouts.main')
@section('content')
<div class="card mb-4 col-xl-6">
    <div class="card-header py-3">
        <h4 class=" font-weight-bold text-primary">Edit Data Mitra Kerja</h4>
    </div>

    @foreach ($mitra as $item)
    <div class="card p-6 mb-4 p-4">
        <form action="{{ url('/mitra-kerja/' .$item->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label for="jenis_mitra" class="form-label">Jenis Mitra</label>
                <input type="text" class="form-control" name="jenis_mitra" id="jenis_mitra" value="{{ $item->jenis_mitra }}">
                @error('jenis_mitra')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" value="{{ $item->nama_perusahaan }}">
                @error('nama_perusahaan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-small mt-3 btn-success tombol-aksi float-right">Update</button>
        </form>
    </div>
    @endforeach
</div>
    @include('sweetalert::alert')
@endsection