@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Choose Page Layout
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 columns">
                <p class="module-title"> Choose a Page Template</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            @if($pageTemplates->count() > 0)
                <div class="row small-up-2 medium-up-3 large-up-4">
                    @foreach ($pageTemplates as $pageTemplate)
                        <div class="column column-block">
                            <div class="content-block">
                                <p class="content-block-title">{{ $pageTemplate->present()->getName }}</p>
                                <a href="?template={{ $pageTemplate->id }}" class="button success">Select Template</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="small-12 medium-6 columns">
                    <div class="content-block">
                        <p>There are no page templates available, please add one <a href="{{ route('mc-admin.pagetemplates.index') }}">here</a>.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

@stop

