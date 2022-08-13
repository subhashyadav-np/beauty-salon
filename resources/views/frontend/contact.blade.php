@extends('layouts.frontend', [
    $title = "Contact Us",
    $metaKey = "jimee beauty salon, beauty salon, beauty parlor, lalitpur nepal, kathmandu nepal, beauty salon in lalitpur, beauty parlor in kathmandu, best beauty shop, best beauty shop in lalitpur",
    $metaDesc = "Jimee Beauty Salon has the high professional Beautician as well as products that really has the successful story and feedback."
    ])

@section('content')
<section class="pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="quick-contact" data-bg-img="{{asset('assets/img/bg/quick-contact-bg.png')}}">
                    <h3>Quick Contact</h3>
                    <p>Owning successful salon locations passion to the small town.</p>
                    <ul class="quick-contact-list pt-2">
                        <li><i class="fas fa-phone-alt"></i> <a href="tel:+9779803526195">(+977) 9803 526195
                        </a></li>
                        <li><i class="fas fa-envelope"></i> <a href="mailto:info@beautain.com">info@jimeebeautysalon.com</a>
                        </li>
                        <li><i class="fas fa-map-marker-alt"></i>44600 Talchikhel Lalitpur,<br>Kathmandu, Nepal.</li>
                        <li><i class="fas fa-clock"></i> Sun - Sat: 9 am to 6 pm <span>Sunday: Closed.</span></li>
                    </ul>
                    <div class="socials"><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i>
                        </a><a href="https://www.twitter.com/"><i class="fab fa-twitter"></i> </a><a
                            href="https://www.instagram.com/"><i class="fab fa-instagram"></i> </a><a
                            href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="contact-form-wrap" data-bg-img="assets/img/bg/contact-form-bg.png">
                    <h3>Send Message Us</h3>
                    <form action="{{route('sendContactMsg')}}" class="contact-form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group"><input type="text" name="name" class="form-control"
                                        placeholder="Your Name" required></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group"><input type="email" name="email" class="form-control"
                                        placeholder="Your Email ID" required></div>
                            </div>
                            <div class="col-12">
                                <div class="form-group"><input type="text" name="number" class="form-control"
                                        placeholder="Your Phone No."></div>
                            </div>
                            <div class="col-lg-12"><textarea class="form-control" name="message"
                                    placeholder="Your Messages" required></textarea></div>
                            <div class="col-lg-12 mt-2">
                                <div class="d-flex align-items-center flex-wrap"><button type="submit"
                                        class="btn"><span>Send Now</span> <img src="assets/img/icon/btn-arrow.svg"
                                            alt="" class="svg"></button>
                                    <div class="form-response"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
{{--<div class="map-wrap">
    <div class="map" data-trigger="map"
        data-map-options='{"latitude": "40.6835108", "longitude": "-73.9094194,13", "zoom": "14"}'></div>
    <div class="map-img-wrap"><img src="assets/img/media/map-house.png" alt=""></div>
</div>--}}

{{--<section class="trusted-partner pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-title"><span class="subtitle">Partner</span>
                    <h2>Trusted Partner</h2>
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