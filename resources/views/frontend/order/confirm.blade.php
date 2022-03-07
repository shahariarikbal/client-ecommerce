@extends('frontend.master')

@section('title')
    Home
@endsection

@section('page-css')
<style>
	
</style>
@endsection

@section('content')

<main class="main">

	<div class="category-banner-container bg-gray">
		<div class="category-banner banner text-uppercase" style="background: no-repeat 60%/cover url('{{ asset('frontend/assets/images/elements/page-header.jpg') }}');">
			<div class="container position-relative">
				<nav aria-label="breadcrumb" class="breadcrumb-nav text-white">
					<ol class="breadcrumb justify-content-center">
						<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Order</li>
						<li class="breadcrumb-item active" aria-current="page">Complete</li>
					</ol>
				</nav>
				<h1 class="page-title text-center text-white">Order Confirmation</h1>
			</div>
		</div>
	</div>
	<div class="container cta">
				<div class="mt-5" style="margin-bottom: 90px;">
					<div class="cta-simple cta-border">
						<h3 class="font-weight-normal">Your order is successful. Your order number is <b>#{{ $order->invoice_no }}</b>.</h3>
						<p><b>Thank You</b> For Ordering With Us</p>
						<div class="btn btn-lg btn-primary mt-2" style="cursor: pointer" onclick="location.href='{{ url('products/all') }}'">Buy Now!</div>
					</div>
				</div>
			</div>
</main>
@endsection



@section('page-scripts')
<script>
	
</script>
@endsection
