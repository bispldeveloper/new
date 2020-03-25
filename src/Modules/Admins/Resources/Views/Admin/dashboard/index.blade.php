@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Dashboard
@stop

@section('header')
    @if($marketingreport)
        <div class="alerts callout success">
            <p>{{ $marketingreport->present()->getName }} marketing report is now available <a target="_blank" href="{{ $marketingreport->present()->getSlug }}">view it now.</a></p>
        </div>
    @endif
    <div id="dashboard-body-header-banner" style="background-image:url({{ ($mc_branding->dashboard_banner != '' ? ImageResizer::fit($mc_branding->dashboard_banner, 1600, 290,'jpg', 100, 'transparent') : admin('images/eyesite-dashboard-banner.jpg')) }});">
        <div class="row align-center">
            <div class="small-12 medium-11 columns">
                <h2>{{ config('app.name') }}</h2>
                <p>Powered by EyeSite</p>
            </div>
        </div>
    </div>
    @if(! empty($mcErrors))
        <div class="alerts callout warning">
            @foreach($mcErrors as $mcError)
                <p>{{ $mcError }}</p>
            @endforeach
        </div>
    @endif
@stop

@section('content')
    <div class="row">
        <div class="small-12 large-6 columns">
            <div class="table-block">
                <div class="table-block-header">
                    <p class="table-block-title">Recently Edited Pages</p>
                </div>
                <div class="table-block-content">
                    <table class="data-table">
                        <thead>
                        <th>Title</th>
                        <th>Last Updated</th>
                        </thead>
                        <tbody>
                        @if($pages->count() > 0)
                            @foreach($pages as $page)
                                <tr>
                                    <td data-label="Title">
                                        <a title="Edit Page" href="{{ route('mc-admin.pages.edit', $page->id)  }}">
                                            {{ $page->present()->getTitle }}
                                        </a>
                                    </td>
                                    <td data-label="Last Updated">
                                        <span class="secondary">{{ $page->present()->getUpdatedAt }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-results">
                                <td colspan="2">Unfortunately there are no pages available.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="small-12 large-6 columns">
            <div class="table-block">
                <div class="table-block-header">
                    <p class="table-block-title">Recent Enquiries</p>
                </div>
                <div class="table-block-content">
                    <table class="data-table">
                        <thead>
                            <th>Form Name</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @if($enquiries->count() > 0)
                                @foreach($enquiries as $enquiry)
                                    <tr>
                                        <td data-label="Form Name">{{ $enquiry->pageform->name }}</td>
                                        <td data-label="Status">{!! $enquiry->present()->getStatusLabel !!}</td>
                                        <td data-label="Last Updated"><span class="secondary">{{ $enquiry->present()->getUpdatedAt }}</span></td>
                                        <td>
                                            <a title="Show Enquiry" href="{{ route('mc-admin.pageformenquiries.show', $enquiry->id) }}" class="icon-button info"><i class="far fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="no-results">
                                    <td colspan="2">Unfortunately there are no enquiries available.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
