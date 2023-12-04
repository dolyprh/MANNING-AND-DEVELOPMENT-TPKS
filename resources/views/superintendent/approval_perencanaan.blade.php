@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Approval Perencanaan</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Perencanaan</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive text-dark">
                <table class="table table-bordered stripe" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')

@endsection