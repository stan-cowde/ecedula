@if(\Auth::user()->verified === 0)
    <aside id="sidebar" class="sidebar mt-5">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.dashboard') ? '' : 'collapsed' }}" href="{{ route('user.dashboard') }}" wire:navigate>
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.forms') ? '' : 'collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse {{ request()->routeIs('user.forms') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('user.forms', [1]) }}" class="{{ request()->routeIs('user.forms') ? '' : 'collapsed' }}">
                            <i class="bi bi-circle"></i><span>Online Cedula Application</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.payment-history') ? '' : 'collapsed' }}" href="{{ route('user.payment-history') }}">
                    <i class="bi bi-clock-history"></i>
                    <span>Payment History</span>
                </a>
            </li><!-- End Payment History Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.profile') ? '' : 'collapsed' }}" href="{{ route('user.profile') }}">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->
        </ul>
    </aside>
@elseif(\Auth::user()->verified === 1)
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.dashboard') ? '' : 'collapsed' }}" href="{{ route('user.dashboard') }}" wire:navigate>
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.payment-history') ? '' : 'collapsed' }}" href="{{ route('user.payment-history') }}">
                    <i class="bi bi-clock-history"></i>
                    <span>Payment History</span>
                </a>
            </li><!-- End Payment History Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.create-payment') ? '' : 'collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse {{ request()->routeIs('user.create-payment') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('user.create-payment') }}" class="{{ request()->routeIs('user.create-payment') ? '' : 'collapsed' }}">
                            <i class="bi bi-circle"></i>
                            <span>Create Payment</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.profile') ? '' : 'collapsed' }}" href="{{ route('user.profile') }}">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->
        </ul>
    </aside>
@endif
