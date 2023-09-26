@extends('layouts.main')
@section('content')        
        <div class="d-flex align-items-center">
            <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Master</p>
            <p class="mb-0 text-gray-800 text-small">Detail Pegawai </p>
        </div>

        @foreach ($pegawai as $item)
        <div class="container row mt-3">
            <div class="col-lg-8 bg-white p-4 mb-2">
                <h4 class="bg-dark text-light p-2">Informasi Data Pegawai</h4>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Nama</label>
                    <div class="col-sm-6">
                        <label class="col-form-label"> {{ $item->nama}} </label>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">NIPP</label>
                    <div class="col-sm-6">
                        <label class=" col-form-label">{{ $item->nipp}}</label>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Status</label>
                    <div class="col-sm-6">
                        <label class=" col-form-label">{{ $item->status}}</label>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Alamat Email</label>
                    <div class="col-sm-6">
                        <label class=" col-form-label">{{ $item->email_address}}</label>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Keterangan</label>
                    <div class="col-sm-6">
                        <label class=" col-form-label">{{ $item->keterangan}}</label>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Type</label>
                    <div class="col-sm-6">
                        <label class="col-form-label">{{ $item->type}}</label>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Phone</label>
                    <div class="col-sm-6">
                            <label class="col-form-label">{{ $item->phone }}</label>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Kode Cabang</label>
                    <div class="col-sm-6">
                            <label class="col-form-label">{{ $item->kd_cabang }}</label>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Kode Terminal</label>
                    <div class="col-sm-6">
                            <label class="col-form-label">{{ $item->kd_terminal }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Kode Regional</label>
                    <div class="col-sm-6">
                            <label class="col-form-label">{{ $item->kd_regional}}</label>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        @endforeach
@endsection
