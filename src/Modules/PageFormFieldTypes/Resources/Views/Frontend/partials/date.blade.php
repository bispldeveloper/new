@if($field->has_label)
    <label for="{{ $field->name_snakecase }}">{!! $field->present()->getLabel . ($field->required ? '*' : '') !!}</label>
@endif
{!! Form::date($field->name_snakecase, $field->default, ($field->required ? ['required' => 'required'] : [])) !!}