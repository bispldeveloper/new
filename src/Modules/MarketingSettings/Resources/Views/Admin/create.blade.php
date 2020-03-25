@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Add Marketing Setting
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
                    {!! Form::model(['route' => ['mc-admin.marketingsettings.create'], 'method' => 'POST']) !!}
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
