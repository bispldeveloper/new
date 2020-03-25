@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Page Forms
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title">Page Forms</p>
            </div>
            <div class="small-12 medium-6 columns">
                <ul class="button-list">
                    <li>
                        <a href="{{ route('mc-admin.pageforms.create') }}" class="button warning"> Create New Page Form</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-header">
                    @includeIf('PageForms::Admin.sub-menu')
                </div>
                <div class="table-block-content">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email To</th>
                                <th>Last Updated</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pageforms->count() > 0)
                                @foreach ($pageforms as $pageform)
                                    <tr>
                                        <td data-label="Name">
                                            <a title="Edit Page Form" href="{{ route('mc-admin.pageforms.edit', $pageform->id) }}">{{ $pageform->present()->getName }}</a>
                                        </td>
                                        <td data-label="Email To">{{ $pageform->email_to }}</td>
                                        <td data-label="Last Updated"><span class="secondary">{{ $pageform->present()->getUpdatedAt }}</span></td>
                                        <td>
                                            <a title="Edit Page Form" href="{{ route('mc-admin.pageforms.edit', $pageform->id) }}" class="icon-button info"><i class="far fa-edit"></i></a>
                                            @if(! $pageform->is_module)
                                                <a title="Delete Page Form" href="{{ route('mc-admin.pageforms.confirm-delete', $pageform->id) }}" class="icon-button trigger-reveal alert"><i class="far fa-trash-alt"></i></a>
                                            @endif
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
            @include('Admins::Admin.partials.pagination', ['paginator' => $pageforms->appends(request()->except('pageforms'))])
        </div>
    </div>

@stop