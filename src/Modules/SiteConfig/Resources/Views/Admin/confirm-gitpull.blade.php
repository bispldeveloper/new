@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Pull from Github
@stop

@section('content')

    <div class="row">
        <div class="small-12 columns">
            <div class="content-block">
                <p class="content-block-title">Are you sure you want pull from Git?</p>
                <div class="content">
                    {!! Form::open(['route' => 'mc-admin.gitpull.pull', 'method' => 'POST']) !!}
                        {!! Form::hidden('confirm-gitpull', 'yes') !!}
                        <p>This action will pull any changes from the master branch.</p>
                        <p>This action is <b class="alert">unrecoverable.</b></p>
                        <div class="row">
                            <div class="small-6 columns">
                                <a href="#" class="button expanded secondary" data-close>Cancel</a>
                            </div>
                            <div class="small-6 columns">
                                {!! Form::submit('Confirm', ['class' => 'button expanded alert']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop