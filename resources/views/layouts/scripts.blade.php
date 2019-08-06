    <!-- Scripts -->
    <script src="{{ asset('ElaAdmin/assets/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/jquery.matchHeight.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/main.js') }}"></script>

    <!--  Chart js -->
    <script src="{{ asset('ElaAdmin/assets/js/Chart.bundle.min.js') }}"></script>

    <!--Chartist Chart-->
    <script src="{{ asset('ElaAdmin/assets/js/chartist.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/chartist-plugin-legend.min.js') }}"></script>

    <script src="{{ asset('ElaAdmin/assets/js/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/jquery.flot.spline.min.js') }}"></script>

    <script src="{{ asset('ElaAdmin/assets/js/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/weather-init.js') }}"></script>

    <script src="{{ asset('ElaAdmin/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/fullcalendar-init.js') }}"></script>



    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/init/datatables-init.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
    </script>

    @yield('scripts')