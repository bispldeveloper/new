<div class="row">
    @if(isset($pageform))
        <div class="small-12 large-8 columns">
            <div class="table-block">
                <div class="table-block-header">
                    <div class="row">
                        <div class="small-12 large-6 columns">
                            <p class="table-block-title">Form Fields</p>
                        </div>
                        <div class="small-12 large-6 columns text-right">
                            <a href="{{ route('mc-admin.pageforms.addfield', $pageform->id) }}" class="button warning trigger-reveal">Add Field</a>
                        </div>
                    </div>
                </div>
                <table class="data-table" id="sortable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Label</th>
                            <th>Type</th>
                            <th>Required?</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pageform->fields as $field)
                            <tr id="page_form_fields_{{ $field->id }}">
                                <td class="handle"><i class="fa fa-arrows-v"></i></td>
                                <td data-label="Name">
                                    <a title="Edit Form Field" href="{{ route('mc-admin.pageformfields.edit', $field->id) }}" class="trigger-reveal">{{ $field->name }}</a>
                                </td>
                                <td data-label="Label">
                                  {!! $field->label !!}
                                </td>
                                <td data-label="Type">{{ $field->fieldtype->name }}</td>
                                <td data-label="Required">{!! $field->present()->getRequiredLabel !!}</td>
                                <td class="text-right">
                                    <a title="Edit Form Field" href="{{ route('mc-admin.pageformfields.edit', $field->id) }}" class="icon-button trigger-reveal info"><i class="far fa-edit"></i></a>
                                    @if(! $field->is_newsletter_field)
                                        <a title="Delete Form Field" href="{{ route('mc-admin.pageformfields.confirm-delete', $field->id) }}" class="icon-button trigger-reveal alert"><i class="far fa-trash-alt"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr class="no-results">
                                <td colspan="6">There are no fields available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    <div class="small-12 @if(isset($pageform)) large-4 @endif columns">
        <div class="content-block">
            <p class="content-block-title">Page Form Details</p>
            <div class="content">
                @if(auth()->guard('admins')->user()->admingroup_id == 1)
                    <div class="row">
                        <div class="small-12 columns">
                            {!! Form::label('is_module', 'Is this page for a module?', ['class' => $errors->first('published', 'is-invalid-label')])!!}
                            {!! Form::select('is_module', ['0' => 'No', '1' => 'Yes'], null, ['class' => $errors->first('published', 'is-invalid-input')])!!}
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="small-12 columns">
                        {!! Form::label('name', 'Name', ['class' => $errors->first('name', 'is-invalid-label')])!!}
                        {!! Form::text('name', null, ['placeholder' => 'The name of the form.', 'class' => $errors->first('name', 'is-invalid-input')]) !!}
                        {!! $errors->first('name', '<span class="form-error is-visible">:message</span>' ) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 columns">
                        {!! Form::label('title', 'Title', ['class' => $errors->first('title', 'is-invalid-label')])!!}
                        {!! Form::text('title', null, ['placeholder' => 'The title for the form.', 'class' => $errors->first('title', 'is-invalid-input')]) !!}
                        {!! $errors->first('title', '<span class="form-error is-visible">:message</span>' ) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 columns">
                        {!! Form::label('submit_text', 'Submit Button Text', ['class' => $errors->first('submit_text', 'is-invalid-label')])!!}
                        {!! Form::text('submit_text', null, ['placeholder' => 'The text which should be shown on the submit button', 'class' => $errors->first('submit_text', 'is-invalid-input')]) !!}
                        {!! $errors->first('submit_text', '<span class="form-error is-visible">:message</span>' ) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 columns">
                        {!! Form::label('email_to', 'Email To', ['class' => $errors->first('email_to', 'is-invalid-label')])!!}
                        {!! Form::text('email_to', null, ['placeholder' => 'The email address which enquiries should be sent to.', 'class' => $errors->first('email_to', 'is-invalid-input')]) !!}
                        {!! $errors->first('email_to', '<span class="form-error is-visible">:message</span>' ) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 columns">
                        {!! Form::label('email_from', 'Email From', ['class' => $errors->first('email_from', 'is-invalid-label')])!!}
                        {!! Form::text('email_from', null, ['placeholder' => 'The email address which enquiries should be sent from.', 'class' => $errors->first('email_from', 'is-invalid-input')]) !!}
                        {!! $errors->first('email_from', '<span class="form-error is-visible">:message</span>' ) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 columns">
                        {!! Form::label('email_subject', 'Email Subject', ['class' => $errors->first('email_subject', 'is-invalid-label')])!!}
                        {!! Form::text('email_subject', null, ['placeholder' => 'The subject for the email.', 'class' => $errors->first('email_subject', 'is-invalid-input')]) !!}
                        {!! $errors->first('email_subject', '<span class="form-error is-visible">:message</span>' ) !!}
                    </div>
                </div>
                @if(config('newsletter.driver') != 'null')
                    <div class="row">
                        <div class="small-12 large-6 columns">
                            {!! Form::label('has_newsletter', 'Newsletter Subscription?', ['class' => $errors->first('published', 'is-invalid-label')])!!}
                            {!! Form::select('has_newsletter', ['0' => 'No', '1' => 'Yes'], null, ['class' => $errors->first('published', 'is-invalid-input')])!!}
                        </div>
                        <div class="small-12 large-6 columns" id="has_newsletter_container" style="{{ (isset($pageform) && $pageform->has_newsletter ? 'display:block;' : 'display:none;') }}">
                            {!! Form::label('newsletter_list_id', 'List ID', ['class' => $errors->first('newsletter_list_id', 'is-invalid-label')])!!}
                            {!! Form::text('newsletter_list_id', null, ['placeholder' => 'The list ID from ' . config('newsletter.driver'), 'class' => $errors->first('newsletter_list_id', 'is-invalid-input')]) !!}
                            {!! $errors->first('newsletter_list_id', '<span class="form-error is-visible">:message</span>' ) !!}
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="small-12 @if(! isset($pageform)) large-6 @endif columns">
                        {!! Form::label('success_message', 'Success Message', ['class' => $errors->first('success_message', 'is-invalid-label')])!!}
                        {!! Form::textarea('success_message', null, ['class' => 'advanced-editor' . $errors->first('success_message', ' is-invalid-input'), 'rows' => 4]) !!}
                        {!! $errors->first('success_message', '<span class="form-error is-visible">:message</span>' ) !!}
                    </div>
                    <div class="small-12 @if(! isset($pageform)) large-6 @endif columns">
                        {!! Form::label('conversion_tracking', 'Conversion Tracking Code', ['class' => $errors->first('conversion_tracking', 'is-invalid-label')])!!}
                        {!! Form::textarea('conversion_tracking', null, ['class' => $errors->first('conversion_tracking', 'is-invalid-input'), 'rows' => 4]) !!}
                        {!! $errors->first('conversion_tracking', '<span class="form-error is-visible">:message</span>' ) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>