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
                                <th>{!! sortable_link('name', 'Name') !!}</th>
                                <th>Email To</th>
                                <th>{!! sortable_link('updated_at', 'Last Updated') !!}</th>
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
@section('scripts')
    @parent
    <script>
        $('#pageforms').select2({
            placeholder: 'Search pageforms..',
            minimumInputLength: 2,
            cache: true,
            language: {
                noResults: function () {
                    return 'No results';
                }
            },
            ajax: {
                url: '{{ route('mc-admin.pageforms.search') }}',
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
        $('#pageforms').on('select2:select', function (e) {
            var data = e.params.data;
            window.location = '/mc-admin/pageforms/' + data.id + '/edit';
        });
    </script>
@stop