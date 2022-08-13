<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.png" />
    <!-- SITE TITLE -->
    <title>@isset($title) {{ $title . ' -> ' }} @endisset{{ config('app.name') }}</title>
    <!-- META DESCRIPTION -->
    <meta name="description" content="{{ @$metaDesc }}" />
    <!-- META KEYWORDS -->
    <meta name="keywords" content="{{ @$metaKey }}" />
    <!-- OG TITLE -->
    <meta property="og:title" content="@isset($title) {{ $title . ' >> ' }} @endisset{{ config('app.name') }}" />
    <!-- OG DES -->
    <meta property="og:description" content="{{ @$metaDesc }}" />

    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&amp;family=Open+Sans:wght@400;500;700&amp;display=swap" />
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/magnific-popup/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

    @yield('styles')
</head>

<body>

    <div class="preloader">
        <div class="spinner-grow" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    @include('frontend.inc.header')

    @if (Route::currentRouteName() == 'homepage')
    @else
        <div class="page-title-wrap" data-bg-img="{{ asset('assets/img/bg/page-title-bg.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title">
                            <h2>@isset($title) {{ $title}} @endisset</h2>
                            <ul class="nav">
                                <li><a href="{{ route('homepage') }}">Home</a></li>
                                <li class="active">@isset($title) {{ $title }} @endisset</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @yield('content')

    @include('frontend.inc.footer')

    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/menu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/retinajs/retina.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/countdown-timer/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/isotope/packery-mode.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/elevatezoom/jquery.elevateZoom-3.0.8.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjkssBA3hMeFtClgslO2clWFR6bRraGz0"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script src="{{ asset('backend/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('backend/js/notify/notify-script.js') }}"></script>

    @include('flash')

    @yield('scripts')
</body>

</html>
