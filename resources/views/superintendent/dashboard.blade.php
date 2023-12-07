@extends('layouts.main')
@section('content')

<div class="d-flex align-items-center">
        <p class="h3 text-gray-800 mb-0 mr-1 font-weight-bold">Dashboard</p>
        <p class="mb-0 text-gray-800 text-small">Overview & Statistics</p>
        {{-- <p class="mb-0 bg-primary rounded text-white p-2"><i class="far fa-calendar"></i>{{ date(' j F Y') }}</p> --}}
    </div>

    <div class="row">
        <div class="col-xl-4  mb-3 mt-2">
            <div class="card border-left-success shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-success mb-2">
                                Surat Perintah Kerja</div>
                            <div class="h2 mb-0 font-weight-bold text-gray-800"> 20
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <hr class="divider">
                    <div class="text-gray-800 text-sm">Total Pengajuan SPK</div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection