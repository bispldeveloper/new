@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Create Page Form
@stop

@section('content')
    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title"> Create Page Form</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            {!! Form::open(['route' => 'mc-admin.pageforms.store', 'method' => 'POST']) !!}
                @include('PageForms::Admin.form')
                <div class="button-block">
                    <div class="row">
                        <div class="small-12 columns text-right">
                            {!! Form::submit('Create Page Form', ['class' => 'button success']) !!}
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('scripts')
    @parent
    @include('PageForms::Admin.partials.scripts')
@stop
