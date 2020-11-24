@if($field->has_label)
    <label for="{{ $field->name_snakecase }}">{!! $field->present()->getLabel . ($field->required ? '<span class="required">*</span>' : '') !!}</label>
@endif
{!! Form::textarea($field->name_snakecase, $field->default, ($field->required ? ['required' => 'required', 'rows' => $field->options] : ['rows' => $field->options])) !!}