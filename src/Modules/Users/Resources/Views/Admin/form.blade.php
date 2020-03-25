    <div class="row">
        <div class="small-12 columns">
            <div class="{!! ($errors->first('first_name') ? 'error':'') !!}">
                {!! Form::label('first_name', 'First Name')!!}
                {!! Form::text('first_name', null, ['placeholder' => 'First Name']) !!}
                {!! $errors->first('first_name', '<p class="help-text" id="first_name">:message</p>' ) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="{!! ($errors->first('last_name') ? 'error':'') !!}">
                {!! Form::label('last_name', 'Last Name')!!}
                {!! Form::text('last_name', null, ['placeholder' => 'Last Name']) !!}
                {!! $errors->first('last_name', '<p class="help-text" id="last_name">:message</p>' ) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="{!! ($errors->first('email') ? 'error':'') !!}">
                {!! Form::label('email', 'Email')!!}
                {!! Form::text('email', null, ['placeholder' => 'Email']) !!}
                {!! $errors->first('email', '<p class="help-text" id="email">:message</p>' ) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 columns">
            <div class="{!! ($errors->first('usergroup_id') ? 'error':'') !!}">
                {!! Form::label('usergroup_id', 'Usergroup')!!}
                {!! Form::select('usergroup_id', $usergroups) !!}
            </div>
        </div>
    </div>


