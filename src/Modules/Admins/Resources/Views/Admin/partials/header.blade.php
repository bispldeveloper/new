<header>

    <div class="title-bar hide-for-large">
        <div class="title-bar-left">
            <div class="title-bar-title">
                <a href="{{ route('mc-admin.dashboard') }}">
                    <img src="{{ $mc_branding->present()->getLogo }}">
                </a>
            </div>
        </div>
        <div class="title-bar-right">
            <button class="menu-icon" type="button" data-toggle="dashboard-sidebar"></button>
        </div>
    </div>

    <div class="top-bar show-for-large">
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="logo">
                    <a href="{{ route('mc-admin.dashboard') }}">
                        <img src="{{ $mc_branding->present()->getLogo }}" >
                    </a>
                </li>
                <li class="powered-by">
                    <a href="#">
                        <img src="{{ admin('images/logos/eyesite-powered-by@2x.png') }}" alt="Powered by EyeSite">
                    </a>
                </li>
            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="dropdown menu" data-dropdown-menu>
                <li>
                    <a href="#">{{ auth()->guard('admins')->user()->present()->getFullName }}</a>
                    <ul class="menu vertical">
                        <li><a target="_blank" href="{{ route('home') }}">View Website</a></li>
                        <li><a href="{{ route('mc-admin.logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</header>
