@if($field->has_label)
    <label for="{{ $field->name_snakecase }}">{!! $field->present()->getLabel . ($field->required ? '*' : '') !!}</label>
@endif
{!! Form::select($field->name_snakecase, $field->options_array, $field->default, ($field->required ? ['required' => 'required'] : [])) !!}