<script src="{{ asset('templates/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('templates/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('templates/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('templates/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{ asset('https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js')}}"></script>
<script src="{{ asset('templates/vendor/chart.js/Chart.min.js')}}"></script>

<!-- <script src="{{ asset('https://code.jquery.com/jquery-3.7.0.js')}}"></script> 
<script src="{{ asset('https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js') }}"></script> -->

<!-- Page level custom scripts -->
<script src="{{ asset('templates/js/demo/chart-area-demo.js')}}"></script>
<script src="{{ asset('templates/js/demo/chart-pie-demo.js')}}"></script>

<script type="text/javascript">
    $(document).ready( function () {
    $('#dataTable').DataTable();
  
    new Choices(document.querySelector(".choices-multiple"));

} );
</script>
