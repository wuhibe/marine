<aside
    id="sidebar"
    class="col-md-3 col-lg-2 d-md-block"
    style="background: #3954a4dd; height:100%"
>
    <div class="position-sticky">
        <ul class="nav flex-column">
            <!-- Dashboards -->
            <li class="pt-4 border-bottom {{ Request::is('dashboard*') ? 'border-light' : 'border-dark' }}">
                <a
                    class="js-navbar-vertical-aside-menu-link nav-link text-white d-flex justify-content-around"
                    href="{{ route('dashboard') }}"
                    title="Dashboard"
                >
                    <i class="fas fa-home nav-icon"></i>
                    <span
                        class="navbar-vertical-aside-mini-mode-hidden-elements"
                    >
                        Dashboard
                    </span>
                </a>
            </li>
            <!-- End Dashboards -->
            @if(auth('admin')->user()->user_type == 'admin')
            <!-- Rooms -->
            <li class="pt-4 border-bottom {{ Request::is('rooms*') ? 'border-light' : 'border-dark' }}">
                <a
                    class="js-navbar-vertical-aside-menu-link nav-link text-white d-flex justify-content-around"
                    href="{{ route('rooms.index') }}"
                    title="Rooms"
                >
                    <i class="fas fa-bed nav-icon"></i>
                    <span
                        class="navbar-vertical-aside-mini-mode-hidden-elements"
                    >
                        Rooms
                    </span>
                </a>
            </li>
            <!-- End Rooms -->
            @endif
        </ul>
    </div>
</aside>
