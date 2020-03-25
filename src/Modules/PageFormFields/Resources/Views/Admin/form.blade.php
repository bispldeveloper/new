<div class="row">
    @if(! isset($pageformfield) || ! $pageformfield->is_newsletter_field)
        <div class="small-12 columns">
            {!! Form::label('name', 'Name', ['class' => $errors->first('name', 'is-invalid-name')])!!}
            {!! Form::text('name', null, ['class' => $errors->first('name', 'is-invalid-input'), 'required' => 'required']) !!}
            {!! $errors->first('name', '<span class="form-error is-visible">:message</span>' ) !!}
        </div>
    @endif
    <div class="small-12 large-6 columns">
        {!! Form::label('has_label', 'Does this field need a label?', ['class' => $errors->first('has_label', 'is-invalid-label')])!!}
        {!! Form::select('has_label', [1 => 'Yes', 0 => 'No'], null, ['class' => $errors->first('has_label', 'is-invalid-input')]) !!}
        {!! $errors->first('has_label', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
    <div class="small-12 large-6 columns" id="has_label_container" style="{{ (isset($pageformfield) && ! $pageformfield->has_label ? 'display:none;' : 'display:block;') }}">
        {!! Form::label('label', 'Label Text', ['class' => $errors->first('label', 'is-invalid-name')])!!}
        {!! Form::text('label', null, ['class' => $errors->first('label', 'is-invalid-input')]) !!}
        {!! $errors->first('label', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
    <div class="small-12 large-6 columns">
        {!! Form::label('placeholder', 'Placeholder', ['class' => $errors->first('placeholder', 'is-invalid-label')])!!}
        {!! Form::text('placeholder', null, ['class' => $errors->first('placeholder', 'is-invalid-input')]) !!}
        {!! $errors->first('placeholder', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
    <div class="small-12 large-6 columns">
        {!! Form::label('default', 'Default Value', ['class' => $errors->first('default', 'is-invalid-label')])!!}
        {!! Form::text('default', null, ['class' => $errors->first('default', 'is-invalid-input')]) !!}
        {!! $errors->first('default', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
    @if(! isset($pageformfield) || ! $pageformfield->is_newsletter_field)
        <div class="small-12 large-6 columns">
            {!! Form::label('required', 'Is this a required field?', ['class' => $errors->first('required', 'is-invalid-label')])!!}
            {!! Form::select('required', [0 => 'No', 1 => 'Yes'], null, ['class' => $errors->first('required', 'is-invalid-input')]) !!}
            {!! $errors->first('required', '<span class="form-error is-visible">:message</span>' ) !!}
        </div>
    @endif
    <div class="small-12 columns" id="content_container" style="{{ (isset($pageformfield) && $pageformfield->fieldtype->name == 'Content' ? 'display:block;' : 'display:none;') }}">
        {!! Form::label('content', 'Content', ['class' => $errors->first('content', 'is-invalid-label')])!!}
        {!! Form::textarea('content', null, ['class' => 'basic-editor' . $errors->first('content', ' is-invalid-input'), 'rows' => 4]) !!}
        {!! $errors->first('content', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
    <div class="small-12 large-6 columns">
        {!! Form::label('columns', 'How wide should this field be?', ['class' => $errors->first('columns', 'is-invalid-label')])!!}
        {!! Form::select('columns', [12 => 'Full Width', 6 => 'Half Width', 4 => 'One Third Width'], null, ['class' => $errors->first('columns', 'is-invalid-input')]) !!}
        {!! $errors->first('columns', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
    <div class="small-12 columns">
        <div id="has_options" style="{{ (isset($pageformfield) && $pageformfield->fieldtype->has_options ? 'display:block;' : 'display:none;') }}">
            {!! Form::label('options', 'Field Options', ['class' => $errors->first('options', 'is-invalid-label')])!!}
            {!! Form::textarea('options', null, ['placeholder' => 'One option per line', 'class' => $errors->first('options', 'is-invalid-input'), 'rows' => 4]) !!}
            {!! $errors->first('options', '<span class="form-error is-visible">:message</span>' ) !!}
        </div>
    </div>
</div>

@if(isset($pageformfield) && $pageformfield->fieldtype->name == 'Content')
    <script>
        tinymce.remove('#content');
        setTimeout(function(){
            tinymce.init({
                branding: false,
                relative_urls: false,
                selector: '#content'
            });
        }, 500);
    </script>
@endif