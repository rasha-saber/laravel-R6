<section class="featured-product section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="mb-5">Featured Products</h2>
                    </div>
                    @foreach($products as $Product)
                    <div class="col-lg-4 col-12 mb-3">
                        <div class="product-thumb">
                            <a href="product-detail.html">
                                <img src="{{asset('assets/images/' . $Product->image) }}" class="img-fluid product-image" alt="">
                            </a>

                            <div class="product-top d-flex">
                                <span class="product-alert me-auto">New Arrival</span>

                                <a href="#" class="bi-heart-fill product-icon"></a>
                            </div>

                            <div class="product-info d-flex">
                                <div>
                                    <h5 class="product-title mb-0">
                                        <a href="product-detail.html" class="product-title-link">{{ $Product->title }}</a>
                                    </h5>

                                    <p class="product-p">{{ $Product->short_description }}</p>
                                </div>

                                <small class="product-price text-muted ms-auto mt-auto mb-5">${{ $Product->price }}</small>
                            </div>
                            <!-- <div class="product-actions mt-2">
                                <td><a href="{{route('products.edit', $Product['id'])}}">Edit</a></td>
                            </div> -->
                        </div>
                    </div>
                    @endforeach


                    <div class="col-12 text-center">
                        <a href="products.html" class="view-all">View All Products</a>
                    </div>

                </div>
            </div>
        </section>