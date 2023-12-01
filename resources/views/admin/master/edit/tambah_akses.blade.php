@extends('layouts.main')
@section('content')

<div class="card mb-4">
    <div class="card-header py-3">
        <h4 class=" font-weight-bold text-primary">Edit Data Absen</h4>
    </div>
    <div class="card p-6 col-xl-6 mb-4 p-4">
        @foreach ($akses as $item)
        <form action="{{ url ('tambah-akses/' .$item->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" class="form-control" name="nama" id="nama" value="{{ $item->nama }}" hidden>
            <input type="text" class="form-control" name="nipp" id="nipp" value="{{ $item->nipp }}" hidden>
            
            <div class="mb-2">
                <label for="nama" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="buat username">
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="nama" class="form-label">Password</label>
                <input type="text" class="form-control" name="password" id="password" placeholder="buat password">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <div class="mb-2">
                    <label for="role" class="form-label">Group</label>
                    <select class="form-control form-control" aria-label="Default select example" name="role" id="role">
                        <option selected>Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="superintendent">Super Intendent</option>
                    </select>
                    @error('jadwal_group')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-small btn-success mt-2 tombol-aksi float-right">Tambah</button>
        </form>
        @endforeach
    </div>
</div>

@include('sweetalert::alert')
@endsection