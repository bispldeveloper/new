@extends('Pages::Frontend.layouts.default')

@section('metaTitle', '404 Error')
@section('metaDescription', 'The page you are looking for could not be found.')

@section('content')

    <div class="row">
        <div class="small-12 columns">
            <h1>404 Error</h1>
            <p>Sorry but you the page you are looking for could not be found. To return to the homepage please
                <a href="{{ route('home') }}">Click Here</a>.</p>
        </div>
    </div>

@stop

@section('scripts')
    @parent


@stop
