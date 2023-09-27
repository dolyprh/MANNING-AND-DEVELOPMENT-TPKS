@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jadwal Group</h1>
    </div>

    <div class="card border-left-secondary p-6 mb-4 p-4">
        <form action="/jadwal-group" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-sm-4 ">
                    <div class="md-form md-outline input-with-post-icon datepicker">
                        <label for="jadwal_tanggal" class="form-label">Tanggal</label>
                        <input placeholder="Select date" type="date" name="jadwal_tanggal" id="jadwal_tanggal" class="form-control form-control-sm">
                        @error('jadwal_tanggal')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="mb-2">
                        <label for="jadwal_shift" class="form-label">Shift</label>
                        <select class="form-control form-control-sm" aria-label="Default select example" name="jadwal_shift" id="jadwal_shift">
                            <option selected>Pilih Shift</option>
                            @foreach ($shift as $item)
                            <option value="{{ $item->id_shift }}">{{ $item->nama_shift }}</option>
                            @endforeach
                        </select>
                        @error('jadwal_shift')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="mb-2">
                        <label for="jadwal_group" class="form-label">Group</label>
                        <select class="form-control form-control-sm" aria-label="Default select example" name="jadwal_group" id="jadwal_group">
                            <option selected>Pilih Group</option>
                            @foreach ($group as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_group }}</option>
                            @endforeach
                        </select>
                        @error('jadwal_group')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-success tombol-aksi float-left">Tambah</button>
        </form>
        
        <form action="/jadwal-group" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group mt-4">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Atau import langsung dari excel</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-sm mt-3 btn-success tombol-aksi float-right">Import</button>
        </form>
    </div>

    <!-- DataTales Example -->
    <div class="card border-left-secondary mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Data Jadwal Group</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive text-dark">
                <table class="table table-bordered table-align-center" width="100%" cellspacing="0">
                    <thead class="table-dark text-center">
                        <tr>
                            <th class="col-sm-3">Tanggal</th>
                            <th class="col-sm-3">Shift</th>
                            <th class="col-sm-3">Group</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal_group as $item)
                        <tr>
                            <td>{{date('d/m/Y', strtotime ($item->tanggal)) }} </td>
                            <td>{{ $item->nama_shift}}</td>
                            <td> {{ $item ->nama_group}} </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target='#deleteJGroup{{ $item->id }}'>
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

    @include('admin.modal.m_jgroup_delete')
    @include('sweetalert::alert')
@endsection