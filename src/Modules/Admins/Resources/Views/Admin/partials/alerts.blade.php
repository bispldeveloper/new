@if (session()->get('flash_message'))
    <div class="alerts callout {{ session()->get('flash_message_type') }}" data-closable>
        <p>{{ session()->get('flash_message') }}</p>
        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(count($errors) > 0)
    <div class="alerts callout warning" data-closable>
        <p>Please check the form for errors.</p>
        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
