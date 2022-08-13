<!-- Left Sidebar Start -->
<div class="left-side-menu">

    <div class="user-box">
        <div class="float-left">
            @if (Auth::user()->avatar == NULL)
                <img src="{{ asset('images/defaults/user.png') }}" alt="" class="avatar-md rounded-circle">
            @else
                <img src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="" class="avatar-md rounded-circle">
            @endif
        </div>
        <div class="user-info1">
            <a href="/dashboard/profile">{{ Auth::user()->name }}</a>
            <p class="text-muted m-0">Admin</p>
        </div>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">

        <ul class="metismenu" id="side-menu">

            <li class="menu-title">Navigation</li>

            <li>
                <a href="{{route('adminDash')}}">
                    <i class="ti-home"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li>
                <a href="{{route('appointments')}}">
                    <i class="ti-receipt"></i>
                    <span> Appointments </span>
                </a>
            </li>

            <li>
                <a href="{{route('showCusMails')}}">
                    <i class="ti-email"></i>
                    <span> Customer Mails </span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i class="ti-layout-grid2"></i>
                    <span> Products </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('product.index')}}"> <i class="ti-layout-media-right-alt"></i>  All Products</a></li>
                    <li><a href="{{route('product.create')}}"> <i class="fa fa-plus"></i> Add Products</a></li>
                    <li><a href="{{route('category.index')}}"> <i class="ti-view-list"></i> Product Category</a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('testimonial.index')}}">
                    <i class="ti-star"></i>
                    <span> Testimonials </span>
                </a>
            </li>

            <li>
                <a href="{{route('frontbanner.index')}}">
                    <i class="ti-paint-roller"></i>
                    <span> Homepage Banner </span>
                </a>
            </li>

        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>


</div>
<!-- Left Sidebar End -->