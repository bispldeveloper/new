<div class="content-block">
    <p class="content-block-title">Template Block Details</p>
    <div class="content">
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('name', 'Block Name', ['class' => $errors->first('name', 'is-invalid-label')]) !!}
                {!! Form::text('name', null, ['class' => $errors->first('name', 'is-invalid-input')]) !!}
                {!! $errors->first('name', '<span class="form-error is-visible">:message</span>' ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('description', 'Block Description', ['class' => $errors->first('description', 'is-invalid-label')]) !!}
                {!! Form::text('description', null, ['class' => $errors->first('description', 'is-invalid-input')]) !!}
                {!! $errors->first('description', '<span class="form-error is-visible">:message</span>' ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('field_name', 'Field Name (for frontend use, e.g. content_area_1)', ['class' => $errors->first('field_name', 'is-invalid-label')]) !!}
                {!! Form::text('field_name', null, ['class' => $errors->first('field_name', 'is-invalid-input')]) !!}
                {!! $errors->first('field_name', '<span class="form-error is-visible">:message</span>' ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('type', 'Block Type', ['class' => $errors->first('type', 'is-invalid-label')]) !!}
                {!! Form::select('type', ['text' => 'Text', 'textarea' => 'Textarea', 'image' => 'Image', 'file' => 'File'], ['class' => $errors->first('type', 'is-invalid-input')]) !!}
                {!! $errors->first('type', '<span class="form-error is-visible">:message</span>' ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                {!! Form::label('class', 'Block Class', ['class' => $errors->first('class', 'is-invalid-label')]) !!}
                {!! Form::select('class', ['' => 'None', 'basic-editor' => 'Basic Editor', 'advanced-editor' => 'Advanced Editor'], ['class' => $errors->first('class', 'is-invalid-input')]) !!}
                {!! $errors->first('class', '<span class="form-error is-visible">:message</span>' ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns text-right">
                {!! Form::submit($submit, ['class' => 'button success']) !!}
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(function () {
            $("#name").stringToSlug({
                getPut: '#field_name',
                space: '_',
                setEvents: 'keyup'
            });
        });
    </script>
@stop
