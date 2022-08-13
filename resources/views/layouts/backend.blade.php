<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="HOSTBALA LTD" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- SITE TITLE -->
    <title>@isset($title) {{ $title . '->' }} @endisset{{ config('app.name') }}</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
        <!-- third party css -->
        <link href="{{ asset('backend/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"id="bootstrap-stylesheet" />
        <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />
        <link href="{{ asset('backend/css/my-custom.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />

        @yield('styles')

    </head>

    <body>

        <!-- PRELOADER SPINNER -->
        <div id="loader-wrapper">
            <div id="loader">
                <div class="loader-inner"></div>
            </div>
        </div>

        <!-- Begin page -->
        <div id="wrapper">


            <!-- Topbar Start -->
            @include('backend.inc.top-bar')
            <!-- end Topbar -->
            <!-- ========== Left Sidebar Start ========== -->
            @include('backend.inc.left-sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start container-fluid -->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <h4 class="header-title mb-3">{{ @$title }}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        @yield('content')

                    </div>
                    <!-- end container-fluid -->



                    <!-- Footer Start -->
                    @include('backend.inc.footer')
                    <!-- end Footer -->

                </div>
                <!-- end content -->

            </div>
            <!-- END content-page -->

        </div>
        <!-- END wrapper -->


        <!-- Script js -->

        <!-- Vendor js -->
        <script src="{{ asset('backend/js/vendor.min.js') }}"></script>

        {{--<script src="{{ asset('backend/libs/morris-js/morris.min.js') }}"></script>--}}
        <script src="{{ asset('backend/libs/raphael/raphael.min.js') }}"></script>

        {{--<script src="{{ asset('backend/js/pages/dashboard.init.js') }}"></script>--}}

        <!-- Required datatable js -->
        <script src="{{ asset('backend/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('backend/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/libs/datatables/responsive.bootstrap4.min.js') }}"></script>

        <!-- Datatables init -->
        <script src="{{ asset('backend/js/pages/datatables.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/js/app.min.js') }}"></script>

        <script src="{{ asset('backend/js/notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('backend/js/notify/notify-script.js') }}"></script>

        @include('flash');

        @yield('scripts')

        <script>
            $(window).on('load', function() {
                "use strict";
                /*----------------------------------------------------*/
                /*	Preloader
                /*----------------------------------------------------*/
                var preloader = $('#loader-wrapper'),
                    loader = preloader.find('.loader-inner');
                loader.fadeOut();
                preloader.delay(400).fadeOut('slow');
            });

        </script>

    </body>

    </html>
