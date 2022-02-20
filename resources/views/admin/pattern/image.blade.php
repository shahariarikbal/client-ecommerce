@extends('admin.template.master')

@section('content')
<style type="text/css">
	td{
		vertical-align: middle !important;
	}
</style>

<div class="br-pagetitle">
	<i class="icon ion-social-instagram-outline"></i>
	<div>
	  <h4>Manage Pattern Images</h4>
	  <p class="mg-b-0">
	  	<a href="{{ url('admin/dashboard') }}">Dashboard</a> 
	  	/ Patterns / 
	  	/ Images / 
		Manage
	  </p>
	</div>
</div>



      <div class="br-pagebody">
        <div class="br-section-wrapper">

          <div class="table-wrapper table-responsive">
          	<form action="{{ url('admin/pattern/image/update') }}" method="POST">
          		@csrf
          		
	            <table class="table display nowrap">
	              <thead>
	                <tr>
	                  <th class="">#</th>
	                  <th class="">Image</th>
	                  <th style="width:42%;">Priority</th>
	                </tr>
	              </thead>
	              <tbody>
	              	@if ($pattern->tyreImages->count() > 0)
			                @foreach ($pattern->tyreImages as $tyreImage)
			                <input type="hidden" name="priorityIndex[]" value="{{ $tyreImage->id }}">
			                <tr>
			                  <td>{{ $loop->index + 1 }}</td>
			                  <td><img src="{{  asset('pattern/' . $tyreImage->image) }}" width="40" alt=""></td>
			                  <td class="width:40%"><input type="number" required min="0" name="priorityValue[]" value="{{ $tyreImage->priority }}" class="form-control"></td>
			                </tr>
			                @endforeach 
	              	@endif
	              </tbody>
	            </table>
	            <div class="form-group mt-5 text-center">
	            	<button class="btn btn-teal text-center">Submit</button>
	            </div>
            </form>
          </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->


@endsection



