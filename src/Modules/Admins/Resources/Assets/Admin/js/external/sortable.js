// function for automating the drag-drop sort ordering lists
$(function () {
    $('.drag-drop-list').sortable({
        axis: 'y',
        placeholder: 'sortable-placeholder',
        containment: '.drag-drop-list',
        cursor: 'move',
        handle: '.icon-drag-drop',
        serialize: {key: 'sort'},
        revert: true,
        stop: function (evt, ui) {
            var sorted = $('.drag-drop-list').sortable('serialize'),
                gotoURL = $(this).data('url');
            $.ajax({
                url: gotoURL,
                data: sorted,
                type: 'post',
                success: function (success) {
                    // trigger success alert
                    var alertBox = '<div class="row"><div class="alert-holder"><div class="alert-box success" data-options="animation:slideUp;animation_speed:500;" data-alert><p>The order has been updated</p><a href="#" class="close">&times;</a></div></div></div>';
                    $("#page-holder").prepend(alertBox).foundation();
                    // auto close the alert
                    autoCloseAlert();

                },
                error: function (xhr, textStatus, thrownError) {
                    Debug(xhr.responseText);
                    var alertBox = '<div class="row"><div class="alert-holder"><div class="alert-box success" data-options="animation:slideUp;animation_speed:500;" data-alert><p>Sorry, updating the order failed.</p><a href="#" class="close">&times;</a></div></div></div>';
                    $("#page-holder").prepend(alertBox).foundation();
                    // auto close the alert
                    autoCloseAlert();
                }
            });//--//ajax
        }//--//stop
    });
});

