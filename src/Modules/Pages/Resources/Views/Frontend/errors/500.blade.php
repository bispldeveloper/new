@extends('Pages::Frontend.layouts.default')

@section('metaTitle', 'Error')
@section('metaDescription', 'Whoops there\'s been an error')

@section('content')

    <div class="row">
        <div class="small-12 columns">
            <h1>Whoops there's been an error</h1>
            <p>We are experiencing technical difficulties displaying this page, please try again later.</p>
        </div>
    </div>

@stop

@section('scripts')
    @parent


@stop
