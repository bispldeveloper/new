@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Create Admin Group
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 large-6 columns">
                <p class="module-title"> Create Admin Group</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 large-6 columns">
            <div class="content-block">
                <p class="content-block-title">Admin Group Details</p>
                <div class="content">
                    {!! Form::open(['route' => 'mc-admin.admingroups.store']) !!}
                    <div class="row">
                        <div class="small-12 columns">
                            {!! Form::label('name', 'Name', ['class' => $errors->first('name', 'is-invalid-label')])!!}
                            {!! Form::text('name', null, ['class' => $errors->first('name', 'is-invalid-input')]) !!}
                            {!! $errors->first('name', '<span class="form-error is-visible">:message</span>' ) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 columns text-right">
                            {!! Form::submit('Create Admin Group', ['class' => 'button success']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop

