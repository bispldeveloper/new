@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Create Language
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 columns">
                <p class="module-title"> Create Language </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-12 medium-6 columns">
                    <div class="content-block">
                        <p class="content-block-title">Language Details</p>
                        <div class="content">
                            {!! Form::open(['route' => 'mc-admin.languages.store']) !!}
                            @include('Languages::Admin.form', ['submit' => 'Create Language'])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

