@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Edit Slideshow
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 columns">
                <p class="module-title">Edit Slideshow</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 medium-6 columns">
            <div class="content-block">
                <p class="content-block-title">Slideshow Details</p>
                <div class="content">
                    {!! Form::model($slideshow, ['route' => ['mc-admin.slideshows.update', $slideshow->id], 'method' => 'PUT']) !!}
                    @include('Slideshow::Admin.form', ['submit' => 'Save Slideshow'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-header">
                    <div class="row align-middle">
                        <div class="small-6 columns">
                            <p class="table-block-title">Existing Slides</p>
                        </div>
                        <div class="small-6 columns text-right">
                            <a onclick="formMultipleImages('{{ $slideshow->id }}', '{{ route('mc-admin.slide.multiple') }}');" class="button warning">Add Images</a>
                        </div>
                    </div>
                </div>
                <div class="table-block-content">
                    <table class="data-table" id="sortable">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Image</th>
                            <th>Last Updated</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($slideshow->slides->count() > 0)
                            @foreach ($slideshow->slides as $slide)
                                <tr id="slides_{{ $slide->id }}">
                                    <td class="handle"><i class="fa fa-arrows-v"></i></td>
                                    <td data-label="Image"><img src="{{ ImageResizer::resize($slide->image, 100, 100) }}"></td>
                                    <td data-label="Last Updated"><span class="secondary">{{ $slideshow->present()->getUpdatedAt }}</span></td>
                                    <td>
                                        <a title="Edit Slide" href="{{ route('mc-admin.slides.edit', $slide->id) }}" class="icon-button trigger-reveal info"><i class="far fa-edit"></i></a>
                                        <a title="Delete Slide" href="{{ route('mc-admin.slides.confirm-delete', $slide->id) }}" class="icon-button alert trigger-reveal"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-results">
                                <td colspan="5" class="text-center">No slides added yet</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop
