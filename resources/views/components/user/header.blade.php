<style>
    .warning {
        background-color: #ffc107;
        color: #856404;
        text-align: center;
        padding: 10px;
        font-weight: bold;
        width: 100%;
        position: fixed;
        top: 0;
        z-index: 0; /* Ensure it is above other elements */
    }
    body {
        padding-top: 70px; /* Adjust this value based on the height of your fixed header and warning */
    }
</style>


@if(\Auth::user()->verified === 0)
    <div class="warning alert alert-warning text-align-center fw-bold">
        Warning: Your account is not verified yet. Please <a href="{{ route('user.forms', [1]) }}">verify.</a> your account to access all features.
    </div>

    <header id="header" class="header fixed-top d-flex align-items-center mt-5">
@else
     <header id="header" class="header fixed-top d-flex align-items-center">
@endif

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('user.dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/e.png') }}" alt="">
                <span class="d-none d-lg-block">eCedula</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ \Auth::user()->profile_image ?? asset('assets/img/prof-icon.png') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ \Auth::user()->firstname[0] . '. ' . \Auth::user()->lastname }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ \Auth::user()->username }}</h6>
                            <span>Teacher</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('user.profile') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->
