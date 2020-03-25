@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Edit Page Template: {{ $pagetemplate->present()->getName }}
@stop


@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 columns">
                <p class="module-title"> Edit Page Template </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 medium-6 columns">
            {!! Form::model($pagetemplate, ['route' => ['mc-admin.pagetemplates.update', $pagetemplate->id], 'method' => 'PUT']) !!}
            @include('PageTemplates::Admin.form', ['submit' => 'Save Page Template'])
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-header">
                    <div class="row align-middle">
                        <div class="small-6 columns">
                            <p class="table-block-title">Template Blocks</p>
                        </div>
                        <div class="small-6 columns text-right">
                            <a href="{{ route('mc-admin.pagetemplates.pagetemplateblocks.create', $pagetemplate->id) }}" class="button warning">Create Template Block</a>
                        </div>
                    </div>
                </div>
                <div class="table-block-content">
                    <table class="data-table" id="sortable">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Block Name</th>
                            <th>Type</th>
                            <th>Last Updated</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($pagetemplate->blocks->count() > 0)
                            @foreach($pagetemplate->blocks as $block)
                                <tr id="pagetemplate_blocks_{{ $block->id }}">
                                    <td class="handle"><i class="fa fa-arrows-v"></i></td>
                                    <td data-label="Name">{{ $block->present()->getName }}</td>
                                    <td data-label="Type">{{ $block->present()->getType }}</td>
                                    <td data-label="Updated At">
                                        <span class="secondary">
                                              {{ $block->present()->getUpdatedAt }}
                                        </span>
                                    </td>
                                    <td>
                                        <a title="Edit Page Block" href="{{ route('mc-admin.pagetemplates.pagetemplateblocks.edit', [$pagetemplate->id, $block->id]) }}" class="icon-button info"><i class="far fa-edit"></i></a>
                                        <a title="Delete Page Block" href="{{ route('mc-admin.pagetemplates.pagetemplateblocks.confirm-delete', [$pagetemplate->id, $block->id]) }}" class="icon-button trigger-reveal alert"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-results">
                                <td colspan="5" class="text-center">Unfortunately there are no templates available</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop