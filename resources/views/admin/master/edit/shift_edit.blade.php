@extends('layouts.main')
@section('content')

<div class="card mb-4">
    <div class="card-header py-3">
        <h4 class=" font-weight-bold text-primary">Edit Data Shift</h4>
    </div>

    <div class="card p-6 mb-4 p-4">
        @foreach ($shift as $item)
        <form action="{{ url('/shift/' .$item->id_shift)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="mb-2">
                        <label for="nama_shift" class="form-label">Nama Shift</label>
                        <input type="text" class="form-control" name="nama_shift" id="nama_shift" value="{{ $item->nama_shift }}">
                        @error('nama_shift')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="kode_cabang" class="form-label">Kode Cabang</label>
                        <input type="text" class="form-control" name="kode_cabang" id="kode_cabang" value="{{ $item->kd_cabang }}">
                    </div>
                    <div class="mb-2">
                        <label for="kode_terminal" class="form-label">Kode Terminal</label>
                        <input type="text" class="form-control" name="kode_terminal" id="kode_terminal" value="{{ $item->kd_terminal }}">
                    </div>
                    <div class="mb-2">
                        <label for="kode_regional" class="form-label">Kode Regional</label>
                        <input type="text" class="form-control" name="kode_regional" id="kode_regional" value="{{ $item->kd_regional }}">
                    </div>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class=" mb-2">
                        <label for="w_mulai" class="form-label">Waktu Mulai</label>
                        <input type="text" class="form-control" name="w_mulai" id="w_mulai" value="{{ $item->waktu_mulai }}">
                        @error('w_mulai')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" mb-2">
                        <label for="w_selesai" class="form-label">Waktu Selesai</label>
                        <input type="text" class="form-control" name="w_selesai" id="w_selesai" value="{{ $item->waktu_selesai }}">
                        @error('w_selesai')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" mb-2">
                        <label for="m_istirahat" class="form-label">Mulai Istirahat</label>
                        <input type="text" class="form-control" name="m_istirahat" id="m_istirahat" value="{{ $item->mulai_istirahat }}">
                        @error('m_istirahat')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" mb-2">
                        <label for="s_istirahat" class="form-label">Selesai Istirahat</label>
                        <input type="text" class="form-control" name="s_istirahat" id="s_istirahat" value="{{ $item->selesai_istirahat }}">
                        @error('s_istirahat')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-small mt-3 btn-success tombol-aksi float-right">Update</button>
                </div>
            </div>
        </form>
        @endforeach
    </div>
</div>
    @include('sweetalert::alert')

@endsection