@extends('Pages::Frontend.layouts.default')

@section('metaTitle', 'Reset Password')
@section('metaDescription', 'Reset your account password.')

@section('content')

    <div class="row">
        <div class="small-12 medium-12 large-6 columns">

            @if (session()->get('status'))
                <div class="row">
                    <div class="alert-holder">
                        <div class="alert-box" data-options="" data-alert>
                            <p>{{ session('status') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            {!! Form::open(['route' => 'account.resetpassword.post']) !!}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="row">
                <div class="small-12 columns">
                    <div class="{!! ($errors->first('email') ? 'error':'') !!}">
                        {!! Form::label('email', 'Your Email') !!}
                        {!! Form::text('email') !!}
                    </div>
                    {!! $errors->first('email', '<p class="help-text" id="email">:message</p>') !!}
                </div>
            </div>

            <div class="row">
                <div class="small-12 columns">
                    <div class="{!! ($errors->first('password') ? 'error':'') !!}">
                        {!! Form::label('password', 'Your Password')!!}
                        {!! Form::password('password') !!}
                    </div>
                    {!! $errors->first('password', '<p class="help-text" id="password">:message</p>') !!}
                </div>
            </div>

            <div class="row">
                <div class="small-12 columns">
                    <div class="{!! ($errors->first('password_confirmation') ? 'error':'') !!}">
                        {!! Form::label('password_confirmation', 'Confirm Password') !!}
                        {!! Form::password('password_confirmation') !!}
                    </div>
                    {!! $errors->first('password_confirmation', '<p class="help-text" id="password_confirmation">:message</p>') !!}
                </div>
            </div>

            <div class="row">
                <div class="small-12 columns">
                    {!! Form::submit('Reset Password', ['class' => 'button']) !!}
                </div>
            </div>

            <div class="row">
                <div class="small-12 columns">
                    <a href="{{ route('account.login') }}"> Go Back? </a>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@stop


