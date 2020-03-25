<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('authTitle') | EyeSite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="NOINDEX, NOFOLLOW">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ admin('images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ admin('images/icons/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ admin('images/icons/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ admin('images/icons/manifest.json') }}">
    <link rel="mask-icon" href="{{ admin('images/icons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="stylesheet" href="{{ mix('css/app.css', 'assets/admin') }}">
</head>
<body>

<div class="row small-centered" id="auth-body">
    <div class="small-12 medium-5 large-5 columns show-for-medium" id="image-container" style="background-image: url({{ ($mc_branding->auth_background != '' ? ImageResizer::fit($mc_branding->auth_background, 770, 1080,'jpg', 100, 'ffffff') : admin('images/eyesite-auth-background.jpg')) }});"></div>
    <div class="small-offset-2 small-10 medium-offset-0 medium-6 large-4 columns" id="form-container">
        <div class="content">
            <img class="eye-logo" src="{{ admin('images/logos/eyesite-black@2x.png') }}" alt="EyeSite Logo">
            @yield('content')
        </div>
    </div>
</div>

@section('scripts')
    <script src="{{ mix('js/app.js', 'assets/admin') }}"></script>
@show

</body>
</html>