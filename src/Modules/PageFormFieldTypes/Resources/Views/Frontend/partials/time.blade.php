@if($field->has_label)
    <label for="{{ $field->name_snakecase }}">{!! $field->present()->getLabel . ($field->required ? '*' : '') !!}</label>
@endif
{!! Form::time($field->name_snakecase, $field->default, ($field->required ? ['required' => 'required'] : [])) !!}