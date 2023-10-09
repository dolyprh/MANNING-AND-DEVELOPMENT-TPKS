@extends('layouts.main')
@section('content')
    <div class="card border-left-dark mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-dark">Detail Rencana Baru</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive text-dark">
                <table class="table table-bordered table-align-center" width="100%" cellspacing="0">
                    <thead class="table-dark text-center">
                        <tr>
                            <th >Kapal</th>
                            <th >Voyage</th>
                            <th >Kode</th>
                            <th >Rencana Sandar</th>
                            <th >Rencana Kerja</th>
                            <th class="col-sm-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card border-left-dark mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-dark">Alat</h5>
        </div>
        <div class="p-6 mb-4 p-4">
            <div class="mb-4">
                <form action="" method="get" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-outline-success mr-2 float-left">Semua</button>
                </form>
                <form action="" method="get" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-outline-primary mr-2 float-left">Quay Crane</button>
                </form>
                <form action="" method="get" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-outline-info mr-2 float-left">Ruber Tyre Gantry</button>
                </form>
                <form action="" method="get" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-outline-warning mr-2 float-left">Automated Ruber Tyre Gantry</button>
                </form>
            </div>
            <br/>
            <div class="mb-2">
                <form action="" method="get" enctype="multipart/form-data">
                    <!-- @csrf -->
                    <div class="form-group">
                        <div class="mb-2">
                            <select class="form-select form-control" name="pilih_alat" size="20" style="height: 100%;" >
                                @foreach ($alat as $item)
                                <option value="{{ $item->id }}"> {{ $item->nama_alat}} </option>
                                @endforeach
                            </select>
                            @error('pilih_alat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success tombol-aksi float-left">Selanjutnya</button>
                </form>
            </div>
            <!-- <a href="/rencana-baru/perencanaan-operasi" class="btn bg-primary text-white">
                Selanjutnya
            </a> -->
        </div>
    </div>
    
     <script>
        $(document).ready(function() {
            $('.form-select').change(function() {
            var selectedOptions = $(this).val();
            console.log(selectedOptions); 
            });
        });
    </script>
    @endsection