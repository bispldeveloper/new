<script>
    var fieldtypes = {
        @foreach($fieldtypes as $fieldtype)
        "{{ $fieldtype->id }}": {
            name: '{{ $fieldtype->name }}',
            has_options: {{ $fieldtype->has_options }}
        },
        @endforeach
    }
    $(document).on('change', '#form_field_type_id', function() {
        var selected = $(this).val();
        var field = fieldtypes[selected];
        if(field.has_options == true) {
            $('#has_options').show();
        } else {
            $('#has_options').hide();
        }
        if(field.name == 'Content') {
            $('#has_label, #label, #placeholder, #default, #required').parent().hide();
            $('#content_container').show();
            tinymce.remove('#content');
            tinymce.init({
                branding: false,
                relative_urls: false,
                selector: '#content'
            });
        } else {
            $('#has_label, #label, #placeholder, #default, #required').parent().show();
            $('#content_container').hide();
        }
    });
    $(document).on('change', '#has_label', function() {
        var has_label = $(this).val();
        if(has_label == true) {
            $('#has_label_container').show();
        } else {
            $('#has_label_container').hide();
        }
    });
    $(document).on('change', '#has_newsletter', function() {
        var has_newsletter = $(this).val();
        if(has_newsletter == true) {
            $('#has_newsletter_container').show();
        } else {
            $('#has_newsletter_container').hide();
        }
    });
</script>