@extends('layouts.main')
@section('content') 

<div class="card p-6 col-xl-8 mb-4 p-4">
    <div class="card-header py-3">
        <h4 class=" font-weight-bold text-primary">Edit Data Katering</h4>
    </div>

    @foreach ($katering as $item)
    <form action="{{ url('katering/'.$item->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="mb-2">
                    <label for="nama_katering" class="form-label">Nama Katering</label>
                    <input type="text" class="form-control" name="nama_katering" id="nama_katering" value="{{ $item->nama }}">
                    @error('nama_katering')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-2">
                    <label for="email_vendor" class="form-label">Email Vendor</label>
                    <input type="text" class="form-control" name="email_vendor" id="email_vendor" value="{{ $item->email_vendor_food }}">
                    @error('email_vendor')
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
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="mb-2">
                    <label for="kode_cabang" class="form-label">Kode Cabang</label>
                    <input type="text" class="form-control" name="kode_cabang" id="kode_cabang" value="{{ $item->kode_cabang }}">
                </div>
                <div class="mb-2">
                    <label for="kode_terminal" class="form-label">Kode Terminal</label>
                    <input type="text" class="form-control" name="kode_terminal" id="kode_terminal" value="{{ $item->kode_terminal }}">
                </div>
                <div class="mb-2">
                    <label for="kode_regional" class="form-label">Kode Regional</label>
                    <input type="text" class="form-control" name="kode_regional" id="kode_regional" value="{{ $item->kode_regional }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-small btn-success tombol-aksi float-right">Update</button>
    </form>
    @endforeach
</div>

@include('sweetalert::alert')

@endsection