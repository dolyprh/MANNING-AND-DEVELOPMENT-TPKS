
<!DOCTYPE html>
<html lang="en">

<head>    
    <title>pelindo petikemas</title>
    @include('layouts.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
            </div>

        <!-- Footer -->

        @include('layouts.footer')

        <!-- End of Footer -->

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Script -->

    @include('layouts.script')

    <!-- End of Footer -->
</body>

</html>