@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Update User: {{ $user->present()->getFullName }}
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 columns">
                <p class="module-title"> Update User: {{ $user->present()->getFullName }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 medium-6 columns">
            <div class="content-block">
                <p class="content-block-title">User Details</p>
                <div class="content">
                    {!! Form::model($user, ['route' => ['mc-admin.users.update', $user->id], 'method' => 'PUT']) !!}
                    @include('Users::Admin.form')
                    <div class="row">
                        <div class="small-12 columns text-right">
                            {!! Form::submit('Save User', ['class' => 'button success']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="small-12 medium-6 columns">
            <div class="content-block">
                <p class="content-block-title">User Password</p>
                <div class="content">
                    @include('Users::Admin.password-form')
                </div>
            </div>
        </div>
    </div>

@stop