@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Add Setting
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 columns">
                <p class="module-title"> Create Setting </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 medium-6 columns">
            <div class="content-block">
                <p class="content-block-title">Setting Details</p>
                <div class="content">
                    {!! Form::model(['route' => ['mc-admin.sitesettings.create'], 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="small-12 columns">
                            {!! Form::label('type', 'Setting Type', ['class' => $errors->first('type', 'is-invalid-label')])!!}
                            {!! Form::select('type', ['text' => 'Text', 'truefalse' => 'True/False', 'image' => 'Image', 'textarea' => 'Textarea'], null, ['id' => 'settingtype']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 columns">
                            {!! Form::label('setting', 'Setting Name', ['class' => $errors->first('setting', 'is-invalid-label')])!!}
                            {!! Form::text('setting', null, ['class' => $errors->first('setting', 'is-invalid-input')]) !!}
                            {!! $errors->first('setting', '<span class="form-error is-visible">:message</span>' ) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 columns">
                            {!! Form::label('value', 'Setting Value', ['class' => $errors->first('value', 'is-invalid-label')])!!}
                            {!! Form::text('value', null, ['id' => 'valuetext', 'class' => $errors->first('value', 'is-invalid-input')]) !!}
                            {!! Form::select('value', [0 => 'No', 1 => 'Yes'], null, ['id' => 'valueselect', 'disabled' => 'disabled', 'style' => 'display:none;']) !!}
                            {!! $errors->first('value', '<span class="form-error is-visible">:message</span>' ) !!}
                        </div>
                    </div>
                    <div class="row" id="textarea-class" style="display:none;">
                        <div class="small-12 columns">
                            {!! Form::label('class', 'Textarea Class', ['class' => $errors->first('class', 'is-invalid-label')])!!}
                            {!! Form::select('class', ['' => 'None', 'basic-editor' => 'Basic Editor', 'advanced-editor' => 'Advanced Editor']) !!}
                            {!! $errors->first('class', '<span class="form-error is-visible">:message</span>' ) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 columns text-right">
                            {!! Form::submit('Create Setting', ['class' => 'button success']) !!}
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
        $(document).on('change', '#settingtype', function () {
            if ($(this).val() == 'truefalse') {
                $('#valueselect').removeAttr('disabled').show();
                $('#valuetext').attr('disabled', 'disabled').hide();
            } else {
                $('#valuetext').removeAttr('disabled').show();
                $('#valueselect').attr('disabled', 'disabled').hide();
            }
            if ($(this).val() == 'textarea') {
                $('#textarea-class').show();
            } else {
                $('#textarea-class').hide();
            }
        });
    </script>
@stop
