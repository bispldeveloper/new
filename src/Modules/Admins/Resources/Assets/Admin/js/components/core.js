// expand collapse
$(document).on('click', '.expand-collapse', function (event) {
    event.preventDefault();
    $(this).toggleClass('collapsed');
    $(this).parent().parent().find('.content').stop().slideToggle();
});

// trigger reveal
$(document).on('click', '.trigger-reveal', function (event) {
    event.preventDefault();
    var url = $(this).attr('href');
    $.ajax(url).done(function (content) {
        $('#dynamicModal').html(content).foundation('open');
    });
});

// nav active
$("ul.sub-menu li a").each(function (index, element) {
    if ($(this).hasClass("active")) {
        $(this).parents("li.has-submenu").addClass("active");
        $(this).parents('ul.sub-menu').css("display", "block");
    }
});

// filter function
$(function () {
    $('#filter').change(function () {
        var filter = $(this).val();
        if (filter == '') {
            window.location.href = '';
        } else {
            window.location.href = '?filter=' + filter;
        }
    })
});