{!! Form::hidden($field->name_snakecase, 'No') !!}
{!! Form::checkbox($field->name_snakecase, 'Yes', $field->default, ($field->required ? ['required' => 'required', 'id' => $field->name_snakecase] : ['id' => $field->name_snakecase])) !!}
@if($field->has_label)
    <label for="{{ $field->name_snakecase }}">{!! $field->present()->getLabel . ($field->required ? '*' : '') !!}</label>
@endif