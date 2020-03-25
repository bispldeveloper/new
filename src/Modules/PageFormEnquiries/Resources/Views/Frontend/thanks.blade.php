@extends('Pages::Frontend.layouts.default')

@section('metaTitle', $pageform->name . ' thanks')

@section('content')
    <div class="row">
        <div class="small-12 columns">
            {!! $pageform->success_message !!}
        </div>
    </div>
@stop

@section('scripts')
    @parent
    {!! $pageform->conversion_tracking !!}
@stop