@extends('layouts.frontend', [
    $title = "Home",
    $metaKey = "jimee beauty salon, beauty salon, beauty parlor, lalitpur nepal, kathmandu nepal, beauty salon in lalitpur, beauty parlor in kathmandu, best beauty shop, best beauty shop in lalitpur",
    $metaDesc = "Jimee Beauty Salon has the high professional Beautician as well as products that really has the successful story and feedback."
    ])

@section('content')

    <div class="banner">
        <div class="banner-slider owl-carousel">
            @foreach ($HomeBanners as $item)
            <div class="banner-single-slide" data-bg-img="{{ asset('images/homepage/' .$item->banner) }}">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="banner-content">
                                <h4>{{$item->small_title}}</h4>
                                <h1>{{$item->main_title}}</h1>
                                <p>
                                    {{$item->paragraph}}
                                </p>
                                <a href="{{ route('appointment') }}" class="btn"><span>Appointment</span>
                                    <img src="assets/img/icon/btn-arrow.svg" alt="" class="svg" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <section class="pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="assets/img/media/about.png" data-rjs="2" alt="" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title style--two">
                            <span class="subtitle">About {{ config('app.name') }}</span>
                            <h2>10+ Years Work<br />Experiences</h2>
                            <p>
                                After owning two successful salon locations they decided<br />to
                                move their passion to the small town. Lorem ipsum dolor sit amet consectetur adipisicing elit. In, perferendis. Eos accusamus reiciendis quis suscipit aut adipisci natus libero nulla autem deleniti? Fugit atque quos temporibus eos minus porro possimus!
                            </p>
                        </div>
                        <a href="{{ route('aboutpage') }}" class="btn"><span>About US</span>
                            <img src="assets/img/icon/btn-arrow.svg" alt="" class="svg" /></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.inc.services')
    <section class="shop-category pb-120">
        <div class="shop-category-carousel owl-carousel bt-carousel" data-owl-autoplay="true" data-owl-items="3"
            data-owl-margin="30" data-owl-nav="true"
            data-owl-responsive='{"0": {"items": "1"}, "540": {"items": "2"}, "992": {"items": "3"}}'>
            @foreach ($ProuctParentCats as $item)
            <div class="shop-category-single">
                <div class="product-cats-img-div">
                    <img src="{{ asset('images/products/category/' .$item->cover) }}" data-rjs="2" alt="" />
                </div>
                <div class="content">
                    <h2>{{ $item->name }}</h2>
                    <a href="{{ route('shop_by_cat', ['slug'=>$item->slug]) }}" class="btn btn-white"><span>View products</span>
                        <img src="assets/img/icon/btn-arrow.svg" alt="" class="svg" /></a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    {{--@include('frontend.inc.pricing')--}}
    {{--@include('frontend.inc.video')--}}
    @include('frontend.inc.team')
    <section class="testimonial pt-120 pb-120" data-bg-img="assets/img/bg/testimonial-bg.png">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="section-title">
                        <span class="subtitle">Clients</span>
                        <h2>Clients Say</h2>
                        <p>
                            After owning two successful locations Beauty move there passion.
                        </p>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="testimonial-carousel owl-carousel bt-carousel" data-owl-margin="30" data-owl-nav="true"
                        data-owl-autoplay="false"
                        data-owl-responsive='{"0": {"autoWidth": false, "items": 1}, "420": {"autoWidth": true}}'>
                        @foreach ($Testimonials as $item)
                        <div class="single-testimonial-carousel">
                            <div class="avatar">
                                <img src="{{ asset('images/testimonials/' . $item->avatar) }}" alt="" />
                            </div>
                            <div class="content">
                                <h4>
                                    {{ $item->review }}
                                </h4>
                                <div class="meta-info">
                                    <h3>{{ $item->name }}</h3>
                                    <p>Customer</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-120 pb-90">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <div class="section-title">
                        <span class="subtitle">Products</span>
                        <h2>Latest Product</h2>
                        <p>
                            After owning two successful salon locations they decided<br />to
                            move their passion to the small town.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 text-lg-end">
                    <a href="{{route('shoppage')}}" class="btn mb-60 res-mt"><span>See all Products</span>
                        <img src="assets/img/icon/btn-arrow.svg" alt="" class="svg" /></a>
                </div>
            </div>
            <div class="row">
                @foreach ($latestProduct as $item)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-product">
                            <div class="product-top">
                                <a href="{{route('shop_single',['slug'=>$item->slug])}}" class="product-thumbnail">
                                    <div class="products-img-div">
                                    <img src="{{ asset('images/products/' .$item->cover) }}"
                                        data-rjs="2" alt="" />
                                    </div></a>
                                <div class="buttons">
                                    <a href="{{route('shop_single',['slug'=>$item->slug])}}" class="btn-circle"><i class="fa fa-bars svg" style="color: #fff"></i></a>
                                    <a href="tel:9809636934" class="btn-circle"><i class="fa fa-phone svg" style="color: #fff"></i></a>
                                </div>
                            </div>
                            <div class="product-summary">
                                <div class="star-rating">
                                    <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <a href="shop-details.html">
                                    <h4>{{$item->title}}</h4>
                                </a><span class="price"><span class="woocommerce-Price-amount amount"><span
                                            class="woocommerce-Price-currencySymbol">
                                            <span style="color: #f81781">Rs</span>&nbsp;</span> 
                                            @if ($item->discount == NULL)
                                                <span style="color: #f81781;">{{ $item->price }}</span>
                                            @else
                                                <strike>{{ $item->price }}</strike>&nbsp;<span style="color: #f81781;">{{ $item->price - ($item->price * $item->discount)/100 }}</span>&nbsp;<small>({{$item->discount}}% off)</small>
                                            @endif
                                        </span></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
