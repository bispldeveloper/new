@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Url Redirects
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title">Url Redirects</p>
            </div>
            <div class="small-12 medium-6 columns">
                <ul class="button-list">
                    <li>
                        <a href="{{ route('mc-admin.urlredirects.export') }}" class="button success"> Export</a>
                    </li>
                    <li>
                        {!! Form::open(['route' => 'mc-admin.urlredirects.import', 'files' => true]) !!}
                            <label for="file" class="button info"> Import</label>
                            {!! Form::file('file', ['id' => 'file', 'style' => 'display:none;']) !!}
                        {!! Form::close() !!}
                    </li>
                    <li>
                        <a href="{{ route('mc-admin.urlredirects.create') }}" class="button warning"> Create New Redirect</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-header">
                    @include('UrlRedirects::Admin.sub-menu')
                </div>
                <div class="table-block-content">
                    <table class="data-table">
                        <thead>
                        <tr>
                            <th>{!! sortable_link('from', 'From') !!}</th>
                            <th>{!! sortable_link('to', 'To') !!}</th>
                            <th>{!! sortable_link('updated_at', 'Last Updated') !!}</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($urlredirects->count() > 0)
                            @foreach ($urlredirects as $urlredirect)
                                <tr>
                                    <td data-label="From">{{ $urlredirect->from }}</td>
                                    <td data-label="To">{{ $urlredirect->to }}</td>
                                    <td data-label="Last Updated">
                                        <span class="secondary">
                                             {{ $urlredirect->present()->getUpdatedAt }}
                                        </span>
                                      </td>
                                    <td>
                                        @if($urlredirect->trashed())
                                            <a href="{{ route('mc-admin.urlredirects.confirm-restore', $urlredirect->id) }}" class="icon-button success trigger-reveal"><i class="far fa-sync-alt"></i></a>
                                        @else
                                            <a href="{{ route('mc-admin.urlredirects.edit', $urlredirect->id) }}" class="icon-button info"><i class="far fa-edit"></i></a>
                                            <a href="{{ route('mc-admin.urlredirects.confirm-delete', $urlredirect->id) }}" class="icon-button trigger-reveal alert"><i class="far fa-trash-alt"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-results">
                                <td colspan="4" class="text-center">There are no {{ request()->input('filter') }} url redirects available.</td>
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
            @include('Admins::Admin.partials.pagination', ['paginator' => $urlredirects->appends(request()->except('pages'))])
        </div>
    </div>

@stop

@section('scripts')
    @parent
    <script>
        $(document).on('change', 'input[type="file"]', function() {
            $(this).closest('form').submit();
        });
    </script>

@stop
