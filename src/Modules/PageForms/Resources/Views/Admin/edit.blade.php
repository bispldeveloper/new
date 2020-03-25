@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Update Page Form: {{ $pageform->present()->getName }}
@stop

@section('content')
    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title"> Update Page Form: {{ $pageform->present()->getName }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            {!! Form::model($pageform, ['route' => ['mc-admin.pageforms.update', $pageform->id], 'method' => 'PUT']) !!}
                @include('PageForms::Admin.form')
                <div class="button-block">
                    <div class="row">
                        <div class="small-6 columns">
                            @if(! $pageform->is_module)
                                <a href="{{ route('mc-admin.pageforms.confirm-delete', $pageform->id) }}" class="button alert trigger-reveal">Delete Page Form</a>
                            @endif
                        </div>
                        <div class="small-6 columns text-right">
                            {!! Form::submit('Save Page Form', ['class' => 'button success']) !!}
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('scripts')
    @parent
    @include('PageForms::Admin.partials.scripts')
@stop
