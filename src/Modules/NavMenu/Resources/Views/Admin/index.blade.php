@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Navigation
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-1 columns">
                <p class="module-title">Navigation</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-content">
                    <table class="data-table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($navmenus->count() > 0)
                            @foreach ($navmenus as $navmenu)
                                <tr>
                                    <td data-label="Title">
                                        <a title="Edit Navmenu" href="{{ route('mc-admin.navmenus.edit', $navmenu->id) }}">{{ $navmenu->title }}</a>
                                    </td>
                                    <td>
                                        <a title="Edit Navmenu" href="{{ route('mc-admin.navmenus.edit', $navmenu->id) }}" class="icon-button info"><i class="far fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-results">
                                <td colspan="2">There are no {{ request()->input('filter') }} navigations available.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    @parent
@stop
