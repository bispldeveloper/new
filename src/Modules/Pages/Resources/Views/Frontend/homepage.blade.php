@extends('Pages::Frontend.layouts.default')

@section('metaTitle', $page->present()->getMetaTitle)
@section('metaDescription', $page->present()->getMetaDescription)
@section('metaCanonical', $page->present()->getMetCanonical)

@section('content')

    <div class="row">
        <div class="small-12 columns">
            <h1>{{ $page->present()->getTitle }}</h1>
            <h3>{{ $page->present()->getSubtitle }}</h3>
        </div>
    </div>

@stop

@section('scripts')
    @parent
@stop
