<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.includes.header')

    <!-- vendor css -->
    @include('admin.includes.css')

    @yield('style')
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->    
    @include('admin.includes.left_sidebar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## --> 
    @include('admin.includes.nav')   
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
		@yield('content')

    	@include('admin.includes.footer')   
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    @include('admin.includes.scripts')

    @yield('script')
  </body>
</html>
