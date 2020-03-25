@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Delete Record
@stop

@section('content')

    <div class="row">
        <div class="small-12 columns">
            <div class="content-block">
                <p class="content-block-title">Are you sure you want to restore this record.</p>
                <div class="content">
                    {!! Form::open(['url' => $restoreRoute]) !!}
                    <div class="row">
                        <div class="small-6 columns">
                            <a href="#" class="button expanded secondary" data-close>Cancel</a>
                        </div>
                        <div class="small-6 columns">
                            {!! Form::submit('Confirm', ['class' => 'button expanded success']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop