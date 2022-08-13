<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="info-bar">
                        <ul class="
                  hz-list
                  justify-content-center justify-content-lg-start
                ">
                            <li><span>Opening Time: </span>Mon - Sat: 9 am to 6 pm</li>
                            <li><span>Sunday: </span>Closed</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ul class="hz-list justify-content-center justify-content-lg-end">
                        <li>
                            <a href="tel:+9779803526195" class="number"><i class="fa fa-phone"></i> (+977) 9803 526195</a>
                        </li>
                        <li>
                            <div class="social-links">
                                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i> </a><a
                                    href="https://twitter.com/"><i class="fab fa-twitter"></i> </a>
                                <a href="https://www.pinterest.com/"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.pinterest.com/"><i class="fab fa-youtube"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main love-sticky bg-white">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="col-lg-3 col-sm-5 col-7">
                    <div class="logo">
                        <a href="{{ route('homepage') }}"><img src="{{ asset('assets/img/logo.png') }}"
                                class="main-logo svg" alt="logo" style="max-height: 58px" />
                            <img src="{{ asset('assets/img/logo.png') }}" class="sticky-logo svg" alt="logo"
                                style="max-height: 58px" /></a>
                    </div>
                </div>
                <div class="
              col-lg-9 col-sm-7 col-5
              d-flex
              align-items-center
              justify-content-end
              position-static
            ">
                    <div class="nav-wrapper">
                        <div class="nav-wrap-inner">
                            <ul class="nav">
                                <li>
                                    <a class="@if (Route::currentRouteName()=='homepage' ) current-menu-parent @endif"
                                        href="{{ route('homepage') }}">Home</a>
                                </li>
                                <li>
                                    <a class="@if (Route::currentRouteName()=='aboutpage' ) current-menu-parent @endif"
                                        href="{{ route('aboutpage') }}">About</a>
                                </li>
                                <li>
                                    <a class="@if (Route::currentRouteName()=='servicepage' ) current-menu-parent @endif"
                                        href="{{ route('servicepage') }}">Services</a>
                                    {{-- <ul class="sub-menu">
                                        <li>
                                            <a class="@if (Route::currentRouteName() == 'haircut_design') current-menu-parent @endif" href="{{ route('haircut_design') }}">Haircut & design</a>
                                        </li>
                                        <li>
                                            <a class="@if (Route::currentRouteName() == 'hair_straight') current-menu-parent @endif" href="{{ route('hair_straight') }}">Hair Straight</a>
                                        </li>
                                        <li>
                                            <a class="@if (Route::currentRouteName() == 'hair_treatment') current-menu-parent @endif" href="{{ route('hair_treatment') }}">Hair Treatment</a>
                                        </li>
                                        <li>
                                            <a class="@if (Route::currentRouteName() == 'makeup') current-menu-parent @endif" href="{{ route('makeup') }}">Makeup</a>
                                        </li>
                                        <li>
                                            <a class="@if (Route::currentRouteName() == 'facial') current-menu-parent @endif" href="{{ route('facial') }}">Facial</a>
                                        </li>
                                        <li>
                                            <a class="@if (Route::currentRouteName() == 'waxing') current-menu-parent @endif" href="{{ route('waxing') }}">Waxing</a>
                                        </li>
                                        <li>
                                            <a class="@if (Route::currentRouteName() == 'threading') current-menu-parent @endif" href="{{ route('threading') }}">Threading & Micro Blading Designs</a>
                                        </li>
                                        <li>
                                            <a class="@if (Route::currentRouteName() == 'beauty_training') current-menu-parent @endif" href="{{ route('beauty_training') }}">Bautician Training</a>
                                        </li>
                                    </ul> --}}
                                </li>
                                <li>
                                    <a class="@if (Route::currentRouteName()=='shoppage' ) current-menu-parent @endif"
                                        href="{{ route('shoppage') }}">Shop</a>
                                </li>
                                <li><a class="@if (Route::currentRouteName()=='contactus' ) current-menu-parent @endif"
                                        href="{{ route('contactus') }}">Contact</a></li>
                                <li><a class="@if (Route::currentRouteName()=='appointment' ) current-menu-parent @endif"
                                        href="{{ route('appointment') }}">Appointment</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
