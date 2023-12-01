@extends('layouts.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Menu Hak Akses</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive table-center text-dark">
            <table class="table table-bordered table-align-center" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIPP</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($akses as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->nipp }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->role }}</td>
                            <td class="text-center">
                                <a href="{{ url('/group/'.$item->id.'/edit') }}" class="btn btn-sm bg-info text-white">
                                    <i class="fas fa-key fa-info"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    @include('sweetalert::alert')
@endsection