@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    User Management
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title">User Management</p>
            </div>
            <div class="small-12 medium-6 columns">
                <ul class="button-list">
                    <li>
                        <a href="{{ route('mc-admin.users.create') }}" class="button warning">Create User</a>
                    </li>
                    <li>
                        <a href="{{ route('mc-admin.usergroups.index') }}" class="button primary">Manage User Groups</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-header">
                    @include('Users::Admin.sub-menu')
                </div>
                <div class="table-block-content">
                    <table class="data-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Group</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($users->count() > 0)
                            @foreach ($users as $user)
                                <tr>
                                    <td data-label="Name">
                                        @if($user->trashed())
                                            {{ $user->present()->getFullName }}
                                        @else
                                            <a title="Edit User" href="{{ route('mc-admin.users.edit', $user->id) }}">{{ $user->present()->getFullName }}</a>
                                        @endif
                                    </td>
                                    <td data-label="Email">{{ $user->present()->getEmail }}</td>
                                    <td data-label="Usergroup">{{ $user->usergroup['name'] }}</td>
                                    <td>
                                        @if($user->trashed())
                                            <a title="Restore User" class="icon-button trigger-reveal success" href="{{ route('mc-admin.users.confirm-restore', $user->id) }}"><i class="far fa-sync-alt"></i></a>
                                        @else
                                            <a title="Edit User" class="icon-button primary" href="{{ route('mc-admin.users.edit', $user->id) }}"><i class="far fa-edit"></i></a>
                                            <a title="Delete User" class="icon-button trigger-reveal alert" href="{{ route('mc-admin.users.confirm-delete', $user->id) }}"><i class="far fa-trash-alt"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-results">
                                <td colspan="5">There are no {{ $filter }} users available.</td>
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
            @include('Admins::Admin.partials.pagination', ['paginator' => $users->appends(request()->except('pages'))])
        </div>
    </div>

@stop
