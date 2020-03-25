@if($field->has_label)
    <label for="{{ $field->name_snakecase }}">{!! $field->present()->getLabel . ($field->required ? '*' : '') !!}</label>
@endif
{!! Form::number($field->name_snakecase, $field->default, ($field->required ? ['required' => 'required'] : [])) !!}