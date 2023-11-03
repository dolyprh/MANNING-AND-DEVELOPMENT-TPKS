@extends('layouts.main')
@section('content')

<div class="card card-primary card-tabs" width="50%">
    @foreach ($group_shift as $item)
        <div class="pt-2 h4 p-3 text-white bg-primary font-weight-bold">Operator {{ $item->nama_group }} </div>
    @endforeach
    <div class="card-header">
        <ul class="nav nav-tabs h5 ml-1" id="custom-tabs-two-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-two-cc-tab" data-toggle="pill" href="#custom-tabs-two-cc" role="tab" aria-controls="custom-tabs-two-cc" aria-selected="true">CC</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-two-rtg-tab" data-toggle="pill" href="#custom-tabs-two-rtg" role="tab" aria-controls="custom-tabs-two-rtg" aria-selected="false">RTG & ARTG</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-two-rs-tab" data-toggle="pill" href="#custom-tabs-two-rs" role="tab" aria-controls="custom-tabs-two-rs" aria-selected="false">RS/SS</a>
            </li>
        </ul>
    </div>

    <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">
        <div class="tab-pane fade show active" id="custom-tabs-two-cc" role="tabpanel" aria-labelledby="custom-tabs-two-cc-tab">
            <div class="table-responsive">
                <table class="table table-bordered table-align-center" cellspacing="0">
                    <thead class="table-secondary text-center text-dark">
                        <tr>
                            <th >Nama Operator</th>
                            <th >Alat</th>
                        </tr>
                    </thead>
                    <tbody id="table-body-spk">
                        @foreach ($operator_cc as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jobdesk }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>        
        </div>
        <div class="tab-pane fade" id="custom-tabs-two-rtg" role="tabpanel" aria-labelledby="custom-tabs-two-rtg-tab">
            <div class="table-responsive">
                <table class="table table-bordered table-align-center" cellspacing="0">
                    <thead class="table-secondary text-center text-dark">
                        <tr>
                            <th >Nama Operator</th>
                            <th >Alat</th>
                        </tr>
                    </thead>
                    <tbody id="table-body-spk">
                        @foreach ($operator_rtg as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jobdesk }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>        
        </div>
        <div class="tab-pane fade" id="custom-tabs-two-rs" role="tabpanel" aria-labelledby="custom-tabs-two-rs-tab">
            <div class="table-responsive">
                <table class="table table-bordered table-align-center" cellspacing="0">
                    <thead class="table-secondary text-center text-dark">
                        <tr>
                            <th >Nama Operator</th>
                            <th >Alat</th>
                        </tr>
                    </thead>
                    <tbody id="table-body-spk">
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>        
        </div>
    </div>
</div>
</div>
@endsection