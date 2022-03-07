
                    <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                        <div class="sidebar-wrapper">
                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Categories</a>
                                </h3>

                                <div class="collapse show" id="widget-body-2">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                        	@foreach (App\Models\Category::where('cat_id', null)->get() as $category)
                                            <li>
                                                <a href="#widget-category-{{ $category->id }}" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="widget-category-{{ $category->id }}">
													{{ $category->name }}<span class="products-count"></span>
													<span class="toggle"></span>
												</a>
												@if ($category->subcategories->count() > 0)
                                                <div class="collapse show" id="widget-category-{{ $category->id }}">
                                                    <ul class="cat-sublist">
                                                    	@foreach ($category->subcategories as $subc)
                                                        	<li><input type="checkbox" name="cat_ids[]" value="{{ $subc->id }}" {{ Request::filled('cat_ids') && in_array($subc->id, Request::get('cat_ids')) ? 'checked' : ''}} > {{ $subc->name }}</li>
                                                    	@endforeach
                                                    </ul>
                                                </div>
												@endif
                                            </li>
                                        	@endforeach
                                        </ul>
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#brands" role="button" aria-expanded="true" aria-controls="brands">Brands</a>
                                </h3>

                                <div class="collapse show" id="brands">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                        	@foreach (App\Models\Brand::get() as $brand)
                                            <li>
                                                	<input type="checkbox" name="brand_ids[]" {{ Request::filled('brand_ids') && in_array($brand->id, Request::get('brand_ids')) ? 'checked' : ''}} value="{{ $brand->id }}"> 
													{{ $brand->name }}<span class="products-count"></span>
                                            </li>
                                        	@endforeach
                                        </ul>
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <!-- End .widget -->

                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Price</a>
                                </h3>

                                <div class="collapse show" id="widget-body-3">
                                    <div class="widget-body pb-0">
                                            <div class="price-slider-wrapper">
                                                <div id="price-slider"></div>
                                                <!-- End #price-slider -->
                                            </div>
                                            <!-- End .price-slider-wrapper -->

                                            <div class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="filter-price-text">
                                                    Price:
                                                    <span id="filter-price-range"></span>
                                                    <input type="hidden" id="price_min" name="min" value="0">
                                                    <input type="hidden" id="price_max" name="max" value="0">
                                                </div>
                                                <!-- End .filter-price-text -->

                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </div>
                                            <!-- End .filter-price-action -->
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <!-- End .widget -->

                            <div class="widget widget-color">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true" aria-controls="widget-body-4">Clear Filter</a>
                                </h3>

                                <div class="collapse show" id="widget-body-4">
                                    <div class="widget-body pb-0">
                                        <a href="{{ Request::url() }}" class="btn btn-primary mt-2 text-white" style="padding: 5px 20px; font-weight: 600">Clear</a>
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .sidebar-wrapper -->
                    </aside>