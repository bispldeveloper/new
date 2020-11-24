@if($field->has_label)
    <label for="{{ $field->name_snakecase }}">{!! $field->present()->getLabel . ($field->required ? '<span class="required">*</span>' : '') !!}</label>
@endif
{!! Form::email($field->name_snakecase, $field->default, ($field->required ? ['required' => 'required'] : [])) !!}