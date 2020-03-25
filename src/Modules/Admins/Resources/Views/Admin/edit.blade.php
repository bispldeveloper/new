@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Update Admin: {{ $admin->present()->getFullName }}
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 large-6 columns">
                <p class="module-title"> Update Admin: {{ $admin->present()->getFullName }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 large-6 columns">
            <div class="content-block">
                <p class="content-block-title">User Details</p>
                <div class="content">
                    {!! Form::model($admin, ['route' => ['mc-admin.admins.update', $admin->id], 'method' => 'PUT']) !!}
                    @include('Admins::Admin.form')
                    <div class="row">
                        <div class="small-12 columns text-right">
                            {!! Form::submit('Save User', ['class' => 'button success']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="small-12 large-6 columns">
            <div class="content-block">
                <p class="content-block-title">User Password</p>
                <div class="content">
                    @include('Admins::Admin.password-form')
                </div>
            </div>
        </div>
    </div>

@stop