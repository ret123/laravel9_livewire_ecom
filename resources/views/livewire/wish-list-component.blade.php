<div>
        <style>
                .wishlisted {
                    background-color: #f15412 !important;
                    border: 1px solid transparent !important;
                }
                .wishlisted i {
                    color: #fff;
                }
                .product-cart-wrap .product-action-1 a.action-btn:after {

                    left: -64%;
                }
            </style>
            <main class="main">
                <div class="page-header breadcrumb-wrap">
                    <div class="container">
                        <div class="breadcrumb">
                            <a href="{{route('home.index')}}" rel="nofollow">Home</a>
                            <span></span> Wishlist
                        </div>
                    </div>
                </div>
                <section class="mt-50 mb-50">
                    <div class="container">
                        <div class="row product-grid-4">
                                @foreach(Cart::instance('wishlist')->content() as $item)
                                <div class="col-lg-3 col-md-3 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('product.details',$item->model->slug)}}">
                                                    <img class="default-img"
                                                        src="{{asset('assets/imgs/shop/product-')}}{{$item->model->id}}-1.jpg"
                                                        alt="">
                                                    <img class="hover-img"
                                                        src="{{asset('assets/imgs/shop/product-')}}{{$item->model->id}}-2.jpg"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                    <i class="fi-rs-search"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                    href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i
                                                        class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop.html">{{$item->model->category_name}}</a>
                                            </div>
                                            <h2><a href="{{route('product.details',$item->model->slug)}}">{{$item->model->name}}</a>
                                            </h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>90%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                @if($item->model->sale_price == NULL)
                                                <span>{{$item->model->regular_price}} </span>
                                                @else
                                                <span>{{$item->model->sale_price}} </span>
                                                <span class="old-price">{{$item->model->regular_price}} </span>
                                                @endif
                                            </div>
                                            <div class="product-action-1 show">
                                               
                                                <a aria-label="Remove from Wishlist" class="action-btn hover-up wishlisted"
                                                href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})"><i class="fi-rs-heart"></i></a>
                                                                                                                                             
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </section>
            </main>
</div>