<nav class="navbar pt-2 pb-2 fixed-top bg-white" style="border-bottom: solid 1px #3953a4">
    <div class="flex justify-start">
        <img style="width: 60px; height: 60px;" src="{{asset('img/logo.png')}}" alt="Logo">
        <h3 class="text-bolder d-inline-block">Marine Guest House</h3>
    </div>
    <div class="user-info">
        <a href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="avatar-img rounded-circle mr-4"
                style="width: 60px; height: 60px;"
                onerror="this.src='{{asset('img/avatar.jpg')}}'"
                src="{{auth('admin')->user()->avatar}}"
                alt="Profile">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <h6 class="dropdown-header text-dark">{{auth('admin')->user()->name}}</h6>
            <a class="dropdown-item text-muted" href="#">Edit Profile</a>
            <a class="dropdown-item text-muted" href="{{route('logout')}}">Logout</a>
        </div>
    </div>
</nav>
