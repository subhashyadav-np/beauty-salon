@extends('layouts.frontend', [
    $title = "Appointment",
    $metaKey = "jimee beauty salon, beauty salon, beauty parlor, lalitpur nepal, kathmandu nepal, beauty salon in lalitpur, beauty parlor in kathmandu, best beauty shop, best beauty shop in lalitpur",
    $metaDesc = "Jimee Beauty Salon has the high professional Beautician as well as products that really has the successful story and feedback."
    ])

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/jquery.datetimepicker.min.css') }}" />
@endsection

@section('content')
@include('frontend.inc.appoint')
@include('frontend.inc.shop_banner')

{{--<section class="trusted-partner pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-title"><span class="subtitle">Partner</span>
                    <h2>Lovely Partner</h2>
                    <p>After owning two successful salon locations they decided<br>to move their passion to the
                        small town.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="company-logo-carousel bt-carousel owl-carousel" data-owl-items="4"
                    data-owl-autoplay="true" data-owl-nav="true" data-owl-margin="5"
                    data-owl-responsive='{"0": {"items": "1"}, "420": {"items": "2"}, "778": {"items": "3"}, "1024": {"items": "4"}}'>
                    <div class="company-logo"><img src="assets/img/media/company-logo1.png" alt=""></div>
                    <div class="company-logo"><img src="assets/img/media/company-logo2.png" alt=""></div>
                    <div class="company-logo"><img src="assets/img/media/company-logo3.png" alt=""></div>
                    <div class="company-logo"><img src="assets/img/media/company-logo4.png" alt=""></div>
                    <div class="company-logo"><img src="assets/img/media/company-logo2.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</section>--}}

@endsection

@section('scripts')
<script src="{{ asset('assets/js/jquery.datetimepicker.full.js') }}"></script>
<script>
    $('#datetimepicker').datetimepicker();
</script>
@endsection