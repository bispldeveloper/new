@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Slideshows
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title">Slideshows</p>
            </div>
            <div class="small-12 medium-6 columns">
                <ul class="button-list">
                    <li>
                        <a href="{{ route('mc-admin.slideshows.create') }}" class="button warning"> Create Slideshow</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-header">
                    @include('Slideshow::Admin.sub-menu')
                </div>
                <div class="table-block-content">
                    <table class="data-table">
                        <thead>
                        <tr>
                            <th>{!! sortable_link('name', 'Name') !!}</th>
                            <th>Status</th>
                            <th>{!! sortable_link('updated_at', 'Last Updated') !!}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($slideshows->count() > 0)
                            @foreach ($slideshows as $slideshow)
                                <tr>
                                    <td data-label="Name">
                                        @if($slideshow->trashed())
                                            {{ $slideshow->present()->getName }}
                                        @else
                                            <a title="Edit Slideshow" href="{{ route('mc-admin.slideshows.edit', $slideshow->id) }}">{{ $slideshow->present()->getName }}</a>
                                        @endif
                                    </td>
                                    <td data-label="Status">{!! $slideshow->present()->getPublishedLabel !!}</td>
                                    <td data-label="Last Updated">
                                        <span class="secondary">
                                            {{ $slideshow->present()->getUpdatedAt }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($slideshow->trashed())
                                            <a title="Restore Slideshow" href="{{ route('mc-admin.slideshows.confirm-restore', $slideshow->id) }}" class="icon-button trigger-reveal success"><i class="far fa-sync-alt"></i></a>
                                        @else
                                            <a title="Edit Slideshow" href="{{ route('mc-admin.slideshows.edit', $slideshow->id) }}" class="icon-button primary"><i class="far fa-edit"></i></a>
                                            <a title="Delete Slideshow" href="{{ route('mc-admin.slideshows.confirm-delete', $slideshow->id) }}" class="icon-button trigger-reveal alert"><i class="far fa-trash-alt"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-results">
                                <td colspan="4">There are no {{ request()->input('filter') }} slideshows available yet</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 text-right columns">
            @include('Admins::Admin.partials.pagination', ['paginator' => $slideshows->appends(request()->except('pages'))])
        </div>
    </div>

@stop
