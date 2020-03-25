@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Site Config
@stop

@section('content')

    <div class="row">
        <div class="small-12 large-6 columns">

            <div class="module-header">
                <div class="row align-middle">
                    <div class="small-12 medium-6 columns">
                        <p class="module-title">Site Config</p>
                    </div>
                    <div class="small-12 medium-6 columns">
                        <ul class="button-list">
                            <li>
                                <a href="{{ route('mc-admin.gitpull.confirm-gitpull') }}" class="button warning trigger-reveal"> Pull from Git</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="content-block">
                <div class="row align-middle">
                    <div class="small-6 columns">
                        <p style="margin-bottom: 0;" class="content-block-title">Debug Mode</p>
                    </div>
                    <div class="small-6 text-right columns">
                        <div class="switch" style="margin:7px 0;">
                            <input class="switch-input" id="debugmode" value="1" {{ (config('app.debug') == 'TRUE' ? 'checked="checked"' : '') }} type="checkbox">
                            <label class="switch-paddle" for="debugmode">
                                <span class="switch-active" aria-hidden="true">On</span>
                                <span class="switch-inactive" aria-hidden="true">Off</span> </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-block">
                <p class="content-block-title">Robots TXT</p>
                <div class="content">
                    {!! Form::model($robots_txt, ['route' => ['mc-admin.siteconfig.updaterobots'], 'method' => 'POST']) !!}
                    <p>Here you can change the robots.txt file, below are a few examples of frequently used rules.</p>
                    <ul>
                        <li>Disallow: /admin</li>
                        <li>Disallow: /uploads</li>
                    </ul>
                    <div class="row">
                        <div class="small-12 columns">
                            {!! Form::textarea('robots', null, ['class' => $errors->first('username', 'is-invalid-input')]) !!}
                            {!! $errors->first('robots', '<span class="form-error is-visible">:message</span>' ) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 columns text-right">
                            {!! Form::submit('Save Robots TXT', ['class' => 'button success']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    @parent
    <script>
        $(document).on('change', '#debugmode', function () {
            $.ajax({
                url: '{{ route('mc-admin.siteconfig.changedebugmode') }}',
                data: {debugmode: ($('#debugmode:checked').length > 0 ? 1 : 0), _token: '{{ csrf_token() }}'},
                type: 'post',
                success: function (data) {
                    location.reload();
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });
    </script>
@stop
