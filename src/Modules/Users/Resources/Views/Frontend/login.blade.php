@extends('Pages::Frontend.layouts.default')

@section('metaTitle', 'Login')
@section('metaDescription', 'Login to your account.')

@section('content')

    <div class="row">
        <div class="small-12 medium-12 large-6 columns">

            <h1>Login to your account</h1>

            @if (session()->get('status'))
                <div class="row">
                    <div class="alert-holder">
                        <div class="alert-box" data-options="" data-alert>
                            <p>{{ session('status') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            {!! Form::open(['route' => 'account.login.post']) !!}

            <div class="row">
                <div class="small-12 columns">
                    <div class="{{ ($errors->first('email') ? 'error':'') }}">
                        {!! Form::label('email', 'Email')!!}
                        {!! Form::text('email')!!}
                    </div>
                    {!! $errors->first('email', '<p class="help-text" id="email">:message</p>' ) !!}
                </div>
            </div>

            <div class="row">
                <div class="small-12 columns">
                    <div class="{{ ($errors->first('password') ? 'error':'') }}">
                        {!! Form::label('password', 'Password')!!}
                        {!! Form::password('password') !!}
                    </div>
                    {!! $errors->first('password', '<p class="help-text" id="password">:message</p>' ) !!}
                </div>
            </div>

            <div class="row">
                <div class="small-12 columns">
                    {!! Form::submit('Login', ['class' => 'button right']) !!}
                </div>
            </div>
            <div class="row">
                <div class="small-12 columns">
                    <a href="{{ route('account.forgottenpassword') }}">Forgot password?</a>
                </div>
            </div>

            {!! Form::close() !!}

        </div>

    </div>


@stop
