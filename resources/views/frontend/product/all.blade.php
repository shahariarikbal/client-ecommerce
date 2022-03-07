@extends('frontend.master')

@section('title')
    Products
@endsection

@section('page-css')
<style>
</style>
	
@endsection

@section('content')

<main class="main">

        <form action="{{ url('products/all') }}">
            <div class="container">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All</li>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-lg-9 main-content">
                        <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                            <div class="toolbox-left">
                                <a href="#" class="sidebar-toggle">
                                    <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
										<line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
										<line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
										<line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
										<line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
										<line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
										<line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
										<path
											d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
											class="cls-2"></path>
										<path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
										<path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
										<path
											d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
											class="cls-2"></path>
									</svg>
                                    <span>Filter</span>
                                </a>

                                <div class="toolbox-item toolbox-sort">
                                    <label>Sort By:</label>

                                    <div class="select-custom">
                                        <select name="orderBy" class="form-control">
											<option value="default" selected="selected">Default sorting</option>
											<option value="asc"
												@if (Request::get('orderBy') == 'asc')
													{{ 'selected' }}
												@endif
											>Sort by price: low to high</option>
											<option value="desc"
												@if (Request::get('orderBy') == 'desc')
													{{ 'selected' }}
												@endif
											>Sort by price: high to low</option>
										</select>
                                    </div>
                                    <!-- End .select-custom -->


                                </div>
                                <!-- End .toolbox-item -->
                            </div>
                            <!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show">
                                    <label>Show:</label>

                                    <div class="select-custom">
                                        <select name="count" class="form-control">
											<option value="12">12</option>
										</select>
                                    </div>
                                    <!-- End .select-custom -->
                                </div>
                                <!-- End .toolbox-item -->

                                <div class="toolbox-item layout-modes">
                                    <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                                        <i class="icon-mode-grid"></i>
                                    </a>
                                    <a href="category-list.html" class="layout-btn btn-list" title="List">
                                        <i class="icon-mode-list"></i>
                                    </a>
                                </div>
                                <!-- End .layout-modes -->
                            </div>
                            <!-- End .toolbox-right -->
                        </nav>

                        <div class="row">
                        	@foreach ($products as $product)
                            <div class="col-6 col-sm-4">
                                @include('frontend.product.includes.product-card', ['product' => $product])
                            </div>
                        	@endforeach
                            <!-- End .col-sm-4 -->
                        </div>
                        <!-- End .row -->

                        <nav class="toolbox toolbox-pagination">
                            <div class="toolbox-item toolbox-show">
                                <label>Show:</label>

                                <div class="select-custom">
                                    <select name="count" class="form-control">
										<option value="12">12</option>
									</select>
                                </div>
                                <!-- End .select-custom -->
                            </div>


                            <ul class="pagination toolbox-item">
                                {{-- <li class="page-item"><a class="page-link" href="#">2</a></li> --}}
                                {{ $products->links() }}
                            </ul>
                        </nav>
                    </div>
                    <!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>
                    @include('frontend.product.includes.filter')
                    <!-- End .col-lg-3 -->
                </div>
                <!-- End .row -->
            </div>
        </form>
</main>
@endsection



@section('page-js')

<script src="{{ asset('frontend/assets/js/nouislider.min.js') }}"></script>
<script>

	window.addEventListener('load', function() {
	    
                    var e = document.getElementById("price-slider");
                    start_min = {{ Request::filled('min')? Request::get('min') : 0 }}
                    start_max = {{ Request::filled('max')? Request::get('max') : DB::table('products')->max('price') }}
                    var price_min = 0;
                    var price_max = 0;
                    null != e &&
                        (noUiSlider.create(e, { start: [start_min, start_max], connect: !0, step: 100, margin: 100, range: { min: 0, max: {{ DB::table('products')->max('price') }} } }),
                        e.noUiSlider.on("update", function (e, i) {
                            price_min = e[0];
                            price_max = e[1];
                            e = e.map(function (t) {
                                return "$" + parseInt(t);
                            });
                            $("#filter-price-range").text(e.join(" - "));
                            document.querySelector('#price_min').value = price_min;
                            document.querySelector('#price_max').value = price_max;
                        }));
	})
</script>
@endsection
