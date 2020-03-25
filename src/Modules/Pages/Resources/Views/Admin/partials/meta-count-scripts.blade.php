<script>
    $(window).on('load', function() {
        calculateMetaCharacters();
    });
    $(document).on('keyup', '#meta_title, #meta_description', calculateMetaCharacters);

    function calculateMetaCharacters() {
        var metaTitleLength = $('#meta_title').val().length;
        var metaDescriptionLength = $('#meta_description').val().length;
        $('label[for="meta_title"]').html('Meta Title (<span style="color:' +  (metaTitleLength > 60 ? 'red' : 'green') + ';">' + metaTitleLength + '</span>' + '/60)');
        $('label[for="meta_description"]').html('Meta Description (<span style="color:' +  (metaDescriptionLength > 155 ? 'red' : 'green') + ';">' + metaDescriptionLength + '</span>' + '/155)');
    }
</script>