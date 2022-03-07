
                                <div class="product-default">
                                    <figure>
                                        <a href="{{ url('products/details/' . $product->id) }}">
                                            <img src="{{url('products/' . json_decode($product->images)[0])}}" width="280" height="280" alt="product" />
                                        </a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="category.html" class="product-category">{{$product->category ? $product->category->name : ''}}</a>
                                            </div>
                                        </div>

                                        <h3 class="product-title"> <a href="{{ url('products/details/' . $product->id ) }}">{{ $product->name }}</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="old-price">MMK{{ $product->discount_price }}</span>
                                            <span class="product-price">MMK{{ $product->price }}</span>
                                        </div>
                                        <!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
                                            <a href="{{ url('order/add-to-cart/' . $product->id) }}" class="btn-icon btn-add-cart"><i
													class="fa fa-arrow-right"></i><span>ADD TO CART</span></a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>