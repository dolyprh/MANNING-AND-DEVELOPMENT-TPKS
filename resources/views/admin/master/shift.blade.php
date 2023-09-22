@extends('layouts.main')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Master Shift</h1>
    </div>

    <div class="card p-6 col-xl-8 mb-4 p-4">
        <form action="/shift" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="nama_shift" class="form-label">Nama Shift</label>
                <input type="text" class="form-control" name="nama_shift" id="nama_shift" value="{{ old('nama_shift') }}">
                @error('nama_shift')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
           
            <div class="mb-2">
                <label for="w_mulai" class="form-label">Waktu Mulai</label>
                <input type="text" class="form-control" name="w_mulai" id="w_mulai" value="{{ old('w_mulai') }}">
                @error('w_mulai')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="w_selesai" class="form-label">Waktu Selesai</label>
                <input type="text" class="form-control" name="w_selesai" id="w_selesai" value="{{ old('w_selesai') }}">
                @error('w_selesai')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="m_istirahat" class="form-label">Mulai Istirahat</label>
                <input type="text" class="form-control" name="m_istirahat" id="m_istirahat" value="{{ old('m_istirahat') }}">
                @error('m_istirahat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="s_istirahat" class="form-label">Selesai Istirahat</label>
                <input type="text" class="form-control" name="s_istirahat" id="s_istirahat" value="{{ old('s_istirahat') }}">
                @error('s_istirahat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="kode_cabang" class="form-label">Kode Cabang</label>
                <input type="text" class="form-control" name="kode_cabang" id="kode_cabang">
            </div>
            <div class="mb-2">
                <label for="kode_terminal" class="form-label">Kode Terminal</label>
                <input type="text" class="form-control" name="kode_terminal" id="kode_terminal">
            </div>
            <div class="mb-2">
                <label for="kode_regional" class="form-label">Kode Regional</label>
                <input type="text" class="form-control" name="kode_regional" id="kode_regional">
            </div>
            <button type="submit" class="btn btn-small btn-primary tombol-aksi float-right">Tambah</button>
        </form>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Shift</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive table-center text-dark text-center">
                <table class="table table-bordered table-align-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Shift</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selsai</th>
                            <th>Mulai Istirahat</th>
                            <th>Selsai Istirahat</th>
                            <th>Kode Cabang</th>
                            <th>Kode Terminal</th>
                            <th>Kode Regional</th>
                            <th class="col-sm-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shift as $item)
                        <tr>
                            <td>{{ $item->nama_shift }}</td>
                            <td>{{ $item->waktu_mulai }}</td>
                            <td>{{ $item->waktu_selesai }}</td>
                            <td>{{ $item->mulai_istirahat }}</td>
                            <td>{{ $item->selesai_istirahat }}</td>
                            <td>{{ $item->kd_regional }}</td>
                            <td>{{ $item->kd_cabang }}</td>
                            <td>{{ $item->kd_cabang }}</td>
                            <td class="text-center">
                                <a href='' class="btn btn-sm bg-warning text-white">
                                    <i class="fas fa-edit fa-primary"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target='#deleteShift{{ $item->id_shift }}'>
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

    @include('admin.modal.m_shift_delete')
    @include('sweetalert::alert')

@endsection