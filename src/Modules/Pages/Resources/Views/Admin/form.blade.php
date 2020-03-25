<div class="content-block">
    <p class="content-block-title">Page Details</p>
    <div class="content">
        @if(auth()->guard('admins')->user()->admingroup_id == 1)
            <div class="row">
                <div class="small-12 columns">
                    {!! Form::label('is_module', 'Is this page for a module?', ['class' => $errors->first('published', 'is-invalid-label')])!!}
                    {!! Form::select('is_module', ['0' => 'No', '1' => 'Yes'], null, ['class' => $errors->first('published', 'is-invalid-input')])!!}
                </div>
            </div>
        @endif
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('published', 'Published', ['class' => $errors->first('published', 'is-invalid-label')])!!}
                {!! Form::select('published', ['1' => 'Published', '0' => 'Hidden'], null, ['class' => $errors->first('published', 'is-invalid-input')])!!}
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('title', 'Page Title', ['class' => $errors->first('title', 'is-invalid-label')])!!}
                {!! Form::text('title', null, ['placeholder' => 'The heading of the page.', 'class' => $errors->first('title', 'is-invalid-input')]) !!}
                {!! $errors->first('title', '<span class="form-error is-visible">:message</span>' ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('sub_title', 'Page Sub-Title', ['class' => $errors->first('sub_title', 'is-invalid-label')])!!}
                {!! Form::text('sub_title', null, ['placeholder' => 'A sub-text line supporting the heading.', 'class' => $errors->first('sub_title', 'is-invalid-input')]) !!}
                {!! $errors->first('sub_title', '<span class="form-error is-visible">:message</span>' ) !!}
            </div>
        </div>
        @if(isset($page) && (! $page->is_module || $page->is_module && auth()->guard('admins')->user()->admingroup_id == 1))
            <div class="row">
                <div class="small-12 columns">
                    {!! Form::label('page_form_id', 'Select a form to use', ['class' => $errors->first('page_form_id', 'is-invalid-label')]) !!}
                    {!! Form::select('page_form_id', $pageForms) !!}
                </div>
            </div>
            <div class="row">
                <div class="small-8 large-9 columns">
                    {!! Form::label('slideshow_id', 'Select a slideshow to use', ['class' => $errors->first('slideshow_id', 'is-invalid-label')]) !!}
                    <select name="slideshow_id" id="slideshow">
                        @foreach($availableSlideshows as $key => $value)
                            <option value="{{ $key }}" data-url="{{ route('mc-admin.slideshows.edit', $key) }}" {{ (isset($page) && $page->slideshow_id == $key ? 'selected' : '') }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="small-4 large-3 columns">
                    <label for="">&nbsp;</label>
                    <a style="display: none;" id="edit-slideshow" href="#" target="_blank" class="button black small expanded">Edit</a>
                </div>
            </div>
        @endif
    </div>
</div>
<div class="content-block">
    <p class="content-block-title">Search Engine Data <a href="#" class="expand-collapse collapsed" id=""></a></p>
    <div class="content" style="display:none;">
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('meta_title', 'Meta Title', ['class' => $errors->first('meta_title', 'is-invalid-label')])!!}
                {!! Form::text('meta_title', null, ['placeholder' => 'Title shown in Google (If empty, defaults to Page Title)', 'class' => $errors->first('meta_title', 'is-invalid-input')]) !!}
                {!! $errors->first('meta_title', '<span class="form-error is-visible">:message</span>' ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('meta_description', 'Meta Description', ['class' => $errors->first('meta_description', 'is-invalid-label')])!!}
                {!! Form::textarea('meta_description', null, ['placeholder' => 'The description shown in Google (If empty, defaults to Page Sub-Title if one given)', 'class' => $errors->first('meta_description', 'is-invalid-input'), 'rows' => 4]) !!}
                {!! $errors->first('meta_description', '<span class="form-error is-visible">:message</span>' ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('slug', 'Page Slug', ['class' => $errors->first('slug', 'is-invalid-label')])!!}
                @if(isset($page) && $page->id == 1 || isset($page) && $page->is_module == true)
                    {!! Form::text('slug', $page->slug, ['readonly' => 'readonly', 'class' => $errors->first('slug', 'is-invalid-input')]) !!}
                @else
                    {!! Form::text('slug', null, ['class' => $errors->first('slug', 'is-invalid-input')]) !!}
                @endif
                {!! $errors->first('slug', '<span class="form-error is-visible">:message</span>' ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('meta_canonical', 'Canonical Tag', ['class' => $errors->first('meta_canonical', 'is-invalid-label')])!!}
                {!! Form::text('meta_canonical', null, ['class' => $errors->first('meta_canonical', 'is-invalid-input')]) !!}
                {!! $errors->first('meta_canonical', '<span class="form-error is-visible">:message</span>' ) !!}
            </div>
        </div>
    </div>
</div>


