@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Master Parameter</h1>
    </div>

    <div class="card p-6 col-xl-8 mb-4 p-4">
        <form action="/parameter" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="kode_param" class="form-label">Kode Parameter</label>
                <input type="text" class="form-control" name="kode_param" id="kode_param" value="{{ old('kode_param') }}">
                @error('kode_param')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="keterangan" class="form-label">keterangan</label>
                <input type="text" class="form-control" name="keterangan" id="keterangan" value="{{ old('keterangan') }}">
                @error('keterangan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="nilai1" class="form-label">Nilai 1</label>
                <input type="text" class="form-control" name="nilai1" id="nilai1" value="{{ old('nilai1') }}">
                @error('nilai1')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="nilai2" class="form-label">Nilai 2</label>
                <input type="text" class="form-control" name="nilai2" id="nilai2" value="{{ old('nilai2') }}">
                @error('nilai2')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="nilai3" class="form-label">Nilai 3</label>
                <input type="text" class="form-control" name="nilai3" id="nilai3" value="{{ old('nilai3') }}">
                @error('nilai3')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-sm mt-3 mt-2 btn-success tombol-aksi float-left">Tambah</button>
        </form>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Parameter</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive table-center text-dark">
                <table class="table table-bordered table-align-center" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th>Kode</th>
                            <th class="col-sm-4">Keterangan</th>
                            <th class="col-sm-2">Nilai 1</th>
                            <th class="col-sm-2">Nilai 2</th>
                            <th class="col-sm-2">Nilai 3</th>
                            <th class="col-sm-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($param as $item)
                        <tr>
                            <td>{{ $item->param_code }}</td>
                            <td>{{ $item->param_label }}</td>
                            <td>{{ $item->val1 }}</td>
                            <td>{{ $item->val2 }}</td>
                            <td>{{ $item->val3 }}</td>
                            <td class="text-center">
                                <a href="{{ url('/parameter/'.$item->param_id. '/edit') }}" class="btn btn-sm bg-warning text-white">
                                    <i class="fas fa-edit fa-primary"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target='#deleteParam{{ $item->param_id }}'>
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

    @include('admin.modal.m_param_delete')
    @include('sweetalert::alert')

@endsection