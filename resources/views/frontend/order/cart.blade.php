@extends('frontend.master')

@section('title')
    Cart
@endsection

@section('page-css')

<style>
	
</style>
@endsection

@section('content')

		<main class="main">
			<div class="container">
				<ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
					<li class="active">
						<a href="{{ url('/') }}">Home</a>
					</li>
					<li>
						<a href="{{ url('products/all') }}">All Products</a>
					</li>
					<li class="">
						<a href="{{ url('cart') }}">Cart</a>
					</li>
				</ul>

				<div class="row">
					<div class="col-lg-8">
						<div class="cart-table-container">
							<form action="{{ url('order/cart/update') }}" method="POST">
								@csrf
								
								<table class="table table-cart">
									<thead>
										<tr>
											<th class="thumbnail-col"></th>
											<th class="product-col">Product</th>
											<th class="price-col">Price</th>
											<th class="qty-col">Quantity</th>
											<th class="text-right">Subtotal</th>
										</tr>
									</thead>
									<tbody>
			                            @php
			                                $total = 0;
			                            @endphp
										@php
											
				                            $cartProducts = App\Models\CartOrderProduct::where('type', 'cart')
	                                                    ->where('user_ip', request()->ip())
	                                                    ->get();
										@endphp		

										@foreach ($cartProducts as $cartProduct)
										<tr class="product-row">
											<td>
												<figure class="product-image-container">
													<a href="product.html" class="product-image">

			                                            @if ($cartProduct->product && count(json_decode($cartProduct->product->images )) > 0)
			                                                <img src="{{ asset('/products/' . json_decode($cartProduct->product->images )[0] ) }}" alt="product">
			                                            @endif
														{{-- <img src="assets/images/products/product-4.jpg" alt="product"> --}}
													</a>


	                                        		<a href="{{ url('order/cart/remove/' . $cartProduct->id  ) }}" class="btn-remove" title="Remove Product"><span>×</span></a>
												</figure>
											</td>
											<td class="product-col">
												<h5 class="product-title">
		                                            @if ($cartProduct->product)
		                                            <a href="{{ url('products/details/' . $cartProduct->product->id) }}">{{ $cartProduct->product->name }}</a>
		                                            @endif
												</h5>
											</td>
											<td>MMK {{ $cartProduct->price }}</td>
											<td>
												<div class="product-single-qty">
													<input type="hidden" name="carts[]" value="{{ $cartProduct->id }}">
													<input class="horizontal-quantity form-control" type="text" name="qtys[]" value="{{ $cartProduct->qty }}">
												</div><!-- End .product-single-qty -->
											</td>
											<td class="text-right"><span class="subtotal-price">MMK {{ $cartProduct->total }}</span></td>
										</tr>

		                                @php
		                                    $total += $cartProduct->total;
		                                @endphp
										@endforeach
									</tbody>


									<tfoot>
										<tr>
											<td colspan="5" class="clearfix">
												<div class="float-right">
													<button type="submit" class="btn btn-shop btn-update-cart">
														Update Cart
													</button>
												</div><!-- End .float-right -->
											</td>
										</tr>
									</tfoot>
								</table>

							</form>
						</div><!-- End .cart-table-container -->
					</div><!-- End .col-lg-8 -->

					<div class="col-lg-4">
						<div class="cart-summary">
							<h3>CART TOTALS</h3>

							<table class="table table-totals">
								<tbody>
									<tr>
										<td>Subtotal</td>
										<td>MMK {{ $total }}</td>
									</tr>
								</tbody>

								<tfoot>
									<tr>
										<td>Total</td>
										<td>MMK {{ $total }}</td>
									</tr>
								</tfoot>
							</table>

							<div class="checkout-methods">
								<a href="{{ url('/order/checkout') }}" class="btn btn-block btn-dark">Proceed to Checkout
									<i class="fa fa-arrow-right"></i></a>
							</div>
						</div><!-- End .cart-summary -->
					</div><!-- End .col-lg-4 -->
				</div><!-- End .row -->
			</div><!-- End .container -->

			<div class="mb-6"></div><!-- margin -->
		</main><!-- End .main -->
@endsection



@section('page-scripts')
<script>
	
</script>
@endsection
