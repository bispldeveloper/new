@extends('Admins::Admin.layouts.auth')

@section('authTitle')
    Forgotten Password
@stop

@section('content')
    <div class="form-header">
        <p class="title">Forgotten Password</p>
        <p class="subtitle">Please enter the email associated with your account.</p>
    </div>
    <div class="form-holder">
        {!! Form::open(['route' => 'mc-admin.request']) !!}
        @if (session()->get('status'))
            <div class="row">
                <div class="small-12 columns">
                    <div class="alerts callout success">
                        <p>{{ session('status') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('email', 'Your Email', ['class' => $errors->first('email', 'is-invalid-label')])!!}
                {!! Form::text('email', null, ['class' => $errors->first('email', 'is-invalid-input')])!!}
                {!! $errors->first('email', '<span class="form-error is-visible">:message</span>') !!}
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                {!! Form::submit('Request Password', ['class' => 'button warning expanded']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="form-footer">
        <a href="{{ route('mc-admin.login') }}">Back to login?</a>
    </div>
@stop
