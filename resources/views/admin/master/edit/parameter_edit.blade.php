@extends('layouts.main')
@section('content')

<div class="card mb-4 col-xl-6">
    <div class="card-header py-3">
        <h4 class=" font-weight-bold text-primary">Edit Data Mitra Kerja</h4>
    </div>
    <div class="card p-6 mb-4 p-4">
        @foreach ($param as $item)
        <form action="{{ url('/parameter/'.$item->param_id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label for="kode_param" class="form-label">Kode Parameter</label>
                <input type="text" class="form-control" name="kode_param" id="kode_param" value="{{ $item->param_code }}">
                @error('kode_param')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="keterangan" class="form-label">keterangan</label>
                <input type="text" class="form-control" name="keterangan" id="keterangan" value="{{ $item->param_label }}">
                @error('keterangan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="nilai1" class="form-label">Nilai 1</label>
                <input type="text" class="form-control" name="nilai1" id="nilai1" value="{{ $item->val1 }}">
                @error('nilai1')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="nilai2" class="form-label">Nilai 2</label>
                <input type="text" class="form-control" name="nilai2" id="nilai2" value="{{ $item->val2 }}">
                @error('nilai2')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="nilai3" class="form-label">Nilai 3</label>
                <input type="text" class="form-control" name="nilai3" id="nilai3" value="{{ $item->val3 }}">
                @error('nilai3')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-small mt-2 btn-success tombol-aksi float-right">Update</button>
        </form>
        @endforeach
    </div>
</div>
    @include('sweetalert::alert')

@endsection