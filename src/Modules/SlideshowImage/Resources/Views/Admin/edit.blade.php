@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Update Slide Details
@stop

@section('content')

    <div class="row">
        <div class="small-12 columns">
            {!! Form::model($slide, ['route' => ['mc-admin.slides.update', $slide->id], 'method' => 'PATCH']) !!}
            <div class="content-block">
                <p class="content-block-title">Update Slide</p>
                <div class="content">
                    @include('SlideshowImage::Admin.form')
                    {!! Form::hidden('slideshow_id', $slide->slideshow_id) !!}
                </div>
            </div>
            <div class="row">
                <div class="small-6 columns">
                    <a href="#" class="button expanded secondary" data-close>Cancel</a>
                </div>
                <div class="small-6 columns">
                    {!! Form::submit('Save Slide', ['class' => 'button expanded alert']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('scripts')
    @parent

@stop
