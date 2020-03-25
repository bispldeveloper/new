@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Create Slideshow
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 columns">
                <p class="module-title"> Create Slideshow </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 medium-6 columns">
            <div class="content-block">
                <p class="content-block-title">Slideshow Details</p>
                <div class="content">
                    {!! Form::open(['route' => 'mc-admin.slideshows.store']) !!}
                    @include('Slideshow::Admin.form', ['submit' => 'Create Slideshow'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop