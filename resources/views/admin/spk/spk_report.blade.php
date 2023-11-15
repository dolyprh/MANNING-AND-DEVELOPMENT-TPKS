@extends('layouts.main')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="align-items-center text-center justify-content-between mb-4">
    <h1 class="h5 mb-2 text-gray-800"><strong>KAMIS - 06 JULI 2023 08:00 - 16:00</strong></h1>
    <h1 class="h5 mb-2 text-gray-800"><strong><u>MANNING & DEPLOYMENT TERMINAL PETIKEMAS NILAM</u></strong></h1>
    <h1 class="h5 mb-2 text-gray-800"><strong>GROUP B - SHIFT 2</strong></h1>
</div>

<div class="card mb-4">
    <div class="card-header bg-info text-center text-light py-3 mb-2">
        <h5 class="m-0 font-weight-bold text-light">P&C ON DUTY</h5>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-body border-bottom-primary shadow">
                <div class="table-responsive">
                    <table class="table table-bordered table-align-center" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th>ASMAN OPERASI</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>DUTY OPERASI</th>
                                <td>ARDIKA. P</td>
                            </tr>                 
                            <tr>
                                <th>SUPERVISI GRUP</th>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th>DUTY PLANNER</th>
                                <td>ARDIKA. P</td>
                            </tr>                 
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-body shadow border-bottom-success">
                <div class="table-responsive">
                    <table class="table table-bordered p table-align-center" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="2">SHIP PLANNER</th>
                                <td colspan="2">KRISHNA</td>
                            </tr>
                            <tr>
                                <td>-</td>
                            </tr>

                            <tr>
                                <th rowspan="2">YARD PLANNER</th>
                                <td colspan="2">ARDIKA. P</td>
                            </tr>
                            <tr>
                                <td>-</td>
                            </tr>
                        </thead>
                    </table>
                </div>  
            </div>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-body border-bottom-info shadow">
                <div class="table-responsive">
                    <table class="table table-bordered table-align-center" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th>BERTH ALLOCATION (BA)</th>
                                <td>BALYA EL ANAM</td>
                            </tr>
                            <tr>
                                <th>MANNING & DEPLOYMENT</th>
                                <td>ARDIKA. P</td>
                            </tr>                 
                            <tr>
                                <th>REPORTING</th>
                                <td>DIKA</td>
                            </tr>
                            <tr>
                                <th>HSSE OFFICER</th>
                                <td>PIPIT</td>
                            </tr>                 
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-body border-bottom-warning shadow">
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-align-center" width="100%" cellspacing="0">
                        <thead class="table-secondary text-dark">
                            <tr >
                                <th colspan="2">APPROVAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <strong>MANAGER PERENCANAAN OPERAS</strong><br><br>
                                    <span>LASIARA</span>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-lg-3">

        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                Default Card Example
            </div>
            <div class="card-body">
                This card uses Bootstrap's default styling with no utility classes added. Global
                styles are the only things modifying the look and feel of this default card example.
            </div>
        </div>

        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
            </div>
            <div class="card-body">
                The styling for this basic card example is created by using default Bootstrap
                utility classes. By using utility classes, the style of the card component can be
                easily modified with no need for any custom CSS!
            </div>
        </div>

    </div>

    <div class="col-lg-3">

        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                Dropdown menus can be placed in the card header in order to extend the functionality
                of a basic card. In this dropdown card example, the Font Awesome vertical ellipsis
                icon in the card header can be clicked on in order to toggle a dropdown menu.
            </div>
        </div>

        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    This is a collapsable card example using Bootstrap's built in collapse
                    functionality. <strong>Click on the card header</strong> to see the card body
                    collapse and expand!
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-3">

        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                Default Card Example
            </div>
            <div class="card-body">
                This card uses Bootstrap's default styling with no utility classes added. Global
                styles are the only things modifying the look and feel of this default card example.
            </div>
        </div>

        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
            </div>
            <div class="card-body">
                The styling for this basic card example is created by using default Bootstrap
                utility classes. By using utility classes, the style of the card component can be
                easily modified with no need for any custom CSS!
            </div>
        </div>

    </div>

    <div class="col-lg-3">

        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                Dropdown menus can be placed in the card header in order to extend the functionality
                of a basic card. In this dropdown card example, the Font Awesome vertical ellipsis
                icon in the card header can be clicked on in order to toggle a dropdown menu.
            </div>
        </div>

        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Collapsable Card Example</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    This is a collapsable card example using Bootstrap's built in collapse
                    functionality. <strong>Click on the card header</strong> to see the card body
                    collapse and expand!
                </div>
            </div>
        </div>

    </div>

</div>

</div>
@endsection