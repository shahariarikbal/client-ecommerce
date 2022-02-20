
    <script src="{{ asset('admin/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ asset('admin/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    {{-- <script src="{{ asset('admin/lib/datatables.net/js/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/lib/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/lib/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') }}"></script> --}}
    <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/lib/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('admin/lib/medium-editor/js/medium-editor.min.js') }}"></script>

    <script src="{{ asset('admin/lib/moment/min/moment.min.js') }}"></script>
    {{-- <script src="{{ asset('admin/lib/peity/jquery.peity.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/lib/rickshaw/vendor/d3.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/lib/rickshaw/vendor/d3.layout.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/lib/rickshaw/rickshaw.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/lib/jquery.flot/jquery.flot.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/lib/jquery.flot/jquery.flot.resize.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/lib/flot-spline/js/jquery.flot.spline.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/lib/jquery-sparkline/jquery.sparkline.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/lib/echarts/echarts.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/lib/select2/js/select2.full.min.js') }}"></script> --}}
    {{-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg"></script> --}}
    {{-- <script src="{{ asset('admin/lib/gmaps/gmaps.min.js') }}"></script> --}}

    <script src="{{ asset('admin/js/bracket.js') }}"></script>
    <script src="{{ asset('admin/js/tooltip-colored.js') }}"></script>
    <script src="{{ asset('admin/js/popover-colored.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/map.shiftworker.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/js/ResizeSensor.js') }}"></script> --}}
    <script src="{{ asset('admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/js/toastr.min.js') }}"></script>


    <script>
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>

    {{-- summernote --}}
    <script>
      $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
          height: 150,
          tooltip: false
        })
      });
    </script>

    {{-- datatables --}}
     <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable3').DataTable();
        $('#datatableNoLabel').DataTable({
          "bPaginate": false,
          "bLengthChange": false,
          "bFilter": true,
          "bInfo": false,
          "bAutoWidth": false,
          "searching": false, 
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // $('#datatable3').DataTable();

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>

    {{-- toastr --}}
    <script type="text/javascript">    
    @if (Session::has('Success'))
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }   
       toastr.success('{{Session::get('Success')}}');
    @endif
    @if (Session::has('Error'))
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }   
       toastr.error('{{Session::get('Error')}}');
    @endif
    </script>

    <script type="text/javascript">
      $(function() {
    $( "#datepicker" ).datepicker({dateFormat: 'yy'});
});
    </script>