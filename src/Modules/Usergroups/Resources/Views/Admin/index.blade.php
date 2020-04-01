@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    User Groups
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title">User Group Management</p>
            </div>
            <div class="small-12 medium-6 columns">
                <ul class="button-list">
                    <li>
                        <a href="{{ route('mc-admin.users.index') }}" class="button primary">Back to all Users</a>
                    </li>
                    <li>
                        <a href="{{ route('mc-admin.usergroups.create') }}" class="button warning"> Create User Group</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-header">
                    @include('Usergroups::Admin.sub-menu')
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
                        @if ($usergroups->count() > 0)
                            @foreach ($usergroups as $usergroup)
                                <tr>
                                    <td data-label="Name">
                                        @if($usergroup->trashed())
                                            {{ $usergroup->present()->getName }}
                                        @else
                                            <a href="{{ route('mc-admin.usergroups.edit', $usergroup->id) }}">{{ $usergroup->present()->getName }} </a>
                                        @endif
                                    </td>
                                    <td data-label="Last Updated">
                                        <span class="secondary">
                                            {{ $usergroup->present()->getUpdatedAt }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($usergroup->trashed())
                                            <a title="Restore Admin Group" href="{{ route('mc-admin.usergroups.confirm-restore', $usergroup->id) }}" class="icon-button trigger-reveal success"><i class="far fa-sync-alt"></i></a>
                                        @else
                                            <a title="Edit Admin Group" href="{{ route('mc-admin.usergroups.edit', $usergroup->id) }}" class="icon-button primary"><i class="far fa-edit"></i></a>
                                            <a title="Delete Admin Group" href="{{ route('mc-admin.usergroups.confirm-delete', $usergroup->id) }}" class="icon-button trigger-reveal alert"><i class="far fa-trash-alt"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-results">
                                <td colspan="3">There are no {{ request()->input('filter') }} user groups available.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop
