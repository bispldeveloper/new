@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle', 'Add Field')

@section('content')
    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title"> Add Field</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="content-block">
                {!! Form::open(['route' => ['mc-admin.pageforms.storefield', $pageform->id], 'method' => 'PUT']) !!}
                    <div class="row">
                        <div class="small-12 columns">
                            {!! Form::label('form_field_type_id', 'Field Type', ['class' => $errors->first('form_field_type_id', 'is-invalid-label')])!!}
                            {!! Form::select('form_field_type_id', $fieldtypes->pluck('name', 'id'), null, ['class' => $errors->first('form_field_type_id', 'is-invalid-input')]) !!}
                            {!! $errors->first('form_field_type_id', '<span class="form-error is-visible">:message</span>' ) !!}
                        </div>
                    </div>
                    @include('PageFormFields::Admin.form')
                    <div class="button-block">
                        <div class="row">
                            <div class="small-12 columns text-right">
                                {!! Form::submit('Add Field', ['class' => 'button success']) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop

@section('scripts')
    @parent
    @include('PageForms::Admin.partials.scripts')
@stop