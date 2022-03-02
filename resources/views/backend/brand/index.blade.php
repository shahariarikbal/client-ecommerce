@extends('backend.master')

@section('title')
    Brand
@endsection

@section('content')
@if ($data['page'] == 'index')
<div class="br-pagetitle">
	<i class="icon ion-android-list"></i>
	<div>
	  <h4>Manage Brand</h4>
	  <p class="mg-b-0">
	  	<a href="{{ url('admin/dashboard') }}">Dashboard</a>
	  	/ Brand /
	  </p>
	</div>
</div>
<div class="br-pagebody">
    <div class="br-section-wrapper">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
      <div class="table-wrapper table-responsive">
        <table id="datatable3" class="table display nowrap">
          <thead>
            <tr>
              <th class="">#</th>
              <th class="">Brand name</th>
              <th class="">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($data['brands'] as $data)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $data->name }}</td>
                    <td>
                        <a href="{{ url('/admin/brand/edit/'.$data->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ url('/admin/brand/delete/'.$data->id) }}" onclick="return confirm('Are you sure delete this information.')" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div><!-- table-wrapper -->

    </div><!-- br-section-wrapper -->
  </div><!-- br-pagebody -->
@endif
@if ($data['page'] == 'create')
<div class="br-pagetitle">
	<i class="icon ion-android-list"></i>
	<div>
	  <h4>Create Brand</h4>
	  <p class="mg-b-0">
	  	<a href="{{ url('admin/dashboard') }}">Dashboard</a>
	  	/ <a href="{{ url('admin/brand/manage') }}">Brand</a> / Create
	  </p>
	</div>
</div>
<div class="br-pagebody">
    <div class="br-section-wrapper">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
      <div class="row">
      	<div class="col-md-12">
      		<form action="{{ url('admin/brand/store') }}" method="POST" enctype="multipart/form-data">
      			@csrf
      			<div class="form-group">
      				<label for="">Name</label>
      				<input type="text" name="name" value="" class="form-control" placeholder="Brand name" required>
	  				@if ($errors->has('name'))
	  					<div class="text-danger">{{ $errors->first('name') }}</div>
	  				@endif
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
@endif
@if ($data['page'] == 'edit')
<div class="br-pagetitle">
	<i class="icon ion-android-list"></i>
	<div>
	  <h4>Edit Brand</h4>
	  <p class="mg-b-0">
	  	<a href="{{ url('admin/dashboard') }}">Dashboard</a>
	  	/ <a href="{{ url('admin/brand/manage') }}">Brand</a> / Edit
	  </p>
	</div>
</div>
<div class="br-pagebody">
    <div class="br-section-wrapper">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
      <div class="row">
      	<div class="col-md-12">
      		<form action="{{ url('admin/brand/update/'.$brand->id) }}" method="POST">
      			@csrf
      			<div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ $brand->name }}" class="form-control" placeholder="Brand name" required>
                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
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
@endif
@endsection
