@extends('layouts.frontend', [
    $title = "Our Shop",
    $metaKey = "jimee beauty salon, beauty salon, beauty parlor, lalitpur nepal, kathmandu nepal, beauty salon in lalitpur, beauty parlor in kathmandu, best beauty shop, best beauty shop in lalitpur",
    $metaDesc = "Jimee Beauty Salon has the high professional Beautician as well as products that really has the successful story and feedback."
    ])

@section('content')
<section class="pt-120 pb-120">
    <div class="container">
        <div class="row">
            @foreach ($productData as $item)
            <div class="col-lg-3 col-sm-6">
                <div class="single-product">
                    <div class="product-top">
                        <a href="{{route('shop_single',['slug'=>$item->slug])}}" class="product-thumbnail">
                            <div class="products-img-div">
                                <img src="{{ asset('images/products/' .$item->cover) }}" data-rjs="2" alt="">
                            </div>
                        </a>
                        <div class="buttons">
                            <a href="{{route('shop_single',['slug'=>$item->slug])}}" class="btn-circle"><i class="fa fa-bars svg" style="color: #fff"></i></a>
                            <a href="tel:9809636934" class="btn-circle"><i class="fa fa-phone svg" style="color: #fff"></i></a>
                        </div>
                    </div>
                    <div class="product-summary">
                        <div class="star-rating"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                        </div><a href="{{route('shop_single',['slug'=>$item->slug])}}">
                            <h4>{{ $item->title }}</h4>
                        </a><span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"> <span style="color: #f81781">Rs</span>&nbsp;</span> 
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
        {{--<div class="row">
            <div class="col-12">
                <div class="pagination text-left">
                    <ul class="list-inline d-flex align-items-center">
                        <li><a href="#"><img src="{{ asset('assets/img/icon/long-arrow-left.svg') }}" alt="" class="svg"></a></li>
                        <li><span class="page-numbers current">1</span></li>
                        <li><a class="page-numbers" href="#">2</a></li>
                        <li><a class="page-numbers" href="#">3</a></li>
                        <li><a href="#"><img src="{{ asset('assets/img/icon/long-arrow-right.svg') }}" alt="" class="svg"></a></li>
                    </ul>
                </div>
            </div>
        </div>--}}
    </div>
</section>
@endsection