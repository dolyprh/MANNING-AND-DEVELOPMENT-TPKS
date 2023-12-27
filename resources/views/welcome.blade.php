@extends('layouts.main')
@section('content')

    

    <div class="card p-6 col-xl-6 border-bottom-secondary mx-auto mb-2 p-4">
        <div class="d-sm-flex align-items-center text-center justify-content-between mb-4">
            <p class="h2 mb-0 text-gray-800 fw-bolder">Selamat Datang di Aplikasi Sistem Perintah Kerja</p>
        </div>
        <div class="d-flex justify-content-center">
            <a href="/rencana-baru">
                <button type="submit" class="btn btn-sm btn-outline-info ml-3">
                    Buat Perencanaan
                </button>
            </a>
            <a href="/spk-baru">
                <button type="submit" class="btn btn-sm btn-outline-info ml-3">
                    Buat SPK
                </button>
            </a>
        </div>
    </div>
    @include('sweetalert::alert')

@endsection