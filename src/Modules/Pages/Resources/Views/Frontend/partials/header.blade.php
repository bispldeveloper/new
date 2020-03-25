<header>

    <div class="title-bar hide-for-large">
        <div class="title-bar-left">
            <div class="title-bar-title">
                <a href="{{ route('home') }}">Mission Control</a>
            </div>
        </div>
        <div class="title-bar-right">
            <button class="menu-icon" type="button" data-open="offcanvas"></button>
        </div>
    </div>

    <div class="top-bar show-for-large">
        <div class="row column">
            <div class="row" style="margin: 0;">
                <div class="top-bar-title">
                    <a href="{{ route('home') }}">Mission Control</a>
                </div>
                <div class="top-bar-left"></div>
                <div class="top-bar-right">
                    <ul class="dropdown menu" data-dropdown-menu>
                        {!! $header_topbar !!}
                    </ul>
                </div>
            </div>
        </div>
    </div>

</header>
