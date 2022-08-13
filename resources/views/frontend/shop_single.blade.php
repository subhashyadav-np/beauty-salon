@extends('layouts.frontend', [
    $title = $productData->title,
    $metaKey = "jimee beauty salon, beauty salon, beauty parlor, lalitpur nepal, kathmandu nepal, beauty salon in lalitpur, beauty parlor in kathmandu, best beauty shop, best beauty shop in lalitpur",
    $metaDesc = "Jimee Beauty Salon has the high professional Beautician as well as products that really has the successful story and feedback."
    ])


@section('content')
<main class="section-bg2 pb-90 pt-120">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="shop-wrap">
                    <div class="product-details mb-60">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product-single-img">
                                    <img id="img_01" style="max-width:100%; max-height:100%;" src="{{ asset('images/products/' .$productData->cover) }}"
                                        data-zoom-image="{{ asset('assets/img/media/product-details-large.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-details-content">
                                    <div class="price-review d-flex align-items-center">
                                        <div class="price">Rs
                                            @if ($productData->discount == NULL)
                                                {{ $productData->price }}
                                            @else
                                                <small class="text-dark"><strike>{{ $productData->price }}</strike></small>&nbsp;{{ $productData->price - ($productData->price * $productData->discount)/100 }} <small class="text-dark">({{$productData->discount}}% off)</small>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="star-rating"><i class="fas fa-star"></i> <i
                                                    class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                                    class="fas fa-star"></i> <i class="fas fa-star"></i></div>
                                            {{--<p>13 Review</p>--}}
                                        </div>
                                    </div>
                                    <h2 class="product_title">{{ $productData->title }}</h2>
                                    <div style="word-wrap: break-word;">
                                        <p>{!! $productData->description !!}</p>
                                    </div>
                                    <div class="availability">
                                        <h5 class="py-3">
                                            @if ($productData->status == "in-stock")
                                                Available In Stock
                                            @else
                                                <span class="text-danger">Out Of Stock</span>
                                            @endif
                                        </h5>
                                    </div>
                                    <form class="cart" action="#" method="post">
                                        <div class="d-inline-flex align-items-sm-center flex-column flex-sm-row mb-4">
                                            <div class="quantity">
                                                <div class="d-flex align-items-center mb-3 mb-sm-0">
                                                    <h5>Need This?</h5>
                                                    {{--<div class="input-group"><span class="minus"><img
                                                                src="{{asset('assets/img/icon/minus.svg')}}" alt="" class="svg">
                                                        </span><input type="number" class="form-control" value="01">
                                                        <span class="plus"><img src="{{asset('assets/img/icon/plus2.svg')}}"
                                                                alt="" class="svg"></span>
                                                    </div>--}}
                                                </div>
                                            </div>
                                            <a href="tel:98065688" class="single_add_to_cart_button btn">
                                                <span>
                                                    @if ($productData->status == "in-stock")
                                                        Call To Buy
                                                    @else
                                                        <span class="text-danger">Oreder To Make Available</span>
                                                    @endif
                                                </span>
                                                <img src="{{asset('assets/img/icon/btn-arrow.svg')}}" alt="" class="svg">
                                            </a>
                                        </div>
                                    </form>
                                    <div class="categories mb-2">
                                        <h5>Categories:</h5>
                                        <a href="#">{{$productData->catMainname}} @if ($productData->catMainname != NULL) , @endif {{ $productData->catname }}</a>
                                    </div>
                                    <div class="tags">
                                        <h5>Tag:</h5> {{$productData->keywords}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="row">
                <div class="releted-product pt-100">
                    <h3 class="related-product-title">Related Products</h3>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-product">
                                <div class="product-top"><a href="shop-details.html" class="product-thumbnail"><img
                                            src="assets/img/media/product1.png" data-rjs="2" alt=""></a>
                                    <div class="buttons"><a href="#" class="btn-circle"><img
                                                src="assets/img/icon/love.svg" alt="" class="svg"> </a><a href="#"
                                            class="btn-circle"><img src="assets/img/icon/compare.svg" alt=""
                                                class="svg"> </a><a href="#" class="btn-circle"><img
                                                src="assets/img/icon/cart.svg" alt="" class="svg"></a></div>
                                </div>
                                <div class="product-summary">
                                    <div class="star-rating"><i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                            class="fas fa-star"></i></div><a href="shop-details.html">
                                        <h4>Nourishing Shampoo</h4>
                                    </a><span class="price"><span class="woocommerce-Price-amount amount"><span
                                                class="woocommerce-Price-currencySymbol">$</span>
                                            240.00</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-product">
                                <div class="product-top"><a href="shop-details.html" class="product-thumbnail"><img
                                            src="assets/img/media/product2.png" data-rjs="2" alt=""></a>
                                    <div class="buttons"><a href="#" class="btn-circle"><img
                                                src="assets/img/icon/love.svg" alt="" class="svg"> </a><a href="#"
                                            class="btn-circle"><img src="assets/img/icon/compare.svg" alt=""
                                                class="svg"> </a><a href="#" class="btn-circle"><img
                                                src="assets/img/icon/cart.svg" alt="" class="svg"></a></div>
                                </div>
                                <div class="product-summary">
                                    <div class="star-rating"><i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                            class="fas fa-star"></i></div><a href="shop-details.html">
                                        <h4>Oil Body Lotions</h4>
                                    </a><span class="price"><span class="woocommerce-Price-amount amount"><span
                                                class="woocommerce-Price-currencySymbol">$</span>
                                            229.00</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-product">
                                <div class="product-top"><a href="shop-details.html" class="product-thumbnail"><img
                                            src="assets/img/media/product3.png" data-rjs="2" alt=""></a>
                                    <div class="buttons"><a href="#" class="btn-circle"><img
                                                src="assets/img/icon/love.svg" alt="" class="svg"> </a><a href="#"
                                            class="btn-circle"><img src="assets/img/icon/compare.svg" alt=""
                                                class="svg"> </a><a href="#" class="btn-circle"><img
                                                src="assets/img/icon/cart.svg" alt="" class="svg"></a></div>
                                </div>
                                <div class="product-summary">
                                    <div class="star-rating"><i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                            class="fas fa-star"></i></div><a href="shop-details.html">
                                        <h4>Forte Hydro Beauty</h4>
                                    </a><span class="price"><span class="woocommerce-Price-amount amount"><span
                                                class="woocommerce-Price-currencySymbol">$</span>
                                            129.00</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>
</main>
@endsection