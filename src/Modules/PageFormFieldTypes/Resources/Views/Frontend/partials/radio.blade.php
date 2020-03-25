@if($field->has_label)
    <label for="{{ $field->name_snakecase }}">{!! $field->present()->getLabel . ($field->required ? '*' : '') !!}</label>
@endif
@foreach($field->options_array as $label => $value)
    {!! Form::radio($field->name_snakecase, $value, $field->default, ($field->required ? ['required' => 'required', 'id' => $field->name_snakecase . '-' . $label] : ['id' => $field->name_snakecase . '-' . $label])) !!}
    {!! Form::label($field->name_snakecase . '-' . $label, $label) !!}
@endforeach