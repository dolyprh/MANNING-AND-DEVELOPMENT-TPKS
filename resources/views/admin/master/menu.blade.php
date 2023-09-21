@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <div class="d-flex align-items-center">
            <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Menu</p>
        </div>

        <div class="d-none d-sm-inline-block justify-content-end p-2">
            <button class="d-none d-sm-inline-block btn btn-success shadow-sm tombol" data-toggle="modal"
                data-target="#tambahMenu">
                <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
                Add Menu
            </button>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Menu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive table-center">
                <table class="table table-bordered table-align-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                            @foreach ($submenus as $submenu)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $submenu->nama_submenu }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target='#deleteMenu{{$submenu->id}}'>
                                        <i class="fas fa-trash fa-danger"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.modal.m_tambah_menu')
    @include('admin.modal.m_delete_menu')
    @include('sweetalert::alert')

@endsection


