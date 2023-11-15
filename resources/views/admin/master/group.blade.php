@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Group</h1>
    </div>

    <div class="card p-6 col-xl-6 mb-4 p-4">
        <form action="/group" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="nama_group" class="form-label">Nama Group</label>
                <input type="text" class="form-control" name="nama_group" id="nama_group" placeholder="kode alat">
                @error('nama_group')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="kode_group" class="form-label">Kode Group</label>
                <input type="text" class="form-control" name="kode_group" id="kode_group" placeholder="Kode Group">
                @error('kode_group')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-sm mt-2 btn-success tombol-aksi float-left">Tambah</button>
        </form>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Group</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive table-center text-dark">
                <table class="table table-bordered table-align-center" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Group</th>
                            <th>Kode Group</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($group as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_group }}</td>
                                <td>{{ $item->kode }}</td>
                                <td class="text-center">
                                    <a href="{{ url('/group/'.$item->id_group.'/edit') }}" class="btn btn-sm bg-warning text-white">
                                        <i class="fas fa-edit fa-primary"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target='#deleteGroup{{ $item->id_group }}'>
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

    @include('admin.modal.m_group_delete')
    @include('sweetalert::alert')
@endsection