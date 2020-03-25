<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ admin('images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ admin('images/icons/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ admin('images/icons/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ admin('images/icons/manifest.json') }}">
    <link rel="mask-icon" href="{{ admin('images/icons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="stylesheet" href="{{ mix('css/app.css', 'assets/admin') }}">
    <title>@yield('moduleTitle') | EyeSite</title>
    @include('Branding::Admin.partials.styles')
</head>
<body>

@include('Admins::Admin.partials.header')

<div id="dashboard" class="off-canvas-wrapper">
    <div id="dashboard-sidebar" class="dashboard-sidebar position-left off-canvas off-canvas-absolute reveal-for-large" data-off-canvas>
        <div id="dashboard-sidebar-inner">
            @include('Admins::Admin.partials.offcanvas')
        </div>
    </div>
    <div id="dashboard-body" class="off-canvas-content" data-off-canvas-content>
        <div id="dashboard-body-header">
            @include('Admins::Admin.partials.alerts')
            @yield('header')
        </div>
        <div id="dashboard-body-content">
            <div id="dashboard-body-content-inner">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<div class="reveal" id="dynamicModal" data-reveal data-close-on-click="false"></div>

@section('scripts')
    <script src="{{ mix('js/app.js', 'assets/admin') }}"></script>
    <script src="{{ admin('js/moxiemanager/js/moxman.loader.min.js') }}"></script>
    <script>
        $(document).on('mousedown', '.reveal-overlay', function(e) {
            if(e.target != this) return;
            $('#dynamicModal').foundation('close');
        });
        $(document).on('click', '.moxie-image-browse', function (event) {
            event.preventDefault();
            var moxiePath = $(this).data('moxie-directory') || null;
            var moxieField = $(this).data('moxie-field');
            moxman.browse({
                path: moxiePath,
                extensions: 'jpg,png,jpeg,gif',
                skin: 'custom',
                no_host: true,
                title: 'File Manager',
                filelist_manage_menu: 'cut copy paste | view edit rename download addfavorite | zip unzip',
                filelist_context_menu: 'cut copy paste | view edit rename download addfavorite | zip unzip',
                oninsert: function (image) {
                    image.focusedFile.url = image.focusedFile.url.replace('{{ getenv('AWS_CLOUDFRONT_URL') }}', '');
                    image.focusedFile.thumbnailUrl = image.focusedFile.thumbnailUrl.replace('{{ getenv('AWS_CLOUDFRONT_URL') }}', '');
                    console.log(image.focusedFile.url);
                    $('#' + moxieField).val(image.focusedFile.url);
                }
            });
        });

        $(document).on('click', '.moxie-file-browse', function (event) {
            event.preventDefault();
            var moxiePath = $(this).data('moxie-directory') || null;
            var moxieField = $(this).data('moxie-field');
            moxman.browse({
                path: moxiePath,
                no_host: true,
                title: 'File Manager',
                skin: 'custom',
                filelist_manage_menu: 'cut copy paste | view edit rename download addfavorite | zip unzip',
                filelist_context_menu: 'cut copy paste | view edit rename download addfavorite | zip unzip',
                oninsert: function (file) {
                    file.focusedFile.url = file.focusedFile.url.replace('{{ getenv('AWS_CLOUDFRONT_URL') }}', '');
                    $('#' + moxieField).val(file.focusedFile.url);
                }
            });
        });

        function formMultipleImages(id, route) {
            moxman.browse({
                title: 'File Manager',
                extensions: 'jpg,png,jpeg,gif',
                skin: 'custom',
                oninsert: function (images) {
                    $.each(images.files, function (key, val) {
                        val.url = val.url.replace('{{ getenv('AWS_CLOUDFRONT_URL') }}', '');
                        val.thumbnailUrl = val.thumbnailUrl.replace('{{ getenv('AWS_CLOUDFRONT_URL') }}', '');
                    });
                    $.ajax({
                        type: 'post',
                        url: route,
                        data: {images: images.files, id: id, _token: '{!! csrf_token() !!}'},
                        success: function (data) {
                            location.reload();
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
        }
    </script>
    @include('Admins::Admin.scripts.sortable-scripts')
    @include('Admins::Admin.scripts.tinymce-scripts')
@show
</body>
</html>