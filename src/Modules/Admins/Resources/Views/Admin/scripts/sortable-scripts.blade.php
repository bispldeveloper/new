<script>
    $(function() {
        $("#sortable tbody").sortable({
            opacity: 0.8,
            cursor: 'move',
            handle: '.handle',
            update: function() {
                $.ajax({
                    type: 'POST',
                    url: '/mc-admin/sortorder',
                    data: $(this).sortable('serialize') + '&_token=' + '{!! csrf_token() !!}',
                    success: function(json) {
                        console.log(json);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });
    });
</script>