@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Create Page
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 columns">
                <p class="module-title"> Create Page </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            {!! Form::open(['route' => 'mc-admin.pages.store']) !!}
            @include('Pages::Admin.form')
            <div class="button-block text-right">
                <div class="row">
                    <div class="small-12 columns">
                        {!! Form::hidden('pagetemplate_id', $template->id) !!}
                        {!! Form::submit('Create Page', ['class' => 'button success']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('scripts')
    @parent
    @include('Pages::Admin.partials.meta-count-scripts')
    <script>
        $(function () {
            $("#title").stringToSlug({
                getPut: '#slug',
                setEvents: 'keyup'
            });
        });
    </script>
@stop

