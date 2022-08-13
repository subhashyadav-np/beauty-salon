@extends('layouts.frontend', [
    $title = "Our Services",
    $metaKey = "jimee beauty salon, beauty salon, beauty parlor, lalitpur nepal, kathmandu nepal, beauty salon in lalitpur, beauty parlor in kathmandu, best beauty shop, best beauty shop in lalitpur",
    $metaDesc = "Jimee Beauty Salon has the high professional Beautician as well as products that really has the successful story and feedback."
    ])

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/jquery.datetimepicker.min.css') }}" />
@endsection

@section('content')
@include('frontend.inc.services')
{{--@include('frontend.inc.video')--}}
{{--@include('frontend.inc.pricing')--}}
<section class="pt-120 pb-70 section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-funfact style3 text-center"><img src="assets/img/icon/fun9.png" alt="">
                    <h2><span class="counter">50</span><span>+</span></h2>
                    <h3>Client Feedback</h3>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-funfact style3 text-center"><img src="assets/img/icon/fun10.png" alt="">
                    <h2><span class="counter">100</span><span>+</span></h2>
                    <h3>Quality Product</h3>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-funfact style3 text-center"><img src="assets/img/icon/fun11.png" alt="">
                    <h2><span class="counter">4</span><span>+</span></h2>
                    <h3>Team Members</h3>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-funfact style3 style--two text-center"><img src="assets/img/icon/fun12.png"
                        alt="">
                    <h2><span class="counter">8</span><span>+</span></h2>
                    <h3>Best Services</h3>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.inc.appoint')
@endsection

@section('scripts')
<script src="{{ asset('assets/js/jquery.datetimepicker.full.js') }}"></script>
<script>
    $('#datetimepicker').datetimepicker();
</script>
@endsection