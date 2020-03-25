@extends('Admins::Admin.layouts.auth')

@section('authTitle')
    Reset Password
@stop

@section('content')
    <div class="form-header">
        <p class="title">Reset Password</p>
        <p class="subtitle">Reset your password by using the form below.</p>
    </div>
    <div class="form-holder">
        {!! Form::open(['route' => 'mc-admin.reset']) !!}
        {!! Form::hidden('token', $token) !!}
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('email', 'Your Email', ['class' => $errors->first('email', 'is-invalid-label')])!!}
                {!! Form::text('email', null, ['class' => $errors->first('email', 'is-invalid-input')])!!}
                {!! $errors->first('email', '<span class="form-error is-visible">:message</span>') !!}
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('password', 'Your Password', ['class' => $errors->first('password', 'is-invalid-label')])!!}
                {!! Form::password('password', ['class' => $errors->first('password', 'is-invalid-input')]) !!}
                {!! $errors->first('password', '<span class="form-error is-visible">:message</span>') !!}
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('password_confirmation', 'Confirm Password', ['class' => $errors->first('password_confirmation', 'is-invalid-label')]) !!}
                {!! Form::password('password_confirmation', ['class' => $errors->first('password_confirmation', 'is-invalid-input')]) !!}
                {!! $errors->first('password_confirmation', '<span class="form-error is-visible">:message</span>') !!}
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                {!! Form::submit('Reset Password', ['class' => 'button warning expanded']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="form-footer">
        <a href="{{ route('mc-admin.login') }}">Back to login?</a>
    </div>
@stop


