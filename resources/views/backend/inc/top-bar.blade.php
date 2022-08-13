<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                @if (Auth::user()->avatar == NULL)
                    <img src="{{ asset('images/defaults/user.png') }}" alt="" class="avatar-md rounded-circle">
                @else
                    <img src="{{ asset('storage/'.Auth::user()->avatar) }}" alt="" class="avatar-md rounded-circle">
                @endif
                <span class="pro-user-name ml-1">
                    {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="/dashboard/profile" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-outline"></i>
                    <span>Profile</span>
                </a>

                {{--<!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-settings-outline"></i>
                    <span>Settings</span>
                </a>--}}

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-logout-variant"></i>
                    <span>Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </li>

        <!--<li class="dropdown notification-list">
                                        <a href="javascript:void(0);" class="nav-link right-bar-toggle">
                                            <i class="mdi mdi-settings-outline noti-icon"></i>
                                        </a>
                                    </li>-->


    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{ route('adminDash') }}" class="logo text-center logo-dark">
            <span class="logo-lg">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" height="26">
                <!-- <span class="logo-lg-text-dark">Simple</span> -->
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-lg-text-dark">S</span> -->
                <img src="{{ asset('images/img/logo.png') }}" alt="" height="22">
            </span>
        </a>

    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>

        <li class="d-none d-sm-block">
            <form class="app-search">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </li>
    </ul>
</div>
<!-- end Topbar -->
