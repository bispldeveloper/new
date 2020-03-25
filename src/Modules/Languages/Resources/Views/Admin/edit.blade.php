@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Edit Language
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 columns">
                <p class="module-title">Edit Language</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 medium-6 columns">
            <div class="content-block">
                <p class="content-block-title">Language Details</p>
                <div class="content">
                    {!! Form::model($language, ['route' => ['mc-admin.languages.update', $language->id], 'method' => 'PUT']) !!}
                        @include('Languages::Admin.form', ['submit' => 'Save Language'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop