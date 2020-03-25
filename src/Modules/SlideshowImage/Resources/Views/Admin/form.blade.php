<div class="row">
    <div class="small-12 columns">
        {!! Form::label('image', 'Image', ['class' => $errors->first('image', 'is-invalid-label')])!!}
        <div class="input-group">
            {!! Form::text('image', $slide->image, ['class' => 'input-group-field ' . $errors->first('image', 'is-invalid-label')]) !!}
            <div class="input-group-button">
                <input type="submit" class="button secondary moxie-image-browse" data-moxie-field="image" value="Browse">
            </div>
        </div>
        {!! $errors->first('image', '<span class="form-error is-visible">:message</span>') !!}
    </div>
</div>
@if(auth()->guard('admins')->user()->admingroup_id == 1)
    <div class="row">
        <div class="small-12 columns">
            {!! Form::label('image_tablet', 'Image Tablet')!!}
            <div class="input-group">
                {!! Form::text('image_tablet', $slide->image, ['class' => 'input-group-field ' . $errors->first('image_tablet', 'is-invalid-label')]) !!}
                <div class="input-group-button">
                    <input type="submit" class="button secondary moxie-image-browse" data-moxie-field="image_tablet" value="Browse">
                </div>
            </div>
            {!! $errors->first('image_tablet', '<span class="form-error is-visible">:message</span>') !!}
        </div>
    </div>
    <div class="row">
        <div class="small-12 columns">
            {!! Form::label('image_mobile', 'Image Mobile')!!}
            <div class="input-group">
                {!! Form::text('image_mobile', $slide->image, ['class' => 'input-group-field ' . $errors->first('image_mobile', 'is-invalid-label')]) !!}
                <div class="input-group-button">
                    <input type="submit" class="button secondary moxie-image-browse" data-moxie-field="image_mobile" value="Browse">
                </div>
            </div>
            {!! $errors->first('image_mobile', '<span class="form-error is-visible">:message</span>') !!}
        </div>
    </div>
@endif
<div class="row">
    <div class="small-12 columns">
        {!! Form::label('link_to', 'Where it links', ['class' => $errors->first('link_to', 'is-invalid-label')])!!}
        {!! Form::text('link_to', null, ['class' => $errors->first('link_to', 'is-invalid-input')]) !!}
        {!! $errors->first('link_to', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        {!! Form::label('headline', 'Headline', ['class' => $errors->first('headline', 'is-invalid-label')])!!}
        {!! Form::text('headline', null, ['class' => $errors->first('headline', 'is-invalid-input')]) !!}
        {!! $errors->first('headline', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        {!! Form::label('sub_text', 'Sub Title', ['class' => $errors->first('sub_text', 'is-invalid-label')])!!}
        {!! Form::text('sub_text', null, ['class' => $errors->first('sub_text', 'is-invalid-input')]) !!}
        {!! $errors->first('sub_text', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        {!! Form::label('alt_text', 'Alt Title', ['class' => $errors->first('alt_text', 'is-invalid-label')])!!}
        {!! Form::text('alt_text', null, ['class' => $errors->first('alt_text', 'is-invalid-input')]) !!}
        {!! $errors->first('alt_text', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        {!! Form::hidden('slideshow_id', $slide->slideshow_id) !!}
    </div>
</div>