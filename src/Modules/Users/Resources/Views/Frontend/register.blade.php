@extends('Pages::Frontend.layouts.default')

@section('metaTitle', 'Register')
@section('metaDescription', 'Register your account.')

@section('content')

    <div class="row">
        <div class="small-12 medium-12 large-6 columns">

            <h1>Register your account</h1>

            @if (session()->get('status'))
                <div class="row">
                    <div class="alert-holder">
                        <div class="alert-box" data-options="" data-alert>
                            <p>{{ session('status') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            {!! Form::open(['route' => 'account.register.post']) !!}

            <div class="row">
                <div class="small-12 medium-6 columns">
                    <div class="{{ ($errors->first('first_name') ? 'error':'') }}">
                        {!! Form::label('first_name', 'First Name')!!}
                        {!! Form::text('first_name') !!}
                    </div>
                    {!! $errors->first('first_name', '<p class="help-text" id="first_name">:message</p>' ) !!}
                </div>
                <div class="small-12 medium-6 columns">
                    <div class="{{ ($errors->first('last_name') ? 'error':'') }}">
                        {!! Form::label('last_name', 'Last Name')!!}
                        {!! Form::text('last_name') !!}
                    </div>
                    {!! $errors->first('last_name', '<p class="help-text" id="last_name">:message</p>' ) !!}
                </div>
            </div>

            <div class="row">
                <div class="small-12 columns">
                    <div class="{{ ($errors->first('email') ? 'error':'') }}">
                        {!! Form::label('email', 'Email Address')!!}
                        {!! Form::text('email')!!}
                    </div>
                    {!! $errors->first('email', '<p class="help-text" id="email">:message</p>' ) !!}
                </div>
            </div>

            <div class="row">
                <div class="small-12 medium-6 columns">
                    <div class="{{ ($errors->first('password') ? 'error':'') }}">
                        {!! Form::label('password', 'Password')!!}
                        {!! Form::password('password') !!}
                    </div>
                    {!! $errors->first('password', '<p class="help-text" id="password">:message</p>' ) !!}
                </div>
                <div class="small-12 medium-6 columns">
                    <div class="{{ ($errors->first('password_confirmation') ? 'error':'') }}">
                        {!! Form::label('password_confirmation', 'Confirm Password')!!}
                        {!! Form::password('password_confirmation') !!}
                    </div>
                    {!! $errors->first('password_confirmation', '<p class="help-text" id="password_confirmation">:message</p>' ) !!}
                </div>
            </div>

            <div class="row">
                <div class="small-12 columns">
                    {!! Form::submit('Register', ['class' => 'button right']) !!}
                </div>
            </div>
            <div class="row">
                <div class="small-12 columns">
                    <a href="{{ route('account.login') }}">Already have an account?</a>
                </div>
            </div>

            {!! Form::close() !!}

        </div>

    </div>


@stop
