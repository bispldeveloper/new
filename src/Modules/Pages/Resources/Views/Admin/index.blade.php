@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Pages
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title">Pages</p>
            </div>
            <div class="small-12 medium-6 columns">
                <ul class="button-list">
                    <li>
                        <a href="{{ route('mc-admin.pages.create') }}" class="button warning"> Create New Page</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-header">
                    @include('Pages::Admin.sub-menu')
                </div>
                <div class="table-block-content">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Url (Slug)</th>
                                <th>Status</th>
                                <th>Last Updated</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($pages->count() > 0)
                            @foreach ($pages as $page)
                                <tr>
                                    <td data-label="Title">
                                        @if($page->trashed())
                                            {{ $page->present()->getTitle }}
                                        @else
                                            <a title="Edit Page" href="{{ route('mc-admin.pages.edit', $page->id) }}">{{ $page->present()->getTitle }}</a>
                                        @endif
                                    </td>
                                    <td data-label="Url (Slug)">{{ $page->present()->getSlug }}</td>
                                    <td data-label="Published">{!! $page->present()->getPublishedLabel !!}</td>
                                    <td data-label="Last Updated"><span class="secondary">{{ $page->present()->getUpdatedAt }}</span></td>
                                    <td>
                                        @if($page->trashed())
                                            <a title="Restore Page" href="{{ route('mc-admin.pages.confirm-restore', $page->id) }}" class="icon-button trigger-reveal success"><i class="far fa-sync-alt"></i></a>
                                        @else
                                            <a title="Edit Page" href="{{ route('mc-admin.pages.edit', $page->id) }}" class="icon-button info"><i class="far fa-edit"></i></a>
                                            @if($page->id != 1 && !$page->is_module)
                                                <a title="Delete Page" href="{{ route('mc-admin.pages.confirm-delete', $page->id) }}" class="icon-button trigger-reveal alert"><i class="far fa-trash-alt"></i></a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-results">
                                <td colspan="5">There are no {{ $filter }} pages available.</td>
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
            @include('Admins::Admin.partials.pagination', ['paginator' => $pages->appends(request()->except('pages'))])
        </div>
    </div>

@stop

@section('scripts')
    @parent
    <script>
        $('#pages').select2({
            placeholder: 'Search pages..',
            minimumInputLength: 2,
            cache: true,
            language: {
                noResults: function () {
                    return 'No results';
                }
            },
            ajax: {
                url: '{{ route('mc-admin.pages.search') }}',
                dataType: 'json',
                method: 'post',
                delay: 200,
                data: function (params) {
                    var query = {
                        terms: params.term,
                        type: 'public',
                        _token: '{{ csrf_token() }}'
                    };
                    return query;
                },
                processResults: function (data, params) {
                    return {
                        results: $.map(data, function (obj) {
                            return {id: obj.id, text: obj.value};
                        })
                    };
                }
            }
        });
        $('#pages').on('select2:select', function (e) {
            var data = e.params.data;
            window.location = '/mc-admin/pages/' + data.id + '/edit';
        });
    </script>
@stop
