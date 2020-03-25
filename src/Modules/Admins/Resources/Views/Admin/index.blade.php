@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Admin Management
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 large-6 columns">
                <p class="module-title">Admin Management</p>
            </div>
            <div class="small-12 large-6 columns">
                <ul class="button-list">
                    <li>
                        <a href="{{ route('mc-admin.admins.create') }}" class="button warning">Create Admin</a>
                    </li>
                    <li>
                        <a href="{{ route('mc-admin.admingroups.index') }}" class="button primary">Manage Admin Groups</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-header">
                    @include('Admins::Admin.sub-menu')
                </div>
                <div class="table-block-content">
                    <table class="data-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Admin Group</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($admins->count() > 0)
                            @foreach ($admins as $admin)
                                <tr>
                                    <td data-label="Name">
                                        @if($admin->trashed())
                                            {{ $admin->present()->getFullName }}
                                        @else
                                            <a title="Edit Admin" href="{{ route('mc-admin.admins.edit', $admin->id) }}">{{ $admin->present()->getFullName }}</a>
                                        @endif
                                    </td>
                                    <td data-label="Username">{{ $admin->present()->getUsername }}</td>
                                    <td data-label="Email">{{ $admin->present()->getEmail }}</td>
                                    <td data-label="Admin Group">{{ $admin->admingroup['name'] }}</td>
                                    <td>
                                        @if($admin->trashed())
                                            <a title="Restore Admin" class="icon-button trigger-reveal success" href="{{ route('mc-admin.admins.confirm-restore', $admin->id) }}"><i class="far fa-sync-alt"></i></a>
                                        @else
                                            <a title="Edit Admin" class="icon-button primary" href="{{ route('mc-admin.admins.edit', $admin->id) }}"><i class="far fa-edit"></i></a>
                                            @if($admin->id != 1)
                                                <a title="Delete Admin" class="icon-button trigger-reveal alert" href="{{ route('mc-admin.admins.confirm-delete', $admin->id) }}"><i class="far fa-trash-alt"></i></a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-results">
                                <td colspan="5">There are no {{ $filter }} admins available.</td>
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
            @include('Admins::Admin.partials.pagination', ['paginator' => $admins->appends(request()->except('pages'))])
        </div>
    </div>

@stop
