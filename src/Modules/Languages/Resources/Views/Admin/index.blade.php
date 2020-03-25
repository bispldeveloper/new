@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Languages
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title">Languages</p>
            </div>
            <div class="small-12 medium-6 columns">
                <ul class="button-list">
                    <li>
                        <a href="{{ route('mc-admin.languages.create') }}" class="button warning"> Create Language</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-header">
                    @include('Languages::Admin.sub-menu')
                </div>
                <div class="table-block-content">
                    <table class="data-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Last Updated</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($languages->count() > 0)
                            @foreach ($languages as $language)
                                <tr>
                                    <td data-label="Name">
                                        <a href="{{ route('mc-admin.languages.edit', $language->id) }}">{{ $language->present()->getName }} </a>
                                    </td>
                                    <td data-label="Code">{{ $language->present()->getCode }}</td>
                                    <td data-label="Last Updated"><span class="secondary">{{ $language->present()->getUpdatedAt }}</span></td>
                                    <td>
                                        @if($language->trashed())
                                            <a title="Restore Language" href="{{ route('mc-admin.languages.confirm-restore', $language->id) }}" class="icon-button trigger-reveal success"><i class="far fa-sync-alt"></i></a>
                                        @else
                                            <a title="Edit Language" href="{{ route('mc-admin.languages.edit', $language->id) }}" class="icon-button info"><i class="far fa-edit"></i></a>
                                            @if($language->id != 1)
                                                <a title="Delete Language" href="{{ route('mc-admin.languages.confirm-delete', $language->id) }}" class="icon-button trigger-reveal alert"><i class="far fa-trash-alt"></i></a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-results">
                                <td colspan="4" class="text-center">Unfortunately there are no {{ $filter }} languages available.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop