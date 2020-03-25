@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Add a Block
@stop


@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 large-6 columns">
                <p class="module-title"> Create Template Block </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 large-6 columns">
            {!! Form::open(['route' => ['mc-admin.pagetemplates.pagetemplateblocks.store', $pagetemplate->id]]) !!}
                @include('PageTemplateBlocks::Admin.form', ['submit' => 'Add Template Block'])
            {!! Form::close() !!}
        </div>
    </div>

@stop