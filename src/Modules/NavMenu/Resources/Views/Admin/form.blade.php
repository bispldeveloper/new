<div class="row" style="display: none;">
    <div class="small-12 columns">
        <div class="{!! ($errors->first('tree_structure') ? 'error':'') !!}">
            {!! Form::label('tree_structure', '')!!}
            {!! Form::textarea('tree_structure', null, ['id' => 'nestable-output']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="small-12 columns">
        @include('NavMenu::Admin.partials.reordering-items')
    </div>
</div>

<div class="row">
    <div class="small-12 text-right columns">
        <br>
        {!! Form::submit($submit, ['class' => 'button success']) !!}
    </div>
</div>
