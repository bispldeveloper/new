{!! Form::open(['route' => ['mc-admin.users.changepassword', $user->id], 'method' => 'POST']) !!}

<div class="row">
    <div class="small-12 columns">
        {!! Form::label('password', 'Password', ['class' => $errors->first('password', 'is-invalid-label')])!!}
        {!! Form::password('password', null, ['class' => $errors->first('password', 'is-invalid-input')]) !!}
        {!! $errors->first('password', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
</div>

<div class="row">
    <div class="small-12 columns">
        {!! Form::label('password_confirmation', 'Confirm Password', ['class' => $errors->first('password_confirmation', 'is-invalid-label')])!!}
        {!! Form::password('password_confirmation', null, ['class' => $errors->first('password_confirmation', 'is-invalid-input')]) !!}
        {!! $errors->first('password_confirmation', '<span class="form-error is-visible">:message</span>' ) !!}
    </div>
</div>

<div class="row">
    <div class="small-12 columns text-right">
        {!! Form::submit('Change Password', ['class' => 'button success']) !!}
    </div>
</div>

{!! Form::close() !!}
