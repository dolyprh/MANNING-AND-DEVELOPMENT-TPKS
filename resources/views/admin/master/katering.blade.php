@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Master Katering</h1>
    </div>

    <div class="card p-6 col-xl-8 mb-4 p-4">
        <form action="/katering" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="mb-2">
                        <label for="nama_katering" class="form-label">Nama Katering</label>
                        <input type="text" class="form-control" name="nama_katering" id="nama_katering" value="{{ old('nama_katering') }}">
                        @error('nama_katering')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-2">
                        <label for="email_vendor" class="form-label">Email Vendor</label>
                        <input type="text" class="form-control" name="email_vendor" id="email_vendor" value="{{ old('email_vendor') }}">
                        @error('email_vendor')
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
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
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
            <button type="submit" class="btn btn-sm mt-2 btn-success tombol-aksi float-left">Tambah</button>
        </form>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Katering</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive text-dark">
                <table class="table table-bordered table-align-center" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-dark text-center">
                        <tr>
                            <th class="col-sm-2">Nama</th>
                            <th >Email Vendor</th>
                            <th >Kode Cabang</th>
                            <th >Kode Terminal</th>
                            <th >Kode Regional</th>
                            <th class="col-sm-2">Phone</th>
                            <th class="col-sm-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($katering as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email_vendor_food}}</td>
                                <td>{{ $item->kode_cabang}}</td>
                                <td>{{ $item->kode_terminal}}</td>
                                <td>{{ $item->kode_regional}}</td>
                                <td>{{ $item->phone}}</td>
                                <td class="text-center ">
                                    <a href="{{ url('/katering/'.$item->id.'/edit') }}" class="btn btn-sm bg-warning text-white">
                                        <i class="fas fa-edit fa-primary"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target='#deleteKatering{{ $item->id }}'>
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

    @include('admin.modal.m_katering_delete')
    @include('sweetalert::alert')
@endsection