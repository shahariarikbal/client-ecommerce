@extends('frontend.master')

@section('title')
    Checkout
@endsection

@section('page-css')
<style>
	
</style>
@endsection

@section('content')

		<main class="main">
			<div class="container checkout-container">
				<ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
					<li class="active">
						<a href="{{ url('products/all') }}">All Products</a>
					</li>
					<li class="">
						<a href="{{ url('cart') }}">Cart</a>
					</li>
					<li class="">
						<a href="{{ url('checkout') }}">Checkout</a>
					</li>
				</ul>





                @php
                    $total = 0;
                @endphp
				@php
					
                    $cartProducts = App\Models\CartOrderProduct::where('type', 'cart')
                                ->where('user_ip', request()->ip())
                                ->get();
				@endphp

				@foreach ($cartProducts as $cartProduct)
                    @php
                        $total += $cartProduct->total;
                    @endphp
				@endforeach

                <div class="row">
                    <div class="col-lg-7">
                        <ul class="checkout-steps">
                            <li>
                                <h2 class="step-title">Billing details</h2>

                                <form action="{{ url('order/store') }}" id="checkout-form" method="POST">
                                	@csrf

                                	<input type="hidden" name="total" value="{{ $total }}">

                                    <div class="form-group">
                                        <label class="text-capitalize">name
                                            <abbr class="required" title="required">*</abbr>
                                        </label>
                                        <input name="name" value="{{ Auth::user()->name }}" type="text" class="form-control" required />
                                    </div>
                                	
                                    <div class="form-group">
                                        <label class="text-capitalize">email
                                            <abbr class="required" title="required">*</abbr>
                                        </label>
                                        <input name="email" value="{{ Auth::user()->email }}" type="email" class="form-control" required />
                                    </div>
                                	
                                    <div class="form-group">
                                        <label class="text-capitalize">phone
                                            <abbr class="required" title="required">*</abbr>
                                        </label>
                                        <input name="phone" value="{{ Auth::user()->phone }}" type="text" class="form-control" required />
                                    </div>
                                	
                                    <div class="form-group">
                                        <label class="text-capitalize">address
                                            <abbr class="required" title="required">*</abbr>
                                        </label>
                                        <input name="address" value="{{ Auth::user()->address }}" type="text" class="form-control" required />
                                    </div>
                                	
                                    <div class="form-group">
                                        <label class="text-capitalize">city
                                            <abbr class="required" title="required">*</abbr>
                                        </label>
                                        <input name="city" value="{{ Auth::user()->city }}" type="text" class="form-control" required />
                                    </div>
                                	
                                    <div class="form-group">
                                        <label class="text-capitalize">zip
                                            <abbr class="required" title="required">*</abbr>
                                        </label>
                                        <input name="zip" value="{{ Auth::user()->zip }}" type="text" class="form-control" required />
                                    </div>
                                	
                                    <div class="form-group">
                                        <label class="text-capitalize">country
                                            <abbr class="required" title="required">*</abbr>
                                        </label>
                                        <input name="country" value="{{ Auth::user()->country }}" type="text" class="form-control" required />
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- End .col-lg-8 -->

                    <div class="col-lg-5">
                        <div class="order-summary">
                            <h3>YOUR ORDER</h3>

                            <table class="table table-mini-cart">
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <td>
                                            <h4>Subtotal</h4>
                                        </td>

                                        <td class="price-col">
                                            <span>MMK {{ $total }}</span>
                                        </td>
                                    </tr>
                                    <tr class="order-shipping">
                                        <td class="text-left" colspan="2">
                                            <h4 class="m-b-sm">Shipping</h4>

                                            <div class="form-group form-group-custom-control">
                                                <div class="custom-control custom-radio d-flex">
                                                    <input type="radio" class="custom-control-input" name="radio" checked />
                                                    <label class="custom-control-label">Cash On Delivery</label>
                                                </div>
                                                <!-- End .custom-checkbox -->
                                            </div>
                                            <!-- End .form-group -->
                                        </td>

                                    </tr>

                                    <tr class="order-total">
                                        <td>
                                            <h4>Total</h4>
                                        </td>
                                        <td>
                                            <b class="total-price"><span>MMK {{ $total }}</span></b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="payment-methods">
                                <h4 class="">Payment methods</h4>
                                <div class="info-box with-icon p-0">
                                    <p>
                                        Please contact us if you require assistance or wish to make alternate arrangements.
                                    </p>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-dark btn-place-order" form="checkout-form">
                                Place order
                            </button>
                        </div>
                        <!-- End .cart-summary -->
                    </div>
                    <!-- End .col-lg-4 -->
                </div>
			</div><!-- End .container -->

			<div class="mb-6"></div><!-- margin -->
		</main><!-- End .main -->
@endsection



@section('page-scripts')
<script>
	
</script>
@endsection
