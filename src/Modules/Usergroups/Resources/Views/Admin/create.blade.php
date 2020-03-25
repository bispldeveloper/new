@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Create User Group
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 columns">
                <p class="module-title"> Create User Group</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 medium-6 columns">
            <div class="content-block">
                <p class="content-block-title">User Group Details</p>
                <div class="content">
                    {!! Form::open(['route' => 'mc-admin.usergroups.store']) !!}
                    <div class="row">
                        <div class="small-12 columns">
                            {!! Form::label('name', 'Name', ['class' => $errors->first('name', 'is-invalid-label')])!!}
                            {!! Form::text('name', null, ['class' => $errors->first('name', 'is-invalid-input')]) !!}
                            {!! $errors->first('name', '<span class="form-error is-visible">:message</span>' ) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 columns text-right">
                            {!! Form::submit('Create User Group', ['class' => 'button success']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop