@if (session()->get('flash_message'))
    <div class="{{ session()->get('flash_message_type') }} callout" data-closable>
        <p>{{ session()->get('flash_message') }}</p>
        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
