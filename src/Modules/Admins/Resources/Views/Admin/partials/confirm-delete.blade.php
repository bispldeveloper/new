@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Delete Record
@stop

@section('content')

    <div class="row">
        <div class="small-12 columns">
            <div class="content-block">
                <p class="content-block-title">Are you sure you want to delete this record.</p>
                <div class="content">
                    {!! Form::open(['url' => $destroyRoute, 'method' => 'DELETE']) !!}
                    <p>This will mark the record as deleted in the database, allowing it to be restored at a later date.</p>
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

