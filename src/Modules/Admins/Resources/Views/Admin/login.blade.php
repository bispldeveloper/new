@extends('Admins::Admin.layouts.auth')

@section('authTitle')
    Login
@stop

@section('content')
    <div class="form-header">
        <p class="title">Welcome Back</p>
        <p class="subtitle">Please use the form below to sign into to your account.</p>
    </div>
    <div class="form-holder">
        {!! Form::open(['route' => 'mc-admin.login']) !!}
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('login', 'Your Email or Username', ['class' => $errors->first('login', 'is-invalid-label')])!!}
                {!! Form::text('login', null, ['class' => $errors->first('login', 'is-invalid-input')])!!}
                {!! $errors->first('login', '<span class="form-error is-visible">:message</span>') !!}
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
                <input id="remember" type="checkbox"><label for="remember">Remember me</label>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                {!! Form::submit('Sign In', ['class' => 'button warning expanded']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="form-footer">
        <a href="{{ route('mc-admin.request') }}"> Forgotten your password?</a>
    </div>
@stop