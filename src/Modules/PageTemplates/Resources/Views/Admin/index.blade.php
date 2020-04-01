@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Manage Page Templates
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title">Page Templates</p>
            </div>
            <div class="small-12 medium-6 columns">
                <ul class="button-list">
                    <li>
                        <a href="{{ route('mc-admin.pagetemplates.create') }}" class="button warning"> Create New Page Template</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-header">
                    @include('PageTemplates::Admin.sub-menu')
                </div>
                <div class="table-block-content">
                    <table class="data-table">
                        <thead>
                        <tr>
                            <th>{!! sortable_link('name', 'Template Name') !!}</th>
                            <th>Status</th>
                            <th>Layout</th>
                            <th>{!! sortable_link('updated_at', 'Last Updated') !!}</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($pagetemplates->count() > 0)
                            @foreach ($pagetemplates as $pagetemplate)
                                <tr>
                                    <td data-label="Name">
                                        @if($pagetemplate->trashed())
                                            {{ $pagetemplate->present()->getName }}
                                        @else
                                            <a title="Edit Pagetemplate" href="{{ route('mc-admin.pagetemplates.edit', $pagetemplate->id) }}">{{ $pagetemplate->present()->getName }}</a>
                                        @endif
                                    </td>
                                    <td data-label="Status">{!! $pagetemplate->present()->getPublishedLabel !!}</td>
                                    <td data-label="Layout">{{ $pagetemplate->present()->getViewFile }}</td>
                                    <td data-label="Last Updated">
                                        <span class="secondary">
                                             {{ $pagetemplate->present()->getUpdatedAt }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($pagetemplate->trashed())
                                            <a title="Restore Pagetemplate" href="{{ route('mc-admin.pagetemplates.confirm-restore', $pagetemplate->id) }}" class="icon-button trigger-reveal success"><i class="far fa-sync-alt"></i></a>
                                        @else
                                            <a title="Edit Pagetemplate" href="{{ route('mc-admin.pagetemplates.edit', $pagetemplate->id) }}" class="icon-button info"><i class="far fa-edit"></i></a>
                                            <a title="Delete Pagetemplate" href="{{ route('mc-admin.pagetemplates.confirm-delete', $pagetemplate->id) }}" class="icon-button trigger-reveal alert"><i class="far fa-trash-alt"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-results">
                                <td colspan="5" class="text-center">There are no {{ request()->input('filter') }} templates available.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop
