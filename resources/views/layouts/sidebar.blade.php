<nav
    id="sidebar"
    class="col-md-3 col-lg-2 d-md-block sidebar"
    style="background: #3954a4dd; padding-top: 90px; padding-right: 30px"
>
    <div class="position-sticky">
        <ul class="nav flex-column">
            <!-- Dashboards -->
            <li class="pt-4 border-bottom {{ Request::is('dashboard*') ? 'border-top border-light' : 'border-dark' }}">
                <a
                    class="js-navbar-vertical-aside-menu-link nav-link text-white d-flex justify-content-around align-items-center"
                    href="{{ route('dashboard') }}"
                    title="Dashboard"
                >
                    <i class="fas fa-home nav-icon h5"></i>
                    <span
                        class="navbar-vertical-aside-mini-mode-hidden-elements h5 text-right"
                    >
                        Dashboard
                    </span>
                </a>
            </li>
            <!-- End Dashboards -->
        </ul>
    </div>
</nav>
