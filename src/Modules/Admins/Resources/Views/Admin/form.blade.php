<div class="row">
    <div class="small-12 columns">
        {!! Form::label('first_name', 'First Name', ['class' => $errors->first('first_name', 'is-invalid-label')])!!}
        {!! Form::text('first_name', null, ['class' => $errors->first('first_name', 'is-invalid-input')]) !!}
        {!! $errors->first('first_name', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        {!! Form::label('last_name', 'Last Name', ['class' => $errors->first('last_name', 'is-invalid-label')])!!}
        {!! Form::text('last_name', null, ['class' => $errors->first('last_name', 'is-invalid-input')]) !!}
        {!! $errors->first('last_name', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        {!! Form::label('username', 'Username', ['class' => $errors->first('username', 'is-invalid-label')])!!}
        {!! Form::text('username', null, ['class' => $errors->first('username', 'is-invalid-input')]) !!}
        {!! $errors->first('username', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        {!! Form::label('email', 'Email', ['class' => $errors->first('email', 'is-invalid-label')])!!}
        {!! Form::text('email', null, ['class' => $errors->first('email', 'is-invalid-input')]) !!}
        {!! $errors->first('email', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
</div>
<div class="row">
    <div class="small-12 columns">
        {!! Form::label('admingroup_id', 'Admin Group', ['class' => $errors->first('admingroup_id', 'is-invalid-label')])!!}
        {!! Form::select('admingroup_id', $admingroups, null, ['class' => $errors->first('admingroup_id', 'is-invalid-input')]) !!}
        {!! $errors->first('admingroup_id', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
</div>