@extends('layouts.main')
@section('content')

<div class="card mb-4">
    <div class="card-header py-3">
        <h4 class=" font-weight-bold text-primary">Edit Data Absen</h4>
    </div>
    <div class="card p-6 col-xl-6 mb-4 p-4">
        @foreach ($absen as $item)
        <form action="{{ url ('jenis-absen/' .$item->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label for="nama" class="form-label">Nama Jenis Absen</label>
                <input type="text" class="form-control" name="nama" id="nama" value="{{ $item->nama }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="jenis_absen" class="form-label">Kode</label>
                <input type="text" class="form-control" name="jenis_absen" id="jenis_absen" value="{{ $item->kode }}">
                @error('jenis_absen')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-small btn-primary tombol-aksi float-right">Update</button>
        </form>
        @endforeach
    </div>
</div>
    @include('sweetalert::alert')
@endsection