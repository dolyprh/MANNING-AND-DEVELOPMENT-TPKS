@extends('layouts.main')
@section('content')  

<div class="card mb-4">
    <div class="card-header py-3">
        <h4 class=" font-weight-bold text-primary">Edit Data Alat</h4>
    </div>

    <div class="card p-6 mb-4 p-4">
        @foreach ($alat as $item)
        <form action="{{ url ('alat/' .$item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="mb-2">
                        <label for="kode_alat" class="form-label">Kode Alat</label>
                        <input type="text" class="form-control" name="kode_alat" id="kode_alat" value="{{ $item->kode_alat }}">
                    </div>
                    <div class="mb-2">
                        <label for="nama_alat" class="form-label">Nama Alat</label>
                        <input type="text" class="form-control" name="nama_alat" id="nama_alat" value="{{ $item->nama_alat }}">
                    </div>
                    <div class="mb-2">
                        <label for="jenis_alat" class="form-label">Jenis</label>
                        <input type="text" class="form-control" name="jenis_alat" id="jenis_alat" value="{{ $item->jenis_alat }}">
                    </div>
                    <div class="mb-2">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" value="{{ $item->keterangan }}">
                    </div>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="mb-2">
                        <label for="kd_cabang" class="form-label">Kode Cabang</label>
                        <input type="text" class="form-control" name="kd_cabang" id="kd_cabang" value="{{ $item->kd_cabang }}">
                        @error('kd_cabang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="kd_terminal" class="form-label">Kode Terminal</label>
                        <input type="text" class="form-control" name="kd_terminal" id="kd_terminal" value="{{ $item->kd_terminal }}">
                        @error('kd_terminal')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="kd_regional" class="form-label">Kode Regional</label>
                        <input type="text" class="form-control" name="kd_regional" id="kd_regional" value="{{ $item->kd_regional }}">
                        @error('kd_regional')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-small btn-success tombol-aksi float-right">Update</button>
        </form>
        @endforeach
    </div>
</div>
    @include('sweetalert::alert')

@endsection