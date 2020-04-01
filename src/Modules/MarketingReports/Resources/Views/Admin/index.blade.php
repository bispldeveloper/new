@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Marketing Reports
@stop

@section('content')
    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 columns">
                <p class="module-title">Marketing Reports</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-header"></div>
                <div class="table-block-content">
                    <table class="data-table">
                        <thead>
                        <tr>
                            <th>{!! sortable_link('name', 'Report') !!}</th>
                            <th>Submitted By</th>
                            <th>{!! sortable_link('published_date', 'Uploaded Date') !!}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($marketingreports->count() > 0)
                            @foreach ($marketingreports as $marketingreport)
                                <tr>
                                    <td data-label="Report">
                                        <a href="{{ $marketingreport->present()->getSlug }}">{{ $marketingreport->present()->getName }}</a>
                                    </td>
                                    <td data-label="Submitted By">{{ $marketingreport->present()->getSubmittedBy }}</td>
                                    <td data-label="Uploaded Date">
                                        <span class="secondary">
                                            {{ $marketingreport->present()->getDate }}
                                        </span>
                                    </td>
                                    <td>
                                        <a {!! ($marketingreport->is_download != false ? 'target="_blank"' : '') !!} href="{{ $marketingreport->present()->getSlug }}" class="icon-button {!! ($marketingreport->is_download == false ? 'primary' : 'success') !!}">{!! ($marketingreport->is_download == false ? '<i class="far fa-eye"></i>' : '<i class="far fa-download"></i>') !!}</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-results">
                                <td colspan="4">You currently do not have any Marketing Reports.</td>
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
            @include('Admins::Admin.partials.pagination', ['paginator' => $marketingreports->appends(request()->except('pages'))])
        </div>
    </div>
@stop

@section('scripts')
    @parent


@stop
