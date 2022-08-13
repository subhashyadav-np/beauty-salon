@extends('layouts.frontend', [$title = "Beauty Training"])

@section('content')
<section class="pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="therapy-thumb mb-5 mb-lg-0"><img src="{{ asset('assets/img/media/therapy.png') }}" data-rjs="2" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="therapy-content">
                    <h2>Beauty Training</h2>
                    <p>We are beauty premier skincare spa. At beauty ritual skincare we specialise in
                        transformativeds skin-care lashes and brows. We are also the area’s onlys face reality acne
                        specialists.</p>
                    <p>We do a hydrofacial treatment using our Bio-Brasion machine.Itis one of the most effective
                        forms skins exfoliation systems on the market. the Bio-Brasion machine is equipped with five
                        diamond tips.</p>
                    <ul class="therapy-list">
                        <li>* Come in and experience life-changing results!</li>
                        <li>* flawless makeup application.</li>
                        <li>* This deep pore cleansing facial clears</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.inc.shop_banner')
<div class="pt-120"></div>
{{--@include('frontend.inc.pricing')--}}
@endsection