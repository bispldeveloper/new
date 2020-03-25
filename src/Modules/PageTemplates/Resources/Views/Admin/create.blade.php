@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Create Page Template
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 columns">
                <p class="module-title"> Create Page Template </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 medium-6 columns">
            {!! Form::open(['route' => 'mc-admin.pagetemplates.store']) !!}
            @include('PageTemplates::Admin.form', ['submit' => 'Create Page Template'])
            {!! Form::close() !!}
        </div>
    </div>

@stop