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
                        <input placeholder="Select date" type="date" name="jadwal_tanggal" id="jadwal_tanggal" class="form-control form-control">
                        @error('jadwal_tanggal')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="mb-2">
                        <label for="jadwal_shift" class="form-label">Shift</label>
                        <select class="form-control form-control" aria-label="Default select example" name="jadwal_shift" id="jadwal_shift">
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
                        <select class="form-control form-control" aria-label="Default select example" name="jadwal_group" id="jadwal_group">
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
            <button type="submit" class="btn btn-success tombol-aksi float-right">Tambah</button>
        </form>

        <form action="{{ route('import-excel')}}" method="post" enctype="multipart/form-data" class="mt-4">
            @csrf
            <div class="input-group mt-4">
                <input type="file" name="file" class="form-control form-control">
                <button class="btn btn-info px-4" type="submit" class="form-control"> Upload</button>
            </div>
        </form>
    </div>

    <!-- DataTales Example -->
    <div class="card border-left-dark mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-dark">Data Jadwal Group</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('search-data')}}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                <div class="input-group mb-4 mt-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="jadwal_group">Tampilkan jadwal pada bulan  </span>
                    </div>
                    <select class="custom-select" onchange="this.form.submit()" name="keyword" id="bulan">
                        <!-- <option selected disabled>Pilih</option> -->
                        <option value="" >Semua</option>
                        <option value="1" <?php if($old_selected=="1") {echo"selected";} ?> >Januari </option>
                        <option value="2" <?php if($old_selected=="2") {echo'selected';} ?> >Februari</option>
                        <option value="3" <?php if($old_selected=="3") {echo'selected';} ?> >Maret</option>
                        <option value="4" <?php if($old_selected=="4") {echo'selected';} ?> >April</option>
                        <option value="5" <?php if($old_selected=="5") {echo'selected';} ?> >Mei</option>
                        <option value="6" <?php if($old_selected=="6") {echo'selected';} ?> >Juni</option>
                        <option value="7" <?php if($old_selected=="7") {echo'selected';} ?> >Juli</option>
                        <option value="8" <?php if($old_selected=="8") {echo'selected';} ?> >Agustus</option>
                        <option value="9" <?php if($old_selected=="9") {echo'selected';} ?> >September</option>
                        <option value="10" <?php if($old_selected=="10") {echo'selected';} ?> >Oktober</option>
                        <option value="11" <?php if($old_selected=="11") {echo'selected';} ?> >November</option>
                        <option value="12" <?php if($old_selected=="12") {echo'selected';} ?> >Desember</option>
                    </select>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Tahun </span>
                    </div>
                    <select class="custom-select" name="bulan" id="bulan">
                        <option value="01">2022</option>
                        <option value="02">2023</option>
                        <option value="03">2024</option>
                    </select>
                </div>
            </form>


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