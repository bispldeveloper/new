<div class="row">
    <div class="small-12 columns">
        {!! Form::label('from', 'From Url', ['class' => $errors->first('from', 'is-invalid-label')])!!}
        {!! Form::text('from', null, ['class' => $errors->first('from', 'is-invalid-input')]) !!}
        {!! $errors->first('from', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        {!! Form::label('to', 'To Url', ['class' => $errors->first('to', 'is-invalid-label')])!!}
        {!! Form::text('to', null, ['class' => $errors->first('to', 'is-invalid-input')]) !!}
        {!! $errors->first('to', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
</div>
<div class="row">
    <div class="small-12 columns text-right">
        {!! Form::submit($submit, ['class' => 'button success']) !!}
    </div>
</div>

