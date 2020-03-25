<!DOCTYPE html>
<html lang="en">
<head>
    @include('Pages::Frontend.partials.google-tagmanager-head')
    @include('Pages::Frontend.partials.google-analytics')
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>@yield('metaTitle') {{ $marketingsettings->meta_suffix }}</title>
    <meta name="description" content="@yield('metaDescription')"/>
    <link rel="canonical" href="@yield('metaCanonical', url()->current())">

    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('metaTitle')">
    <meta property="og:image" content="{{ frontend('images/social.jpg') }}"/>
    <meta property="og:description" content="@yield('metaDescription')">
    <meta property="og:site_name" content="{{ $sitesettings->site_name }}">

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="{{ $sitesettings->twitter_handle }}"/>
    <meta name="twitter:title" content="@yield('metaTitle')"/>
    <meta name="twitter:description" content="@yield('metaDescription')"/>
    <meta name="twitter:image" content="{{ frontend('images/social.jpg') }}"/>

    @section('metaOther')
    @show

    @section('styles')
        <link rel="stylesheet" href="{{ mix('css/app.css', 'assets/frontend') }}" media="all">
    @show
</head>

<body class="{{ view_route_name() }}">
@include('Pages::Frontend.partials.google-tagmanager-body')

<div class="off-canvas-wrapper">
    <div class="off-canvas position-right" id="offcanvas" data-transition="push" data-off-canvas>
        @include('Pages::Frontend.partials.offcanvas')
    </div>
    <div class="off-canvas-content" data-off-canvas-content>
        @include('Pages::Frontend.partials.alert')
        @include('Pages::Frontend.partials.header')
        @yield('content')
        @include('Pages::Frontend.partials.footer')
    </div>
</div>

@section('scripts')
    <script src="{{ mix('js/app.js', 'assets/frontend') }}"></script>
@show
</body>
</html>
