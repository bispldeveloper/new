<style>
    .off-canvas {
        background: {{ $mc_branding->offcanvas_bg }};
    }
    .off-canvas .nav-block p.title {
        color: {{ $mc_branding->offcanvas_heading_link_color }};
    }
    .off-canvas .nav-block ul.menu.vertical li a {
        color: {{ $mc_branding->offcanvas_link_color }};
    }
    .off-canvas .nav-block ul.menu.vertical li a.active {
        color: {{ $mc_branding->offcanvas_link_color_active }};
        background-color: {{ $mc_branding->offcanvas_link_background_color_active }};
    }
    .off-canvas .nav-block ul.menu.vertical li a.active i {
        color: {{ $mc_branding->offcanvas_link_icon_color_active }};
    }
    .top-bar,
    .top-bar ul.dropdown.menu,
    .top-bar ul.dropdown.menu > li ul.is-dropdown-submenu {
        background-color: {{ $mc_branding->topbar_bg }};
    }
    .top-bar ul.dropdown.menu > li > a,
    .top-bar ul.dropdown.menu > li ul.is-dropdown-submenu li.is-submenu-item a {
        color: {{ $mc_branding->topbar_link_color }};
    }
    .top-bar ul.dropdown.menu > li > a:hover,
    .top-bar ul.dropdown.menu > li ul.is-dropdown-submenu li.is-submenu-item a:hover {
        color: {{ $mc_branding->topbar_link_color_hover }};
    }
</style>