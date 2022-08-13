<footer class="footer" data-bg-img="{{ asset('assets/img/bg/footer-bg.png') }}">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget_about">
                        <h3 class="widget-title">{{ config('app.name') }}</h3>
                        <div class="menu-container">
                            <p>I have been a beauty beautain from march beautain.</p>
                            <div class="socials">
                                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i> </a><a
                                    href="https://www.twitter.com/"><i class="fab fa-twitter"></i> </a><a
                                    href="https://www.instagram.com/"><i class="fab fa-instagram"></i> </a><a
                                    href="https://www.pinterest.com/"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <div class="widget widget_nav_menu">
                        <h3 class="widget-title">Our Products</h3>
                        <div class="menu-container">
                            <ul class="menu">
                                @foreach ($ProuctParentCats as $item)
                                <li><a href="{{ route('shop_by_cat',['slug'=>$item->slug])}}">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <div class="widget widget_nav_menu">
                        <h3 class="widget-title">About us</h3>
                        <div class="menu-container">
                            <ul class="menu">
                                <li><a href="{{route('aboutpage')}}">Beautain</a></li>
                                <li><a href="{{route('contactus')}}">Contact us</a></li>
                                <li><a href="{{route('servicepage')}}">Our Services</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget_contact_info">
                        <h3 class="widget-title">Get in Touch</h3>
                        <div class="menu-container">
                            <p>I have been a beauty beautain from march beautain have.</p>
                            <ul class="contact-list">
                                <li>
                                    <i class="fas fa-map-marker-alt"></i> 44600 Talchikhel Lalitpur,
                                    <br />Kathmandu, Nepal.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="
                footer-bottom-content
                justify-content-center justify-content-lg-start
                mb-4 mb-lg-0
              ">
                        <div class="footer-logo">
                            <img src="{{ asset('assets/img/logo.png') }}" class="svg" alt="logo" style="max-height: 50\px"/>
                        </div>
                        <div class="copyright-text">
                            Copyright © 2021. All right reserved. | Powered by <a href="www.hostbala.com">HostBala Technology</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>