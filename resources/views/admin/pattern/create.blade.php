@extends('admin.template.master')

@section('content')

@include('admin.pattern.header', ['page' => 'Add'])


<div class="br-pagebody">
    <div class="br-section-wrapper">
    	
      <div class="row">
      	<div class="col-md-12">
      		<form action="{{ url('admin/pattern/store') }}" method="POST" enctype="multipart/form-data">
      			@csrf  
      			<div class="form-group">
      				<label for="">Name</label>
      				<input type="text" name="name" value="" class="form-control" required>

	  				@if ($errors->has('name'))
	  					<div class="text-danger">{{ $errors->first('name') }}</div>
	  				@endif
      			</div>

      			<div class="row">
      				<div class="col-md-6">
      					<div class="form-group">
      						<label for="">Brand</label>
      						<select name="brand_id" required="" id="" class="form-control">
	      						@foreach (App\Models\Brand::all() as $brand)
	      							<option value="{{ $brand->id }}">{{ $brand->name }}</option>
	      						@endforeach
      						</select>
      					</div>
      				</div>
      				<div class="col-md-6">
      					
		      			<div class="form-group">
		      				<label for="">Product Images</label>
		      				<input type="file" name="tyre_images[]" class="form-control-file" required multiple  onchange="return previewImage1(event)">

		      				@if ($errors->has('tyre_images*'))
		      					@foreach ($errors->get('tyre_images*') as $tyre_img_error)	
		      						
		      						<div class="text-danger">{{ $tyre_img_error[0] }}</div>
		      					@endforeach

		      				@endif

		      				<div id="tyre_images_preview" class="mt-2">
		      					
		      				</div>
		      			</div>  
      				</div>
      			</div>


      			<div class="form-group">
      				<button type="submit" class="btn btn-teal mt-3">Submit</button>
      			</div>
      		</form>
      	</div>
      </div>
	</div>
    <!-- br-section-wrapper -->
</div>


<script type="text/javascript">

	function previewImage1(event){
		html = '';
		
		for (var i = 0; i < event.target.files.length; i++) {
			src = URL.createObjectURL(event.target.files[i]);
			html += '<img src="'+src+'" width="50px;" class="mr-1 mb-1">';
		}
		document.getElementById('tyre_images_preview').innerHTML = html;
		console.log(html);
	}
</script>


@endsection