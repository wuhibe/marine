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
            <!-- Reservations -->
            <li class="pt-4 border-bottom {{ Request::is('reservations*') ? 'border-light' : 'border-dark' }}">
                <a class="js-navbar-vertical-aside-menu-link nav-link text-white d-flex justify-content-around" href="{{ route('reservations.index') }}" title="Reservations">
                    <i class="fas fa-book nav-icon"></i>
                    <span class="navbar-vertical-aside-mini-mode-hidden-elements">Reservations</span>
                </a>
            </li>
            <!-- End Reservations -->
            <!-- Bookings -->
            <li class="pt-4 border-bottom {{ Request::is('bookings*') ? 'border-light' : 'border-dark' }}">
                <a class="js-navbar-vertical-aside-menu-link nav-link text-white d-flex justify-content-around" href="{{ route('bookings.index') }}" title="Bookings">
                    <i class="fas fa-calendar nav-icon"></i>
                    <span class="navbar-vertical-aside-mini-mode-hidden-elements">Bookings</span>
                </a>
            </li>
            <!-- End Bookings -->
            <!-- Customers -->
            <li class="pt-4 border-bottom {{ Request::is('customers*') ? 'border-light' : 'border-dark' }}">
                <a class="js-navbar-vertical-aside-menu-link nav-link text-white d-flex justify-content-around" href="{{ route('customers.index') }}" title="Customers">
                    <i class="fas fa-users nav-icon"></i>
                    <span class="navbar-vertical-aside-mini-mode-hidden-elements">Customers</span>
                </a>
            </li>
            <!-- End Customers -->
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

        </ul>
    </div>
</aside>
