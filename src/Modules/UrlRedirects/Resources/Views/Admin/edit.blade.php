@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Edit Url Redirect
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 columns">
                <p class="module-title"> Edit Url Redirect </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 medium-6 columns">
            <div class="content-block">
                <p class="content-block-title">Url Redirect Details</p>
                <div class="content">
                    {!! Form::model($urlredirect, ['route' => ['mc-admin.urlredirects.update', $urlredirect->id], 'method' => 'PUT']) !!}
                        @include('UrlRedirects::Admin.form', ['submit' => 'Save Url Redirect'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop