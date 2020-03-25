@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Create Admin
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 large-6 columns">
                <p class="module-title"> Create Admin </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 large-6 columns">
            <div class="content-block">
                <p class="content-block-title"> Admin Details</p>
                <div class="content">
                    {!! Form::open(['route' => 'mc-admin.admins.store']) !!}
                    @include('Admins::Admin.form')
                    <div class="row">
                        <div class="small-12 columns">
                            {!! Form::label('password', 'Password', ['class' => $errors->first('password', 'is-invalid-label')])!!}
                            {!! Form::text('password', null, ['class' => $errors->first('password', 'is-invalid-input')]) !!}
                            {!! $errors->first('password', '<span class="form-error is-visible">:message</span>' ) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 columns">
                            {!! Form::label('password_confirmation', 'Confirm Password', ['class' => $errors->first('password_confirmation', 'is-invalid-label')])!!}
                            {!! Form::text('password_confirmation', null, ['class' => $errors->first('password_confirmation', 'is-invalid-input')]) !!}
                            {!! $errors->first('password_confirmation', '<span class="form-error is-visible">:message</span>' ) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 columns text-right">
                            {!! Form::submit('Create Admin', ['class' => 'button success']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop

