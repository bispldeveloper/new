@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Enquiries
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title">Enquiries</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-header">
                    @includeIf('PageFormEnquiries::Admin.sub-menu')
                </div>
                <div class="table-block-content">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>{!! sortable_link('name', 'Form Name') !!}</th>
                                <th>Status</th>
                                <th>Email To</th>
                                <th>{!! sortable_link('updated_at', 'Last Updated') !!}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pageformenquiries->count() > 0)
                                @foreach ($pageformenquiries as $pageformenquiry)
                                    <tr>
                                        <td data-label="Form Name">{{ $pageformenquiry->pageform->name }}</td>
                                        <td data-label="Status">{!! $pageformenquiry->present()->getStatusLabel !!}</td>
                                        <td data-label="Email To">{{ $pageformenquiry->email_to }}</td>
                                        <td data-label="Last Updated"><span class="secondary">{{ $pageformenquiry->present()->getUpdatedAt }}</span></td>
                                        <td>
                                            <a title="Show Enquiry" href="{{ route('mc-admin.pageformenquiries.show', $pageformenquiry->id) }}" class="icon-button info"><i class="far fa-eye"></i></a>
                                            <a title="Delete Enquiry" href="{{ route('mc-admin.pageformenquiries.confirm-delete', $pageformenquiry->id) }}" class="icon-button trigger-reveal alert"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="no-results">
                                    <td colspan="5">There are no page forms available.</td>
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
            @include('Admins::Admin.partials.pagination', ['paginator' => $pageformenquiries->appends(request()->except('pageforms'))])
        </div>
    </div>

@stop
