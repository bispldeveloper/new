@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle', 'Update Field')

@section('content')
    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title"> Update Field</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="content-block">
                {!! Form::model($pageformfield, ['route' => ['mc-admin.pageformfields.update', $pageformfield->id], 'method' => 'PUT']) !!}
                    @include('PageFormFields::Admin.form')
                    <div class="button-block">
                        <div class="row">
                            <div class="small-12 columns text-right">
                                {!! Form::submit('Update Field', ['class' => 'button success']) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop