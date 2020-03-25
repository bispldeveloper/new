@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Edit Template Block
@stop


@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 large-6 columns">
                <p class="module-title"> Edit Template Block </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 large-6 columns">
            {!! Form::model($pagetemplateblock, ['route' => ['mc-admin.pagetemplates.pagetemplateblocks.update', $pagetemplate->id, $pagetemplateblock->id], 'method' => 'PUT']) !!}
                @include('PageTemplateBlocks::Admin.form', ['submit' => 'Save Template Block'])
            {!! Form::close() !!}
        </div>
    </div>

@stop