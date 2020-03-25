@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Create Url Redirect
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 columns">
                <p class="module-title"> Create Url Redirect </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 medium-6 columns">
            <div class="content-block">
                <p class="content-block-title">Url Redirect Details</p>
                <div class="content">
                    {!! Form::open(['route' => 'mc-admin.urlredirects.store']) !!}
                        @include('UrlRedirects::Admin.form', ['submit' => 'Create Url Redirect'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop