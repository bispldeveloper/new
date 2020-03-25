<div class="row">
    <div class="small-12 medium-6 columns">
        {!! Form::label('type', 'Type of Link') !!}
        {!! Form::select('type', ['internal' => 'Your Pages', 'other' => 'Other',])!!}
    </div>
    <div class="small-12 medium-6 columns">
        {!! Form::hidden('navmenu_id', $navmenu_id) !!}
        <div class="{!! ($errors->first('filename') ? 'error':'') !!}">
            <div class="filename-internal">
            {!! Form::label('filename', 'Link to*')!!}
                {!! Form::select('filename', $navmenus) !!}
            </div>
            <div class="filename-other" style="display: none;">
            {!! Form::label('filename', 'Link to')!!}
                {!! Form::text('filename', null, ['placeholder' => '/uploads/teacher-document.pdf', 'disabled']) !!}
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="small-12 columns">
        <div class="{!! ($errors->first('title') ? 'error':'') !!}">
            {!! Form::label('title', 'Item Title*')!!}
            {!! Form::text('title', null, ['placeholder' => 'Title of Nav Link to Display']) !!}
            {!! $errors->first('title', '<p class="help-text" id="title">:message</>' ) !!}
        </div>
    </div>
</div>

@section('scripts')
@parent

<script>
    //Switch Form Types onchange
    $(function() {
        $("select[name=type]").on('change', function() {
            var fieldname = ' ';
            var param = $(this).val();
            checkLinkType(param, fieldname);
        });
    });

    //Also run when popup is active.
    $('[data-reveal]').on('open.zf.reveal', function() {
        console.log('here');
        var fieldname = '#dynamicModal ';
        var param = $('#dynamicModal select[name=type]').val();
        checkLinkType(param, fieldname);

        $(function() {
            $('#dynamicModal select[name=type]').on('load change', function() {
                var fieldname = '#dynamicModal ';
                var param = $(this).val();
                checkLinkType(param, fieldname);
            });
        });

    });

    function checkLinkType(param, fieldname) {
        if(param == 'internal') {
            $(fieldname + '.filename-internal').show();
            $(fieldname + '.filename-internal').find('select').prop( "disabled", false );
            $(fieldname + '.filename-other').find('input').prop( "disabled", true );
            $(fieldname + '.filename-other').hide();
        } else {
            $(fieldname + '.filename-other').find('input').prop( "disabled", false );
            $(fieldname + '.filename-other').show();
            $(fieldname + '.filename-internal').hide();
            $(fieldname + '.filename-internal').find('select').prop( "disabled", true );
        }
    }
</script>

@stop
