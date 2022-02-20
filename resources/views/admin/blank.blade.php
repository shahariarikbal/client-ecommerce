@extends('admin.template.master')

@section('content')

<div class="br-pagetitle">
	<i class="icon ion-ios-home-outline"></i>
	<div>
	  <h4>Manage Brands</h4>
	  <p class="mg-b-0">
	  	<a href="{{ url('admin/dashboard') }}">Dashboard</a> 
	  	/ Brands / 
		Manage
	  </p>
	</div>
</div>


<div class="br-pagebody">
    <div class="br-section-wrapper">
    	
          <h6 class="br-section-label">Basic Responsive DataTable</h6>
          <p class="br-section-text">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>
    </div>
    <!-- br-section-wrapper -->
</div>


@endsection