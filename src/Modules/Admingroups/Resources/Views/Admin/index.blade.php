@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Admin Groups
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title">Admin Group Management</p>
            </div>
            <div class="small-12 medium-6 columns">
                <ul class="button-list">
                    <li>
                        <a href="{{ route('mc-admin.admins.index') }}" class="button primary">Back to all Admins</a>
                    </li>
                    <li>
                        <a href="{{ route('mc-admin.admingroups.create') }}" class="button warning"> Create Admin Group</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-header">
                    @include('Admingroups::Admin.sub-menu')
                </div>
                <div class="table-block-content">
                    <table class="data-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Last Updated</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($admingroups->count() > 0)
                            @foreach ($admingroups as $admingroup)
                                <tr>
                                    <td data-label="Name">
                                        @if($admingroup->trashed())
                                            {{ $admingroup->present()->getName }}
                                        @else
                                            <a href="{{ route('mc-admin.admingroups.edit', $admingroup->id) }}">{{ $admingroup->present()->getName }} </a>
                                        @endif
                                    </td>
                                    <td data-label="Last Updated">
                                        <span class="secondary">
                                            {{ $admingroup->present()->getUpdatedAt }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($admingroup->trashed())
                                            <a title="Restore Admin Group" href="{{ route('mc-admin.admingroups.confirm-restore', $admingroup->id) }}" class="icon-button trigger-reveal success"><i class="far fa-sync-alt"></i></a>
                                        @else
                                            <a title="Edit Admin Group" href="{{ route('mc-admin.admingroups.edit', $admingroup->id) }}" class="icon-button primary"><i class="far fa-edit"></i></a>
                                            @if($admingroup->id != 1)
                                                <a title="Delete Admin Group" href="{{ route('mc-admin.admingroups.confirm-delete', $admingroup->id) }}" class="icon-button trigger-reveal alert"><i class="far fa-trash-alt"></i></a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-results">
                                <td colspan="3">There are no {{ request()->input('filter') }} admin groups available.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop
