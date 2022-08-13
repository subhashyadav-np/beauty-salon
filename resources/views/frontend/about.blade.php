@extends('layouts.frontend', [
    $title = "About",
    $metaKey = "jimee beauty salon, beauty salon, beauty parlor, lalitpur nepal, kathmandu nepal, beauty salon in lalitpur, beauty parlor in kathmandu, best beauty shop, best beauty shop in lalitpur",
    $metaDesc = "Jimee Beauty Salon has the high professional Beautician as well as products that really has the successful story and feedback."
    ])

@section('content')
<section class="pt-120 pb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img"><img src="assets/img/media/about.png" data-rjs="2" alt=""></div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-title style--two mb-0"><span class="subtitle">About {{ config('app.name') }}</span>
                        <h2>10+ Years Work<br>Experiences</h2>
                        <p>You can shop brands only sold in the US, compare prices on your favourites products
                            across stores, and read reviews before you try something new all without leaving.</p>
                        <p>Too Faced is a boutique brand that creates innovative and cruelty free cosmetics that
                            women love.</p>
                        <div class="meta-wrap">
                            <div class="meta-info">
                                <h3>Sila Jimee</h3>
                                <p>Funder Of {{ config('app.name') }}</p>
                            </div>
                            <div class="sign"><img src="assets/img/icon/signature.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-120 pb-70 section-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <div class="section-title"><span class="subtitle">More Us</span>
                    <h2>Why Appoint?</h2>
                    <p>After owning two successful salon locations they decided<br>to move their passion to the
                        small town.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="more-about">
                    <div class="thumb"><img src="assets/img/post/post1.png" data-rjs="2" alt=""></div>
                    <div class="content">
                        <h3 class="post-title">Our Mission</h3>
                        <p>With pilates you train the core muscles around your spine. The focus of pilates is solely
                            on you and we will make sure that you are.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="more-about">
                    <div class="thumb"><img src="assets/img/post/post2.png" data-rjs="2" alt=""></div>
                    <div class="content">
                        <h3 class="post-title">Our Philosophy</h3>
                        <p>With pilates you train the core muscles around your spine. The focus of pilates is solely
                            on you and we will make sure that you are.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="more-about">
                    <div class="thumb"><img src="assets/img/post/post3.png" data-rjs="2" alt=""></div>
                    <div class="content">
                        <h3>Our Vision</h3>
                        <p>With pilates you train the core muscles around your spine. The focus of pilates is solely
                            on you and we will make sure that you are.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{--@include('frontend.inc.pricing')--}}
{{--@include('frontend.inc.video')--}}
@include('frontend.inc.team')
@endsection