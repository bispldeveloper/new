@extends('Pages::Frontend.layouts.default')

@section('metaTitle', 'Account')

@section('content')

    <div class="row">
        <div class="small-12 columns">
            <h1>Hi {{ auth()->user()->present()->getFirstName }}!</h1>
        </div>
    </div>

@stop
