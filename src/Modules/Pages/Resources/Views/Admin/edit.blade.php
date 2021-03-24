@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Update Page: {{ $page->title }}
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title"> Update Page: {{ $page->present()->getTitle }}</p>
            </div>
            <div class="small-12 medium-6 columns">
                <ul class="link-list">
                    <li>
                        <a href="{{ route('page.show', $page->slug) }}" target="_blank"><i class="far fa-eye"></i> View Page</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            {!! Form::model($page, ['route' => ['mc-admin.pages.update', $page->id], 'method' => 'PUT']) !!}
            <div class="row">
                <div class="small-12 large-8 columns">
                    <div class="tab-block">
                        @if(count((array) app('languages')) > 1)
                            <ul class="tabs" data-tabs id="languages">
                                @foreach(app('languages') as $code => $language)
                                    <li class="tabs-title {{ $loop->first ? 'is-active' : '' }}">
                                        <a href="#language-{{ $code }}" aria-selected="true">{{ $language }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="tabs-content" data-tabs-content="languages">
                            @foreach(app('languages') as $code => $language)
                                <div class="tabs-panel {{ $loop->first ? 'is-active' : '' }}" id="language-{{ $code }}">
                                    @if(isset($page->pagetemplate->blocks) && $page->pagetemplate->blocks->count() > 0)
                                        @foreach($page->pagetemplate->blocks as $block)
                                            <div class="row">
                                                <div class="small-12 columns">
                                                    @if($block->type == 'image')
                                                        {!! Form::label($block->present()->getName . ($block->description != '' ? ' (' . $block->present()->getDescription  . ')' : '')) !!}
                                                        <div class="input-group">
                                                            {!! Form::text('pagetemplateblockcontent['.$code.']['.$block->id.'][content]', (isset($block->blockcontent[$code]->content) ? $block->blockcontent[$code]->content : ''), ['class' => 'input-group-field', 'id' => 'pagetemplateblockcontent-'. $block->id]) !!}
                                                            <div class="input-group-button">
                                                                <input type="submit" class="button black moxie-image-browse" data-moxie-field="pagetemplateblockcontent-{{ $block->id }}" value="Browse">
                                                            </div>
                                                        </div>
                                                        {!! Form::hidden('pagetemplateblockcontent['.$code.']['.$block->id.'][page_tb_id]', $block->id) !!}
                                                    @elseif($block->type == 'file')
                                                        {!! Form::label($block->present()->getName . ($block->description != '' ? ' (' . $block->present()->getDescription  . ')' : '')) !!}
                                                        <div class="input-group">
                                                            {!! Form::text('pagetemplateblockcontent['.$code.']['.$block->id.'][content]', (isset($block->blockcontent[$code]->content) ? $block->blockcontent[$code]->content : ''), ['class' => 'input-group-field', 'id' => 'pagetemplateblockcontent-'. $block->id]) !!}
                                                            <div class="input-group-button">
                                                                <input type="submit" class="button black moxie-file-browse" data-moxie-field="pagetemplateblockcontent-{{ $block->id }}" value="Browse">
                                                            </div>
                                                        </div>
                                                        {!! Form::hidden('pagetemplateblockcontent['.$code.']['.$block->id.'][page_tb_id]', $block->id) !!}
                                                    @else
                                                        @php $type = $block->type @endphp
                                                        {!! Form::label($block->present()->getName . ($block->description != '' ? ' (' . $block->present()->getDescription  . ')' : '')) !!}
                                                        {!! Form::hidden('pagetemplateblockcontent['.$code.']['.$block->id.'][page_tb_id]', $block->id) !!}
                                                        {!! Form::$type('pagetemplateblockcontent['.$code.']['.$block->id.'][content]', (isset($block->blockcontent[$code]->content) ? $block->blockcontent[$code]->content : ''), ['class' => $block->class, 'id' => $block->field_name]) !!}
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>No blocks have been added for this page template.</p>
                                        <a href="{{ route('mc-admin.pagetemplates.edit', $page->pageTemplate->id) }}" class="button warning">Add Content Blocks</a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        {!! Form::hidden('pagetemplate_id', $page->pagetemplate_id) !!}
                    </div>
                </div>
                <div class="small-12 large-4 columns">
                    @include('Pages::Admin.form')
                </div>
            </div>
            <div class="button-block">
                <div class="row">
                    <div class="small-6 columns">
                        &nbsp;
                    </div>
                    <div class="small-6 columns text-right">
                        {!! Form::submit('Save Page', ['class' => 'button success']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('scripts')
    @parent
    @include('Pages::Admin.partials.meta-count-scripts')
    <script>
        $(function () {
            $('#edit-slideshow').hide();
            var slideshow = $('#slideshow');
            if (slideshow.val() != 0) {
                $('#edit-slideshow').attr('href', slideshow.find(':selected').data('url'));
                $('#edit-slideshow').show();
            }
            $("#slideshow").change(function () {
                var url = $(this).find(':selected').data('url');
                if ($(this).val() != 0) {
                    $('#edit-slideshow').attr('href', url).fadeIn();
                } else {
                    $('#edit-slideshow').fadeOut();
                }
            });
        });
    </script>
@stop

