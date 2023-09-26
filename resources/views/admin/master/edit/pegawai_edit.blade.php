@extends('layouts.main')
@section('content')

<div class="card mb-4">
    <div class="card-header py-3">
        <h4 class=" font-weight-bold text-primary">Edit Data Pegawai</h4>
    </div>

    <div class="card p-6 mb-4 p-4">
        @foreach ($pegawai as $item)
        <form action="{{ url('/pegawai/' .$item->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="mb-2">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ $item->nama }}">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="nipp" class="form-label">NIPP</label>
                        <input type="text" class="form-control" name="nipp" id="nipp" value="{{ $item->nipp }}">
                        @error('nipp')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" name="status" id="status" value="{{ $item->status }}">
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="email_address" class="form-label">Email Adress</label>
                        <input type="text" class="form-control" name="email_address" id="email_address" value="{{ $item->email_address }}">
                        @error('email_address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" value="{{ $item->keterangan }}">
                        @error('keterangan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="jobdesk" class="form-label">Jobdesk</label>
                        <input type="text" class="form-control" name="jobdesk" id="jobdesk" value="{{ $item->jobdesk }}">
                        @error('jobdesk')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="mb-2">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" name="type" id="type" value="{{ $item->type }}">
                        @error('type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $item->phone }}">
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="group" class="form-label">Group</label>
                        <input type="text" class="form-control" name="group_id" id="group" value="{{ $item->group_id }}">
                        @error('group')
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
            </div>
            <button type="submit" class="btn btn-small btn-success tombol-aksi float-right">Update</button>
        </form>
        @endforeach
    </div>
    @include('sweetalert::alert')
@endsection
