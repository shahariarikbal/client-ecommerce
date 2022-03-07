@extends('backend.master')

@section('title')
    Order
@endsection

@section('content')
@if ($data['page'] == 'index')
<div class="br-pagetitle">
	<i class="icon ion-android-list"></i>
	<div>
	  <h4>Manage Order</h4>
	  <p class="mg-b-0">
	  	<a href="{{ url('admin/dashboard') }}">Dashboard</a>
	  	/ Order /
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
              <th class="text-capitalize">invoice no</th>
              <th class="text-capitalize">user</th>
              <th class="text-capitalize">name</th>
              <th class="text-capitalize">email</th>
              <th class="text-capitalize">phone</th>
              <th class="text-capitalize">address</th>
              <th class="text-capitalize">city</th>
              <th class="text-capitalize">zip</th>
              <th class="text-capitalize">country</th>
              <th class="text-capitalize">total</th>
              <th class="">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($data['orders'] as $order)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $order->invoice_no }}</td>
                    <td>{{ $order->user? $order->user->name : 'n/a' }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->zip }}</td>
                    <td>{{ $order->country }}</td>
                    <td>{{ $order->total }}</td>
                    <td>
                        <a class="btn btn-sm btn-info text-white" style="cursor: pointer" data-toggle="modal" data-target="#order{{ $order->id }}">View Products</a>
                        <a href="{{ url('/admin/order/delete/'.$order->id) }}" onclick="return confirm('Are you sure delete this information.')" class="btn btn-sm btn-danger">Delete</a>



						<!-- Modal -->
						<div class="modal fade" id="order{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Order #{{ $order->invoice_no }}</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        
									<table class="table">
									  <thead class="thead-light">
									    <tr>
									      <th scope="col">#</th>
									      <th scope="col text-capitalize">product id</th>
									      <th scope="col text-capitalize">qty</th>
									      <th scope="col text-capitalize">price</th>
									      <th scope="col text-capitalize">total</th>
									    </tr>
									  </thead>
									  <tbody>
									  	@foreach ($order->orderProducts as $orderProduct)
										    <tr>
										      <th scope="row">{{ $loop->index+1 }}</th>
										      <td>{{ $orderProduct->product ?$orderProduct->product->name : ''  }}</td>
										      <td>{{ $orderProduct->qty }}</td>
										      <td>{{ $orderProduct->price }}</td>
										      <td>{{ $orderProduct->total }}</td>
										    </tr>
									  	@endforeach
									   </tbody>
									</table>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>
                    </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div><!-- table-wrapper -->

    </div><!-- br-section-wrapper -->
  </div><!-- br-pagebody -->
@endif
@endsection
