@extends('layouts.main')
@section('content')  

<div class="card mb-4 col-xl-6">
    <div class="card-header py-3">
        <h4 class=" font-weight-bold text-primary">Edit Data Group</h4>
    </div>

    <div class="card p-6 mb-4 p-4">
        @foreach ($group as $item)
        <form action="{{ url ('group/' .$item->id_group) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label for="nama_group" class="form-label">Nama Group</label>
                <input type="text" class="form-control" name="nama_group" id="nama_group" value="{{ $item->nama_group }}">
                @error('nama_group')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="kode_group" class="form-label">Kode Group</label>
                <input type="text" class="form-control" name="kode_group" id="kode_group" value="{{ $item->kode }}">
                @error('kode_group')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn mt-2 btn-small btn-primary tombol-aksi float-right">Update</button>
        </form>
        @endforeach
    </div>
</div>
@include('sweetalert::alert')

@endsection