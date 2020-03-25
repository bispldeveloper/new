@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Branding
@stop

@section('content')

    <div class="row">
        <div class="small-12 columns">
            <div class="module-header">
                <p class="module-title"> Branding</p>
            </div>
            {!! Form::model($branding, ['route' => ['mc-admin.branding.update', $branding->id], 'method' => 'PUT']) !!}
                @include('Branding::Admin.form')
                <div class="button-block">
                    <div class="row">
                        <div class="small-12 columns text-right">
                            {!! Form::submit('Save Branding', ['class' => 'button success']) !!}
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('scripts')
    @parent
    <script>
        $(".colors").spectrum({
            preferredFormat: "hex",
            showInput: true,
            showPalette: false,
            move: function (color) {
                var styles = {};
                styles[$(this).attr('data-branding-option')] = color.toHexString();
                console.log(styles);
                console.log($(this).attr('data-branding-class'));
                $($(this).attr('data-branding-class')).css(styles);
            }
        });
    </script>
@stop
