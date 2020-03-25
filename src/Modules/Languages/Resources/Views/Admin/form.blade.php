<div class="row">
    <div class="small-12 columns">
        {!! Form::label('name', 'Name', ['class' => $errors->first('name', 'is-invalid-label')])!!}
        {!! Form::text('name', null, ['class' => $errors->first('name', 'is-invalid-input')]) !!}
        {!! $errors->first('name', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        {!! Form::label('code', 'Country Code', ['class' => $errors->first('code', 'is-invalid-label')])!!}
        {!! Form::text('code', null, ['class' => $errors->first('code', 'is-invalid-input')]) !!}
        {!! $errors->first('code', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
</div>
<div class="row">
    <div class="small-12 columns text-right">
        {!! Form::submit($submit, ['class' => 'button success']) !!}
    </div>
</div>