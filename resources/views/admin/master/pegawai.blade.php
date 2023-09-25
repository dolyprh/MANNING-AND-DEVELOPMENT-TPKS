@extends('layouts.main')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Master Pegawai</h1>
</div>

<div class="card p-6 mb-4 p-4">
    <form action="/pegawai" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="mb-2">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="nipp" class="form-label">NIPP</label>
                    <input type="text" class="form-control" name="nipp" id="nipp" value="{{ old('nipp') }}">
                    @error('nipp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" class="form-control" name="status" id="status" value="{{ old('status') }}">
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="email_address" class="form-label">Email Adress</label>
                    <input type="text" class="form-control" name="status" id="email_address" value="{{ old('email_address') }}">
                    @error('email_address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" value="{{ old('keterangan') }}">
                    @error('keterangan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="jobdesk" class="form-label">Jobdesk</label>
                    <input type="text" class="form-control" name="jobdesk" id="jobdesk" value="{{ old('jobdesk') }}">
                    @error('jobdesk')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="mb-2">
                    <label for="type" class="form-label">Type</label>
                    <input type="text" class="form-control" name="type" id="type" value="{{ old('type') }}">
                    @error('type')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="group" class="form-label">Group</label>
                    <input type="text" class="form-control" name="keterangan" id="group" value="{{ old('group') }}">
                    @error('group')
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
            </div>
        </div>
        <button type="submit" class="btn btn-small btn-primary tombol-aksi float-right">Tambah</button>
    </form>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive text-dark">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIPP</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Phone</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawai as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nipp }}</td>
                        <td>{{ $item->email_address }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->phone }}</td>
                        <td class="text-center" >
                            <a href='' class="btn btn-sm bg-warning text-white">
                                <i class="fas fa-edit fa-primary"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target='#deletePegawai{{ $item->id }}'>
                                <i class="fas fa-trash fa-danger"></i> 
                            </button>
                        </td>
                    </tr>
                </tbody>
                    @endforeach
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
    
    @include('admin.modal.m_pegawai_delete')
    @include('sweetalert::alert')
@endsection
