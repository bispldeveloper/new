@if($pageform)
    <div class="row">
        <div class="small-12 columns">
            {!! Form::model(request(), ['route' => ['pageforms.enquire', $pageform->slug]]) !!}
                @honeypot
                @if($pageform->title)
                    <h3>{{ $pageform->title }}</h3>
                @endif
                <div class="row">
                    @foreach($pageform->fields as $field)
                        <div class="small-12 large-{{ $field->columns }} columns">
                            @includeIf('PageFormFieldTypes::Frontend.partials.' . $field->fieldtype->partial)
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="small-12 columns">
                        {!! Form::submit($pageform->submit_text) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endif